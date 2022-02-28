function wronglogin()
{
    var user=document.getElementById("uname").value;
    var password=document.getElementById("psw").value;

    if((user=="admin") && (password=="admin"))
    {
        return true;
	}
	else
	{
		document.getElementById('error-log').innerHTML = "Credenziali non valide *";
		return false;
	}
}