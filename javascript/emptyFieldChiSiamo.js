function emptyFieldChiSiamo() {
    var name = document.forms["contattaciform"]["nome"].value;
    var em = document.forms["contattaciform"]["email"].value;
    var obj = document.forms["contattaciform"]["oggetto"].value;
    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
    var checkname=/^[A-Za-z\/\'\s]+[A-Za-z]$/
    
    if (name == "" || !checkname.test(name)){
      document.getElementById('error-name').innerHTML = " Inserisci Nome e Cognome *";
      return false;
  	}
    if(em == "" || !pattern.test(em)){
      document.getElementById('error-email').innerHTML = " Inserisci una mail valida *";
      return false;
    }

    if(obj == ""){
      document.getElementById('error-obj').innerHTML = " Commento vuoto *";
      return false;
    }
    return true;
  }