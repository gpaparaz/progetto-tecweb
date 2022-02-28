<?php
#Fare il login

#Richiede connessione+la pagina php della login
session_start();
include_once 'php/Connessione/connection.php';

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $user=$_POST['uname'];
    $password=$_POST['psw'];

    if(isset($_SESSION['uname']))
        header("location: Admin/amministrazione.php");
else{
    $sql="SELECT * FROM admin WHERE username='$user' AND passwordz='$password'";
    $res=mysqli_query($conn, $sql);
    
    if(mysqli_num_rows($res)!=0){
        $_SESSION['uname']=$user;
        header("location: Admin/amministrazione.php");
    }
    else{
        $page=file_get_contents("html/login.html");
        $footer=file_get_contents("footer/footer.html");
        $header=file_get_contents("header/header.html");
        $page=str_replace('$header$', $header ,$page);
        $page=str_replace('$footer$', $footer, $page);
        $page=str_replace('$errorlogin$', "Credenziali non valide *", $page);
        $page=str_replace('$breadcrumb$', '/ Login' ,$page);
        echo $page;
        }
    }
}
?>