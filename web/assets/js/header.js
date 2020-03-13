function onClickMenu() {

  var items = document.getElementsByClassName("item");

  var index = (items[0].classList.contains("itemVisible")) ? 4 : 0;

  var i = index;

  setTimeout(show, 0);
  setTimeout(show, 200);
  setTimeout(show, 400);
  setTimeout(show, 600);
  setTimeout(show, 800);

  function show()
  {
    items[i].classList.toggle("itemVisible");
    if(index==0)
    {
      i++;
    }
    else {
      i--;
    }
  }
}
