<?php
$serverName = "serveragenciadeempleobg.database.windows.net"; 
$connectionOptions = array(
    "Database" => "AgenciaDeEmpleoBogotaDB", 
    "Uid" => "est.david.diaz2@unimilitar.edu.co", 
    "PWD" => "JuanMapu123",
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
