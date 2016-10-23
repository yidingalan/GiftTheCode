var counter = 1;
var limit = 4;
function addAnswer(){
if (counter == limit)  {
	alert("You have reached the limit of adding " + counter + " inputs");
}
else {
	  var newdiv = document.createElement('div');
	  newdiv.innerHTML = "Entry " + (counter + 1) + " <br><input type='text' name='myInputs[]'>";
	  document.getElementById('dyAnswer').appendChild(newdiv);
	  newdiv.style.value = "Enter Option " + counter;
	  counter++;
 }
}
