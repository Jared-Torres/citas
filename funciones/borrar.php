<?php 
include("funciones.php");
$id = $_GET['idorden'];
delete('orden','idorden',$id);
header("location: ../vistasadmin/citas-cliente.php");
?>