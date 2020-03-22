auto = 1;
document.addEventListener("DOMContentLoaded", function(event) {
  if (document.getElementsByClassName("imageContainder").length != 0) {
    slideIndex = 1;
    showSlides(slideIndex);
  }
});

// Next/previous controls
function plusSlides(n, a) {
  auto = a;
  showSlides(slideIndex += n);
}

function autoSlides(n) {
  if(auto == 0)
    return
  showSlides(slideIndex += n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("imageContainder");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
  if(auto)
  {
    setTimeout(function() {
      autoSlides(1);
    }, 5000);
  }
}
