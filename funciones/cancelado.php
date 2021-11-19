<?php 
include("funciones.php");

$id = $_GET['idorden'];
update('orden','estado','cancelado','idorden' ,$id);
header("location: ../vistasadmin/citas-cliente.php");
?>