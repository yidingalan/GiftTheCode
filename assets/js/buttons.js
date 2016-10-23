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
	document.getElementById(text).style.background = "red";
}
function Q3(text){
	document.getElementById("Q3_A").style.background = "#4aaf51";
	document.getElementById("Q3_B").style.background = "#4aaf51";
	document.getElementById("Q3_C").style.background = "#4aaf51";
	document.getElementById("Q3_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "yellow";
}
function Q4(text){
	document.getElementById("Q4_A").style.background = "#4aaf51";
	document.getElementById("Q4_B").style.background = "#4aaf51";
	document.getElementById("Q4_C").style.background = "#4aaf51";
	document.getElementById("Q4_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "purple";
}
function Q5(text){
	document.getElementById("Q5_A").style.background = "#4aaf51";
	document.getElementById("Q5_B").style.background = "#4aaf51";
	document.getElementById("Q5_C").style.background = "#4aaf51";
	document.getElementById("Q5_D").style.background = "#4aaf51";
	document.getElementById(text).style.background = "cyan";
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

	if(document.getElementById("Q2_A").style.background == "red"){
		Q2 = 1;
	}
	else if(document.getElementById("Q2_B").style.background == "red"){
		Q2 = 2;
	}
	else if(document.getElementById("Q2_C").style.background == "red"){
		Q2 = 3;
	}
	else if(document.getElementById("Q2_D").style.background == "red"){
		Q2 = 4;
	}
	if(document.getElementById("Q3_A").style.background == "yellow"){
		Q3 = 1;
	}
	else if(document.getElementById("Q3_B").style.background == "yellow"){
		Q3 = 2;
	}
	else if(document.getElementById("Q3_C").style.background == "yellow"){
		Q3 = 3;
	}
	else if(document.getElementById("Q3_D").style.background == "yellow"){
		Q3 = 4;
	}

	if(document.getElementById("Q4_A").style.background == "purple"){
		Q4 = 1;
	}
	else if(document.getElementById("Q4_B").style.background == "purple"){
		Q4 = 2;
	}
	else if(document.getElementById("Q4_C").style.background == "purple"){
		Q4 = 3;
	}
	else if(document.getElementById("Q4_D").style.background == "purple"){
		Q4 = 4;
	}

	if(document.getElementById("Q5_A").style.background == "cyan"){
		Q5 = 1;
	}
	else if(document.getElementById("Q5_B").style.background == "cyan"){
		Q5 = 2;
	}
	else if(document.getElementById("Q5_C").style.background == "cyan"){
		Q5 = 3;
	}
	else if(document.getElementById("Q5_D").style.background == "cyan"){
		Q5 = 4;
	}

	var d = new Date();
	var datestring = ("0" + d.getDate()).slice(-2) + "-" + ("0"+(d.getMonth()+1)).slice(-2) + "-" +
		d.getFullYear() + " " + ("0" + d.getHours()).slice(-2) + ":" + ("0" + d.getMinutes()).slice(-2) + ":" + ("0" + d.getSeconds()).slice(-2);

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
	newInput5.value = Q5;
	newInput6 = document.createElement('input');
	newInput6.type = 'hidden';
	newInput6.name = 'datestring';
	newInput6.value = datestring;
	theForm.appendChild(newInput1);
	theForm.appendChild(newInput2);
	theForm.appendChild(newInput3);
	theForm.appendChild(newInput4);
	theForm.appendChild(newInput5);
	theForm.appendChild(newInput6);

	document.getElementById('form_container').appendChild(theForm);
	theForm.submit();



	}
