
function typeWriter(var txt) {
  var i = 0;
  if (i < txt.length) {
    document.getElementById("demo").placeholder += txt.charAt(i);
    i++;
    setTimeout(typeWriter, 100);
  }
}