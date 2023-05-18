<?php include('menu.php') ;
session_start();
 $Idu = $_SESSION['Idu'];
 echo $_SESSION['Idu'];
 echo '<script>';
 echo 'console.log ("el valor de usuario es:", <?php $Idu ?';
 echo '</script>';
 ?>



    </div>
</body>