import { FormChangeTracker } from "../../modules/form/validation/form-change-detection.js";
import { ImageNotificationHandler } from '../../modules/upload/image-notification-handler.js';

window.initStudentAchievementForm = function () {
    const formId = "student-achievement-form";
    const form = document.getElementById(formId);

    if (!form) {
        return;
    }

    if (form.dataset.__studentAchievementInit === "1") return;
    form.dataset.__studentAchievementInit = "1";

    const submitBtn = document.getElementById("publish-btn");
    const isEditMode = !!form.querySelector(
        'input[name="_method"][value="PUT"]'
    );

    const gambarInputId = 'gambar';
    const gambarDropZoneId = 'drop-zone-gambar-prestasi';
    const gambarPlaceholderId = 'upload-placeholder-gambar-prestasi';
    const gambarPreviewContainerId = 'preview-container-gambar-prestasi';
    const gambarPreviewImgId = 'preview-img-gambar-prestasi';
    const gambarRemoveBtnId = 'remove-gambar-btn-prestasi';
    const gambarDeleteInputId = 'delete_gambar';
    const requiredFields = [
        "judul",
        "nama_siswa",
        "kelas",
        "jenis_prestasi",
        "tingkat_prestasi",
        "tanggal_prestasi",
    ];

    // 1. Helper: Check Form Validity
    function checkFormValidity() {
        // Check Text Fields
        const hasRequiredFields = requiredFields.every((id) => {
            const el = document.getElementById(id);
            return el && el.value.trim().length > 0;
        });

        // Check Image - Gambar prestasi WAJIB
        const hasImage = (() => {
            const input = document.getElementById(gambarInputId);
            const preview = document.getElementById(gambarPreviewContainerId);
            const deleteInput = document.getElementById(gambarDeleteInputId);

            const hasSelectedFile = !!(input && input.files && input.files.length > 0);
            const hasExistingPreview = !!(preview && !preview.classList.contains('hidden'));
            const deleteRequested = deleteInput ? String(deleteInput.value) === '1' : false;

            if (isEditMode) {
                // Edit: valid jika masih ada gambar (existing preview) ATAU upload file baru.
                // Jika user klik remove (delete=1), maka harus upload pengganti.
                if (deleteRequested) return hasSelectedFile;
                return hasExistingPreview || hasSelectedFile;
            }

            // Create: wajib upload file (preview-only tidak cukup jika input kosong)
            return hasSelectedFile;
        })();

        return hasRequiredFields && hasImage;
    }

    // 2. Helper: Update Button State
    function updateSubmitButtonState(hasChanged) {
        if (!submitBtn) return;

        const isValid = checkFormValidity();
        let shouldEnable = false;

        if (isEditMode) {
            // Edit: Harus valid DAN ada perubahan
            shouldEnable = isValid && hasChanged;
        } else {
            // Create: Harus valid (perubahan implisit karena start kosong)
            shouldEnable = isValid;
        }

        if (shouldEnable) {
            submitBtn.classList.remove("opacity-50", "cursor-not-allowed");
            submitBtn.removeAttribute("disabled");
        } else {
            submitBtn.classList.add("opacity-50", "cursor-not-allowed");
            submitBtn.setAttribute("disabled", "disabled");
        }
    }

    // 3. Initialize Change Tracking
    const tracker = new FormChangeTracker(form);

    tracker.startMonitoring((hasChanged) => {
        updateSubmitButtonState(hasChanged);
    });

    // 4. Manual Listeners for Realtime Validation
    // Tracker is debounced, so we add direct listeners for immediate feedback on keypress
    const allInputs = form.querySelectorAll("input, select, textarea");
    allInputs.forEach((el) => {
        const handler = () => {
            // Force check hasChanges synchronously
            const hasChanged = tracker.hasChanges();
            updateSubmitButtonState(hasChanged);
        };
        el.addEventListener("input", handler);
        el.addEventListener("change", handler);
    });

    // 5. Initialize Unsaved Changes Modal
    if (typeof window.initUnsavedChangesModal === "function") {
        window.initUnsavedChangesModal({
            formId: formId,
            submitBtnId: "publish-btn",
            modalId: "confirm-modal",
        });
    }

    // 6. Init TinyMCE
    const textarea = document.getElementById("deskripsi");
    if (textarea && typeof window.TinyMCECommon !== "undefined") {
        const csrfToken =
            document
                .querySelector('meta[name="csrf-token"]')
                ?.getAttribute("content") || "";
        window.TinyMCECommon.init("deskripsi", {
            height: 300,
            menubar: false,
            plugins: [
                "advlist",
                "autolink",
                "lists",
                "link",
                "charmap",
                "preview",
                "anchor",
                "searchreplace",
                "visualblocks",
                "code",
                "fullscreen",
                "insertdatetime",
                "media",
                "table",
                "wordcount",
            ],
            toolbar:
                "undo redo | blocks | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image table code fullscreen",
            uploadRoute: "/cpanel/uploads/images",
            csrfToken,
            onContentChange: function () {
                textarea.value = window.TinyMCECommon.getContent("deskripsi");
                textarea.dispatchEvent(new Event("input", { bubbles: true }));
                textarea.dispatchEvent(new Event("change", { bubbles: true }));
            },
        });
    }

    // 7. Form Submit Handler (Last Line of Defense)
    form.addEventListener("submit", function (e) {
        if (!checkFormValidity()) {
            e.preventDefault();
            return false;
        }
    });

    // 8. Init Image Uploaders
    // Gambar Utama
    initGenericImageUpload({
        inputId: gambarInputId,
        dropZoneId: gambarDropZoneId,
        placeholderId: gambarPlaceholderId,
        previewContainerId: gambarPreviewContainerId,
        previewImageId: gambarPreviewImgId,
        removeBtnId: gambarRemoveBtnId,
        deleteInputId: gambarDeleteInputId,
        maxSize: 5 * 1024 * 1024, // 5MB
        allowedTypes: ["image/*"],
        onChange: function (file) {
            // Hapus dispatch event ke input sendiri untuk mencegah infinite loop
            // karena generic.js mendengarkan event change pada input ini

            // Dispatch ke form agar tracker mendeteksi perubahan
            form.dispatchEvent(new Event("change", { bubbles: true }));

            // Trigger manual check pada tracker jika diperlukan
            if (typeof tracker !== "undefined") {
                updateSubmitButtonState(tracker.hasChanges());
            }

            // Clear error style if exists
            const container = document.getElementById(gambarDropZoneId);
            const errorMsg = document.getElementById("gambar-js-error");
            if (container) {
                container.classList.add(
                    "border-gray-300",
                    "dark:border-slate-600"
                );
                container.classList.remove("border-red-500");
            }
            if (errorMsg) errorMsg.remove();
        },
        onError: (msg) => {
            if (msg.includes("terlalu besar")) {
                ImageNotificationHandler.showSizeLimitError(msg.match(/\b[\w.]+\b/)?.[0] || 'File');
            } else {
                alert(msg);
            }
        },
    });

    // Sertifikat
    initGenericImageUpload({
        inputId: "foto_sertifikat",
        dropZoneId: "drop-zone-sertifikat",
        placeholderId: "upload-placeholder-sertifikat",
        previewContainerId: "preview-container-sertifikat",
        previewImageId: "preview-img-sertifikat",
        removeBtnId: "remove-sertifikat-btn",
        deleteInputId: "delete_foto_sertifikat",
        maxSize: 5 * 1024 * 1024, // 5MB
        allowedTypes: ["image/*"],
        onChange: function (file) {
            // Hapus dispatch event ke input sendiri untuk mencegah infinite loop
            form.dispatchEvent(new Event("change", { bubbles: true }));

            if (typeof tracker !== "undefined") {
                updateSubmitButtonState(tracker.hasChanges());
            }
        },
        onError: (msg) => {
            if (msg.includes("terlalu besar")) {
                ImageNotificationHandler.showSizeLimitError(msg.match(/\b[\w.]+\b/)?.[0] || 'File');
            } else {
                alert(msg);
            }
        },
    });



    // 10. Image Zoom
    window.viewImageFull = function (src) {
        if (typeof window.openImagePreview === "function") {
            window.openImagePreview(src, "Preview Gambar");
        } else {
            window.open(src, "_blank");
        }
    };
};

// Auto-init on load
document.addEventListener("DOMContentLoaded", () => {
    if (document.getElementById("student-achievement-form")) {
        window.initStudentAchievementForm();
    }
});
