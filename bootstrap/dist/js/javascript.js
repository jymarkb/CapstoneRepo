function curYear(){
var start = 1900;
var end = new Date().getFullYear();
var options = "";
for(var year = start ; year <=end; year++){
  options += "<option>"+ year +"</option>";
}
document.getElementById("year").innerHTML = options;

}

function curDay(){
var optionday = "";
for (var i = 1; i < 32; i++) {
	optionday += "<option>"+ i +"</option>";
}
document.getElementById("day").innerHTML = optionday;
}


function loadDate(){
	curYear();
	curDay();
}

