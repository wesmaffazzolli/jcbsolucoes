<?php

function confirmQuery($result) {
    global $connection;
    
    if(!$result) {
        die("QUERY FAILED ". mysqli_error($connection));
    }
    
}

function escape($string) {
	global $connection;
	return $escaped_string = mysqli_real_escape_string($connection, trim($string));
}

function sucesso($string) {
	"<div class='alert alert-success'>
	<strong>Sucesso!</strong>' '.{$string}</div>";
}

function erro($string) {
	echo "<div class='alert alert-danger'>
	<strong>Erro!</strong>' '.{$string}</div>";
}

?>