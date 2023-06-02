<?php
try{
    $pdo=new PDO('mysql:host=localhost;dbname=mangabooks','root','');
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $num=$_POST['username'];
        $lib=$_POST['email'];
        $prix=$_POST['password'];
        $a=$pdo->prepare("INSERT INTO client(nameCl,emailCl,passwordCl) VALUES ('$num','$lib','$prix')");
        $a->execute();
        header("Location: login.php");
        echo "<script>alert( Your inscription has been confirmed!!!)</script>";
        exit();
      $a->closeCursor();
     $pdo=null;
    }
    catch (Exception $e) {
        echo "ERREUR : ".$e->getMessage() ;
        }
?>