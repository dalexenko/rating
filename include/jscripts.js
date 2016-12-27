function right(e) {
if (navigator.appName == 'Netscape' && 
(e.which == 3 || e.which == 2))
return false;
else if (navigator.appName == 'Microsoft Internet Explorer' && 
(event.button == 2 || event.button == 3)) {
alert("don't do it!!!");
return false;
}
return true;
}
document.onmousedown=right;
if (document.layers) window.captureEvents(Event.MOUSEDOWN);
window.onmousedown=right;

function begin20() {
open('rating/index.php','1','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1 width=900');
}
function beginall() {
open('topmodels/index.php','1','toolbar=0,location=0,directories=0,status=0,menubar=0,scrollbars=1,resizable=1 width=900');
}
