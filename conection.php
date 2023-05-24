<?php
session_start();
$serverName = "agenciadeempleo-server.database.windows.net"; 
$connectionOptions = array(
    "Database" => "AgenciaDeEmpleoBogotaDB", 
    "Uid" => "est.juan.gomez39@unimilitar.edu.co", 
    "PWD" => "Noselaclave20",
    "Authentication" => "ActiveDirectoryPassword"
);
//Establece la conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(formatErrors(sqlsrv_errors()));
    echo("F");
}
else{
    //echo("Sirvio, perros XDXDXDX");
}
?>
