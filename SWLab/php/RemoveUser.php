<?php include '../php/DbConfig.php' ?>
<?php

    $email=$_GET['email'];
    $link = mysqli_connect ($server, $user, $pass, $basededatos);


    $sql = "DELETE FROM Usuarios WHERE email = '$email'";

    $result = mysqli_query($link, $sql);
    
    

     
    
     if (!mysqli_query($link, $sq1))
     {
        mysqli_close($link);
      
        echo "<script>
            location.href='../php/HandlingAccounts.php';
          </script>";
     }else{
       
        echo "<span style='color:red'>Se ha producido algun error, vuelve a intentarlo </span>";
        echo "<a href='javascript:history.back();'>Atrás</a>";
        mysqli_close($link);
      
      }

    
    
    

?>