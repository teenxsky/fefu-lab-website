document.getElementById('toggleButton').addEventListener("click", function () {
    const extraImage = document.getElementById('extraImage');

    if (extraImage.style.display === 'none') {
        extraImage.style.display = 'block';
        this.textContent = 'Закрыть';
    } else {
        extraImage.style.display = 'none';
        this.textContent = 'Открыть';
    }
});
