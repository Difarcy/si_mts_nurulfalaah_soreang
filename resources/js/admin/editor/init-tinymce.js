/**
 * TinyMCE Common Module
 * Modul umum untuk inisialisasi TinyMCE editor
 * Bisa digunakan untuk berbagai form (announcement, school profile, dll)
 *
 * Menggunakan dynamic import untuk code splitting - TinyMCE hanya di-load saat diperlukan
 */

// Cache untuk menyimpan promise TinyMCE yang sedang di-load
let tinymceLoadPromise = null;

window.TinyMCECommon = {
    /**
     * Load TinyMCE secara dinamis (Shared Loader)
     */
    load: async function () {
        if (window.tinymce) {
            return window.tinymce;
        }

        if (tinymceLoadPromise) {
            return tinymceLoadPromise;
        }

        tinymceLoadPromise = (async () => {
            try {
                // Import CSS files first (they need to be imported, not awaited)
                const isDarkMode =
                    document.documentElement.classList.contains("dark") ||
                    document.documentElement.getAttribute("data-theme") === "dark" ||
                    window.matchMedia("(prefers-color-scheme: dark)").matches;

                if (isDarkMode) {
                    await import("tinymce/skins/ui/oxide-dark/skin.min.css");
                } else {
                    await import("tinymce/skins/ui/oxide/skin.min.css");
                }

                // Dynamic import TinyMCE core
                const { default: tinymce } = await import("tinymce/tinymce");

                // Import all plugins
                await Promise.all([
                    import("tinymce/themes/silver"),
                    import("tinymce/icons/default"),
                    import("tinymce/models/dom"),
                    import("tinymce/plugins/advlist"),
                    import("tinymce/plugins/autolink"),
                    import("tinymce/plugins/lists"),
                    import("tinymce/plugins/link"),
                    import("tinymce/plugins/image"),
                    import("tinymce/plugins/charmap"),
                    import("tinymce/plugins/preview"),
                    import("tinymce/plugins/anchor"),
                    import("tinymce/plugins/searchreplace"),
                    import("tinymce/plugins/visualblocks"),
                    import("tinymce/plugins/code"),
                    import("tinymce/plugins/fullscreen"),
                    import("tinymce/plugins/insertdatetime"),
                    import("tinymce/plugins/media"),
                    import("tinymce/plugins/table"),
                    import("tinymce/plugins/wordcount"),
                    import("tinymce/plugins/autoresize"),
                ]);

                // Expose TinyMCE to window for global access
                window.tinymce = tinymce;
                return tinymce;
            } catch (error) {
                // console.error("Error loading TinyMCE:", error);
                throw error;
            }
        })();

        return tinymceLoadPromise;
    },

    /**
     * Initialize TinyMCE editor dengan konfigurasi custom
     */
    init: async function (editorId, options = {}) {
        const {
            uploadRoute = null,
            csrfToken = "",
            height = 400,
            toolbar = "undo redo | blocks | bold italic underline | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent | removeformat | link image media table | code fullscreen",
            plugins = [
                "advlist",
                "autolink",
                "lists",
                "link",
                "image",
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
                "code",
                "wordcount",
            ],
            onContentChange = null,
            initialContent = null,
        } = options;

        const editorEl = document.querySelector(`#${editorId}`);
        if (!editorEl) {
            // console.error(`#${editorId} element not found!`);
            return;
        }

        async function createEditor() {
            try {
                // Load TinyMCE secara dinamis menggunakan shared loader
                const tinymce = await window.TinyMCECommon.load();

                if (!tinymce) {
                    // console.error("Failed to load TinyMCE!");
                    return;
                }
                // Get initial content
                const content =
                    initialContent !== null
                        ? initialContent
                        : editorEl.value || "";

                // Check if dark mode is active
                const isDarkMode =
                    document.documentElement.classList.contains("dark") ||
                    document.documentElement.getAttribute("data-theme") === "dark" ||
                    window.matchMedia("(prefers-color-scheme: dark)").matches;

                const editorConfig = {
                    target: editorEl,
                    license_key: "gpl",
                    height: height,
                    min_height: height,
                    menubar: false,
                    convert_urls: false,
                    relative_urls: false,
                    remove_script_host: false,
                    document_base_url:
                        window.location && window.location.origin
                            ? window.location.origin + "/"
                            : "/",
                    plugins: [...plugins, "autoresize"],
                    toolbar: toolbar,
                    content_style: `
                        body {
                            font-family: Arial, Helvetica, sans-serif;
                            font-size: 16px;
                            color: ${isDarkMode ? "#f1f5f9" : "#1e293b"};
                            background-color: ${isDarkMode ? "#1e293b" : "#ffffff"};
                        }
                        h1 { font-size: 2.25rem; font-weight: 700; margin-top: 1.5rem; margin-bottom: 0.5rem; }
                        h2 { font-size: 1.875rem; font-weight: 700; margin-top: 1.5rem; margin-bottom: 0.5rem; }
                        h3 { font-size: 1.5rem; font-weight: 700; margin-top: 1.25rem; margin-bottom: 0.5rem; }
                        h4 { font-size: 1.125rem; font-weight: 600; margin-top: 1rem; margin-bottom: 0.5rem; }
                        h5 { font-size: 1rem; font-weight: 600; margin-top: 0.75rem; margin-bottom: 0.5rem; }
                        h6 { font-size: 0.875rem; font-weight: 600; margin-top: 0.75rem; margin-bottom: 0.5rem; }
                        blockquote {
                            border-left: 4px solid ${isDarkMode ? "#64748b" : "#94a3b8"};
                            padding-left: 1rem;
                            padding-right: 1rem;
                            padding-top: 0.5rem;
                            padding-bottom: 0.5rem;
                            margin: 1rem 0;
                            background-color: ${isDarkMode ? "#1e293b" : "#f8fafc"};
                            color: ${isDarkMode ? "#cbd5e1" : "#475569"};
                            font-style: italic;
                        }
                        pre {
                            background-color: ${isDarkMode ? "#0f172a" : "#f1f5f9"};
                            color: ${isDarkMode ? "#f1f5f9" : "#1e293b"};
                            border: 1px solid ${isDarkMode ? "#475569" : "#cbd5e1"};
                            border-radius: 0;
                            padding: 1rem;
                            margin: 1rem 0;
                            font-family: 'Courier New', Courier, monospace;
                            font-size: 0.875rem;
                            overflow-x: auto;
                        }
                        code {
                            background-color: ${isDarkMode ? "#0f172a" : "#f1f5f9"};
                            color: ${isDarkMode ? "#f1f5f9" : "#1e293b"};
                            border: 1px solid ${isDarkMode ? "#475569" : "#cbd5e1"};
                            border-radius: 0;
                            padding: 0.125rem 0.375rem;
                            font-family: 'Courier New', Courier, monospace;
                            font-size: 0.875rem;
                        }
                        ul { list-style-type: disc; padding-left: 1.5rem; margin: 1rem 0; }
                        ol { list-style-type: decimal; padding-left: 1.5rem; margin: 1rem 0; }
                        ul ul { list-style-type: circle; margin: 0.5rem 0; }
                        ol ol { list-style-type: lower-alpha; margin: 0.5rem 0; }
                        ul ul ul { list-style-type: square; }
                        li { margin-bottom: 0.5rem; }
                        p { margin: 1rem 0; line-height: 1.75; }
                    `,
                    skin: false,
                    content_css: false,
                    branding: false,
                    promotion: false,
                    resize: false,
                    statusbar: false,
                    autoresize_bottom_margin: 16,
                    autoresize_overflow_padding: 16,
                    setup: function (editor) {
                        // Set initial content
                        if (content && content.trim() !== "") {
                            editor.setContent(content);
                        }

                        // Handle content change
                        editor.on("change keyup", function () {
                            if (onContentChange) {
                                onContentChange();
                            }
                        });

                        // Handle editor ready
                        editor.on("init", function () {
                            // Update textarea value
                            editor.save();
                        });
                    },
                };

                // Add image upload handler if uploadRoute is provided
                if (uploadRoute) {
                    editorConfig.images_upload_handler = function (blobInfo, progress) {
                        return new Promise(function (resolve, reject) {
                            const formData = new FormData();
                            formData.append("upload", blobInfo.blob(), blobInfo.filename());

                            const xhr = new XMLHttpRequest();
                            xhr.withCredentials = false;
                            xhr.open("POST", uploadRoute);

                            xhr.setRequestHeader("X-CSRF-TOKEN", csrfToken);
                            xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

                            xhr.upload.onprogress = function (e) {
                                progress((e.loaded / e.total) * 100);
                            };

                            xhr.onload = function () {
                                if (xhr.status === 403) {
                                    reject({ message: "HTTP Error: " + xhr.status, remove: true });
                                    return;
                                }

                                if (xhr.status < 200 || xhr.status >= 300) {
                                    reject("HTTP Error: " + xhr.status);
                                    return;
                                }

                                const json = JSON.parse(xhr.responseText);

                                if (!json || typeof json.url != "string") {
                                    reject("Invalid JSON: " + xhr.responseText);
                                    return;
                                }

                                resolve(json.url);
                            };

                            xhr.onerror = function () {
                                reject("Image upload failed due to a XHR Transport error. Code: " + xhr.status);
                            };

                            xhr.send(formData);
                        });
                    };
                }

                tinymce.init(editorConfig);
            } catch (error) {
                console.error("Error in createEditor:", error);
                throw error;
            }
        }

        // Initialize editor - createEditor sekarang async
        if (document.readyState === "loading") {
            document.addEventListener("DOMContentLoaded", function () {
                setTimeout(() => {
                    createEditor().catch((error) => {
                        // console.error("Error creating TinyMCE editor:", error);
                    });
                }, 100);
            });
        } else {
            setTimeout(() => {
                createEditor().catch((error) => {
                    // Error handling
                });
            }, 200);
        }
    },

    /**
     * Get editor content
     */
    getContent: function (editorId) {
        if (
            typeof tinymce !== "undefined" &&
            tinymce.get(editorId) &&
            tinymce.get(editorId).initialized
        ) {
            return tinymce.get(editorId).getContent();
        }
        const editorEl = document.querySelector(`#${editorId}`);
        return editorEl ? editorEl.value : "";
    },

    /**
     * Get editor content as text (without HTML)
     */
    getContentText: function (editorId) {
        if (typeof tinymce !== "undefined" && tinymce.get(editorId)) {
            return tinymce.get(editorId).getContent({ format: "text" });
        }
        const editorEl = document.querySelector(`#${editorId}`);
        return editorEl ? editorEl.textContent || editorEl.innerText : "";
    },

    /**
     * Set editor content
     */
    setContent: function (editorId, content) {
        if (typeof tinymce !== "undefined" && tinymce.get(editorId)) {
            tinymce.get(editorId).setContent(content || "");
        } else {
            const editorEl = document.querySelector(`#${editorId}`);
            if (editorEl) {
                editorEl.value = content || "";
            }
        }
    },
};
