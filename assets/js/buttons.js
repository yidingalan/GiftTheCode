function Q1(text){
	document.getElementById("Q1_A").style.background = "#4aaf51";
	document.getElementById("Q1_B").style.background = "#4aaf51";
	document.getElementById("Q1_C").style.background = "#4aaf51";
	document.getElementById("Q1_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "blue";		
}
function Q2(text){
	document.getElementById("Q2_A").style.background = "#4aaf51";
	document.getElementById("Q2_B").style.background = "#4aaf51";
	document.getElementById("Q2_C").style.background = "#4aaf51";
	document.getElementById("Q2_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "#f44336";		
}
function Q3(text){
	document.getElementById("Q3_A").style.background = "#4aaf51";
	document.getElementById("Q3_B").style.background = "#4aaf51";
	document.getElementById("Q3_C").style.background = "#4aaf51";
	document.getElementById("Q3_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "#c6ff00";		
}
function Q4(text){
	document.getElementById("Q4_A").style.background = "#4aaf51";
	document.getElementById("Q4_B").style.background = "#4aaf51";
	document.getElementById("Q4_C").style.background = "#4aaf51";
	document.getElementById("Q4_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "#7b1fa2";		
}
function Q5(text){
	document.getElementById("Q5_A").style.background = "#4aaf51";
	document.getElementById("Q5_B").style.background = "#4aaf51";
	document.getElementById("Q5_C").style.background = "#4aaf51";
	document.getElementById("Q5_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "#607d8b";	
}
function submit(){
	var Q1 = 0;
	var Q2 = 0;
	var Q3 = 0;
	var Q4 = 0;
	var Q5 = 0;
	
	if(document.getElementById("Q1_A").style.background == "blue"){
		Q1 = 1;
	}
	else if(document.getElementById("Q1_B").style.background == "blue"){
		Q1 = 2;
	}
	else if(document.getElementById("Q1_C").style.background == "blue"){
		Q1 = 3;	
	}
	else if(document.getElementById("Q1_D").style.background == "blue"){
		Q1 = 4;
	}
	
	if(document.getElementById("Q2_A").style.background == "#f44336"){
		Q2 = 1;
	}
	else if(document.getElementById("Q2_B").style.background == "#f44336"){
		Q2 = 2;
	}
	else if(document.getElementById("Q2_C").style.background == "#f44336"){
		Q2 = 3;	
	}
	else if(document.getElementById("Q2_D").style.background == "#f44336"){
		Q2 = 4;
	}
	
	if(document.getElementById("Q3_A").style.background == "#c6ff00"){
		Q3 = 1;
	}
	else if(document.getElementById("Q3_B").style.background == "#c6ff00"){
		Q3 = 2;
	}
	else if(document.getElementById("Q3_C").style.background == "#c6ff00"){
		Q3 = 3;	
	}
	else if(document.getElementById("Q3_D").style.background == "#c6ff00"){
		Q3 = 4;
	}
	
	if(document.getElementById("Q4_A").style.background == "#7b1fa2"){
		Q4 = 1;
	}
	else if(document.getElementById("Q4_B").style.background == "#7b1fa2"){
		Q4 = 2;
	}
	else if(document.getElementById("Q4_C").style.background == "#7b1fa2"){
		Q4 = 3;	
	}
	else if(document.getElementById("Q4_D").style.background == "#7b1fa2"){
		Q4 = 4;
	}
	
	if(document.getElementById("Q5_A").style.background == "#607d8b"){
		Q5 = 1;
	}
	else if(document.getElementById("Q5_B").style.background == "#607d8b"){
		Q5 = 2;
	}
	else if(document.getElementById("Q5_C").style.background == "#607d8b"){
		Q5 = 3;	
	}
	else if(document.getElementById("Q5_D").style.background == "#607d8b"){
		Q5 = 4;
	}
//store date, score, quiz, module, id 
	theForm = document.createElement('form');
	theForm.action = 'quizResultsHandler.php';
	theForm.method = 'post';
	newInput1 = document.createElement('input');
	newInput1.type = 'hidden';
	newInput1.name = 'Question1';
	newInput1.value = Q1;
    newInput2 = document.createElement('input');
	newInput2.type = 'hidden';
	newInput2.name = 'Question2';
	newInput2.value = Q2;
    newInput3 = document.createElement('input');
	newInput3.type = 'hidden';
	newInput3.name = 'Question3';
	newInput3.value = Q3;
    newInput4 = document.createElement('input');
	newInput4.type = 'hidden';
	newInput4.name = 'Question4';
	newInput4.value = Q4;
    newInput5 = document.createElement('input');
	newInput5.type = 'hidden';
	newInput5.name = 'Question5';
	newInput5.value = 'Q5';
	theForm.appendChild(newInput1);
	theForm.appendChild(newInput2);
	theForm.appendChild(newInput3);
	theForm.appendChild(newInput4);
	theForm.appendChild(newInput5);
	 
	document.getElementById('form_container').appendChild(theForm);
	theForm.submit();
	
	}

function signal(){
	window.alert("HIII");
}