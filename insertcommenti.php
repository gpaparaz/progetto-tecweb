<?php
session_start();
include_once 'php/Connessione/connection.php';
if(isset($_POST['submit'])){
	$nominativo=mysqli_real_escape_string($conn, $_POST['nome']);
	$email=$_POST['email'];
	$oggetto=mysqli_real_escape_string($conn, $_POST['oggetto']);
	$data=date('y-m-d');
	
	

	if(empty($nominativo))
	{
		$page=file_get_contents("html/chisiamo.html");
		$footer=file_get_contents("footer/footer.html");
		$header=file_get_contents("header/header.html");
		$page=str_replace('$errornome$', "Inserisci Nome e Cognome *", $page);
		$page=str_replace('$errormail$', "", $page);
		$page=str_replace('$errorobj$', "", $page);
		$page=str_replace('$header$', $header ,$page);
		$page=str_replace('$footer$', $footer, $page);
		$page=str_replace('$breadcrumb$', '/ Chi Siamo' ,$page);
		echo $page;
	}
	else if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
		$page=file_get_contents("html/chisiamo.html");
		$footer=file_get_contents("footer/footer.html");
		$header=file_get_contents("header/header.html");
		$page=str_replace('$errornome$', "", $page);
		$page=str_replace('$errormail$', "Mail non valida", $page);
		$page=str_replace('$errorobj$', "", $page);
		$page=str_replace('$header$', $header ,$page);
		$page=str_replace('$footer$', $footer, $page);
		$page=str_replace('$breadcrumb$', '/ Chi Siamo' ,$page);
		echo $page;

	}

	else if(empty($oggetto)){
		$page=file_get_contents("html/chisiamo.html");
		$footer=file_get_contents("footer/footer.html");
		$header=file_get_contents("header/header.html");
		$page=str_replace('$errornome$', "", $page);
		$page=str_replace('$errormail$', "", $page);
		$page=str_replace('$errorobj$', "Compilare il campo Oggetto", $page);
		$page=str_replace('$header$', $header ,$page);
		$page=str_replace('$footer$', $footer, $page);
		$page=str_replace('$breadcrumb$', '/ Chi Siamo' ,$page);
		echo $page;

	}

	/*if(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		echo 'Inserire una mail valida';
		exit();
	}*/

	else
    {
        $sql="INSERT INTO commenti (nominativo, email, oggetto, datacommento) VALUES ('$nominativo', '$email', '$oggetto', '$data')";
        $insert=$conn->query($sql);

        if($insert)
            header("location: grazie.php");
    }
}
?>