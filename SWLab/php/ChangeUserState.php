<?php include '../php/DbConfig.php' ?>
<?php

    $email=$_GET['email'];
    $link = mysqli_connect ($server, $user, $pass, $basededatos);


    $sql = "SELECT * FROM Usuarios Where email='$email'";

    $result = mysqli_query($link, $sql);
    
    
    if (mysqli_fetch_assoc($result)['Estado']=='Bloqueada'){
      $sq2="UPDATE Usuarios SET Estado='Activada' WHERE email='$email'";
    
     if (mysqli_query($link, $sq2))
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

    }
    else {
      $sq2="UPDATE Usuarios SET Estado='Bloqueada' WHERE email='$email'";
    
     if (mysqli_query($link, $sq2))
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
    }
    echo "<script>
            location.href='../php/HandlingAccounts.php';
          </script>";
   
    

?>