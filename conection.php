<?php
$serverName = "serveragenciadeempleobg.database.windows.net"; 
$connectionOptions = array(
    "Database" => "AgenciaDeEmpleoBogotaDB", 
    "Uid" => "JuanG", 
    "PWD" => "Noselaclave_23",
    "Authentication" => "ActiveDirectoryPassword"
);
//Establece la conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(formatErrors(sqlsrv_errors()));
    echo '<script> console.log("no sirvio");</script>';
    echo("F");
}
else{
    //echo("Sirvio, perros XDXDXDX");
}
?>
