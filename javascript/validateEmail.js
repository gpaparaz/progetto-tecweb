function validateEmail(){
    
    var email = document.getElementById("input10").value;
	var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
    if (pattern.test(email)) {
        return true;
    } else {
        document.getElementById('error-mail').innerHTML = " Inserisci una mail valida *";
        return false;
    }
}