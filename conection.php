<?php
$serverName = "agenciadeempleo-server.database.windows.net"; 
$connectionOptions = array(
    "Database" => "AgenciaDeEmpleoBogotaDB", 
    "Uid" => "JuanG", 
    "PWD" => "Noselaclave_23" 
);
//Establece la conexión
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) {
    die(formatErrors(sqlsrv_errors()));
    echo("F");
}
else{
    echo("Sirvio, perros XDXDXDX");
}



$resultado = sqlsrv_query($conn, 'SELECT * from [dbo].[usuario]');
// O usando el estilo orientado a objetos
$resultado = $conn->query('SELECT * from [dbo].[usuario]');
// Verificar si la consulta fue exitosa
if ($resultado) {
  // Hacer algo con el resultado, por ejemplo mostrar los datos
  while ($fila = sqlsrv_fetch_assoc($resultado)) {
    echo $fila["columna1"] . " " . $fila["columna2"] . "<br>";
  }
} else {
  // Mostrar un mensaje de error
  echo "La consulta falló: " . sqlsrv_error($conn);
}

?>
