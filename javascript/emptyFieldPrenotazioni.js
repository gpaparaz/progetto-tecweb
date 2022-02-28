function emptyFieldPrenotazioni() {
    //var event = document.forms["formPrenotazioni"]["evento"].value;
    var nom = document.forms["formPrenotazioni"]["nominativo"].value;
    var posti = document.forms["formPrenotazioni"]["nposti"].value;
    var em = document.forms["formPrenotazioni"]["email"].value;
    var pattern = /^[a-zA-Z0-9\-_]+(\.[a-zA-Z0-9\-_]+)*@[a-z0-9]+(\-[a-z0-9]+)*(\.[a-z0-9]+(\-[a-z0-9]+)*)*\.[a-z]{2,4}$/;
    var checknom=/^[A-Za-z\/\'\s]+[A-Za-z]$/;
    var regposti= /^[0-9]{1,4}$/;
    
     if(nom == "" || !checknom.test(nom)){
      document.getElementById('error-nome').innerHTML = " Inserisci Nome e Cognome *";
      return false;
    }
    if(posti==0 || !regposti.test(posti)){
      document.getElementById('error-posti').innerHTML = " Inserisci un numero di posti valido *";
      return false;
    }
    if(em == "" || !pattern.test(em)){
      document.getElementById('error-mail').innerHTML = " Inserisci una mail valida *";
      return false;
    }

    
    return true;
  }