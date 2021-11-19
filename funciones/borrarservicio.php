<?php 
include("funciones.php");
$id = $_GET['idcita'];
delete('cita','idcita',$id);
header("location: ../vistasadmin/servicios.php");
?>