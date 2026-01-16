/**
 * Image Preview Functions (dipakai di website dan cpanel)
 */
window.previewImage = function (input, previewContainerId = 'preview-container', previewImageId = 'preview-image') {
    const previewContainer = document.getElementById(previewContainerId);
    const previewImage = document.getElementById(previewImageId);

    if (input.files && input.files[0]) {
        const reader = new FileReader();

        reader.onload = function (e) {
            previewImage.src = e.target.result;
            if (previewContainer) {
                previewContainer.classList.remove('hidden');
            }
        };

        reader.readAsDataURL(input.files[0]);
    }
};

window.resetImage = function (previewContainerId = 'preview-container', previewImageId = 'preview-image', inputId = null) {
    const previewContainer = document.getElementById(previewContainerId);
    const previewImage = document.getElementById(previewImageId);

    if (previewContainer) {
        previewContainer.classList.add('hidden');
    }
    if (previewImage) {
        previewImage.src = '';
    }
    if (inputId) {
        const input = document.getElementById(inputId);
        if (input) {
            input.value = '';
        }
    }
};
