mynum = parseInt(prompt("Design a number value: "));
mynum_2=3;

document.write("Number: "+mynum+"."+ "<br>");


mychain="Hello ";
mychain_2="World";

mychain_3=mychain+mychain_2;

document.write("Phrase: "+mychain_3+"."+ "<br>");

if (mynum<mynum_2) {
	document.write("The number "+mynum+" is lower than "+mynum_2+"."+"<br>");
}else if(mynum>mynum_2){
	document.write("The number "+mynum+" is higher than "+mynum_2+"."+"<br>");
}else {
	document.write("The number "+mynum+"and "+mynum_2+" are equals.");
}

switch (mynum){
	case 1:
	case 2:
	case 3:

		document.write("The number is between 1 and 3 (Group 1, Value: "+mynum+")."+"<br>");
	break;

	case 4:
	case 5:
	case 6:
		document.write("The number is between 4 and 6 (Group 2, Value: "+mynum+")."+"<br>");
	break;

	case 7:
	case 8:
	case 9:
	case 10:
		document.write("The number is between 7 and 10 (Group 3, Value: "+mynum+")."+"<br>");
	break;

	default:
		document.write("The number is not exists between 1 and 10, Value: "+mynum+".");
}

for (mynum_2=0; mynum_2<=mynum; mynum_2++){
	console.log("The number is: "+mynum_2+"<br>");
}