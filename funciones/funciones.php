<?php
function db_query($query) {
    $connection = mysqli_connect("localhost","root","","gestor-citas");
    $result = mysqli_query($connection,$query);

    return $result;
}
function db_query2($query) {
    $connection = mysqli_connect("localhost","root","","gestor-citas");
    $result = mysqli_query($connection,$query);

    return $result;
}

function delete($tblname,$field_id,$id){ //Funcion para borrar registros

	$sql = "delete from ".$tblname." where ".$field_id."=".$id."";
	
	return db_query($sql);
}
function update($tblname,$fieldname,$que, $id, $iddonde){ //Funcion para actualizar registros
   
	$sql = "update ".$tblname." set " .$fieldname. " = '" . $que . "'   where ".$id."=".$iddonde."";
	
	return db_query($sql);
}

function select_id($tblname,$field_name,$field_id){
	$sql = "Select * from ".$tblname." where ".$field_name." = ".$field_id."";
	$db=db_query($sql);
	$GLOBALS['row'] = mysqli_fetch_object($db);

	return $sql;
}
?>