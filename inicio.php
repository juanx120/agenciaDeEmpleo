<?php include('menu.php') ;
include('conection.php');

 //$Idu = $_SESSION['Idu'];
 echo $_SESSION['Idu'];
 echo '<script>';
 echo 'console.log ("el valor de usuario es:"', $_GET['Idu'], $_SESSION['Idu'];
 echo ')</script>';
 ?>



    </div>
</body>