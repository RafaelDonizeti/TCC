<?php 
session_start();
if(isset ($_SESSION['email'])){
    session_destroy();
header('location: /Aulasphp/TCC/LOGIN/pageLogin.php');

};

?>