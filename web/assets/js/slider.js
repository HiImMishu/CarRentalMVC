document.addEventListener("DOMContentLoaded", function(event) {
  width = document.getElementsByClassName("container")[0].offsetWidth;
  if(width >= 1000)
    amount = 2;
  else
    amount = 1;

  if (document.getElementsByClassName("mySlides").length != 0) {
    slideIndex = 1;
    first = 0;
    second = 1;
    auto = 1;
    if(amount == 1)
      showSlides(slideIndex);
    else
      showManySlides(0);
  }
});

// Next/previous controls
function plusSlides(n, a) {
  auto = a;
  if(amount == 1)
    showSlides(slideIndex += n);
  else
    showManySlides(+n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
  if(auto)
  {
    setTimeout(function() {
      plusSlides(1, 1);
    }, 5000);
  }
}

function showManySlides(n) {
  var i;
  first += n;
  second += n;
  var slides = document.getElementsByClassName("mySlides");
  if (first >= slides.length) {first = 0}
  if (second >= slides.length) {second = 0}
  if (first < 0) {first = slides.length}
  if (second < 0) {second = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  console.log(second+" "+first)
  slides[first].style.display = "block";
  slides[second].style.display = "block";
  if(auto)
  {
    setTimeout(function() {
      showManySlides(+1);
    }, 5000);
  }
}
