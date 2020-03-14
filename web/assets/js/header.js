function onClickMenu() {

  var items = document.getElementsByClassName("item");
  var nav = document.getElementById("navigation");

  var index = (items[0].classList.contains("itemVisible")) ? 4 : 0;

  var i = index;

  if(index == 0)
    nav.classList.add("dp");

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
    if(index == 4 && i==-1)
      setTimeout(removeDp, 200);
  }

  function removeDp()
  {
    nav.classList.remove("dp");
  }
}
