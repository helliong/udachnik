<?php
    session_start();
    include 'functions.php';

try{
$db=new PDO('mysql:host=localhost; dbname=blog', 'root', '');
}

catch (PDOException $e){
    print "Error:" . $e->getMessage()."<br>"; die();
}

$user=null;

if(isset($_SESSION['auth_user_id'])){
    $user= getUser($_SESSION['auth_user_id']) ;
}

if(isset($forAuth) && !$user){
    redirect ('login.php');
    
}