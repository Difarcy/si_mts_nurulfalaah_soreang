/**
 * Image Count Validation
 * Digunakan untuk validasi jumlah gambar (tidak boleh ganjil kecuali 1, maksimal 6)
 * Dipakai di: create.blade.php, edit.blade.php, _form.blade.php
 */

window.checkImageCountValid = function() {
    const existingInputs = document.querySelectorAll('input[name="existing_images[]"]');
    const totalExisting = Array.from(existingInputs).filter(input => {
        return input && input.value && input.value.trim() !== '';
    }).length;

    const validSelectedImages = typeof selectedImages !== 'undefined'
        ? selectedImages.filter(file => file && file instanceof File)
        : [];
    const totalImages = validSelectedImages.length + totalExisting;

    // Validasi: tidak boleh ganjil kecuali 1, dan maksimal 6
    if (totalImages > 6) {
        return false;
    }
    if (totalImages > 1 && totalImages % 2 !== 0) {
        return false; // Ganjil selain 1
    }
    return true;
};
