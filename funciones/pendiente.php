<?php 
include("funciones.php");

$id = $_GET['idorden'];
update('orden','estado','pendiente','idorden' ,$id);
header("location: ../vistasadmin/citas-cliente.php");
?>