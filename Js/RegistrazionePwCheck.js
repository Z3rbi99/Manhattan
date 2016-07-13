function checkPass() {
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');
    var message = document.getElementById('confirmMessage');
	
    var goodColor = "#66cc66";
    var badColor = "#ff6666";

    if(password1.value == password2.value){
        password2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Le password corrispondono."
		return true;
    }else{
        password2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Le password non corrispondono."
		return false;
    }
}  
/*
function checkPassAndGo(event) {
	if(!checkPass()) 
		event.preventDefault();
}*/