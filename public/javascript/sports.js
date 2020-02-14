function currentdisp(n) {
  var i;
  items = document.getElementsByClassName("items");
  buttons = document.getElementsByClassName("navs");
  for (i = 0; i < items.length; i++) {
    items[i].className = items[i].className.replace(" active", "");
    buttons[i].className = buttons[i].className.replace(" selected", "");
  }
  items[n - 1].className += " active";
  buttons[n - 1].className += " selected";
}
