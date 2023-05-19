<?php include('menu.php') ;
include('conection.php');
session_start();
 //$Idu = $_SESSION['Idu'];
 echo $_SESSION['Idu'];
 echo '<script>';
 echo 'console.log ("el valor de usuario es:"', $_GET['Idu'];
 echo ')</script>';
 ?>



    </div>
</body>