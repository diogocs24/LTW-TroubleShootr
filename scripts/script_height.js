const detailsContent = document.getElementById('details-content');

function adjustDetailsHeight() {
    const contentHeight = detailsContent.scrollHeight;
    detailsContent.style.maxHeight = contentHeight > 400 ? '400px' : 'auto';
}

adjustDetailsHeight();
