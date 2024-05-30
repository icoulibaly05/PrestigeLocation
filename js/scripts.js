document.addEventListener("DOMContentLoaded", function() {
    var images = document.querySelectorAll("img.clickable");
    var lightbox = document.getElementById("lightbox");
    var lightboxContent = document.getElementById("lightbox-content");
    var closeBtn = document.getElementById("close");

    images.forEach(function(image) {
        image.addEventListener("click", function() {
            lightbox.style.display = "block";
            lightboxContent.src = this.src;
        });
    });

    closeBtn.addEventListener("click", function() {
        lightbox.style.display = "none";
    });

    lightbox.addEventListener("click", function(e) {
        if (e.target == lightbox) {
            lightbox.style.display = "none";
        }
    });
});
