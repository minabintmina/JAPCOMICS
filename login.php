<?php
    try{
        $pdo=new PDO('mysql:host=localhost;dbname=mangabooks','root','');
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $lib=$_POST['email'];
            $prix=$_POST['password'];
            $a=$pdo->prepare("SELECT nameCl,emailCl,paswordCl from client where emailCl='$lib' and passwordCl='$prix'");
            $a->execute();
            $p=$a->fetch();
            if($p["emailCl"]!=null && $p["passwordCl"]!=null){
                $_SESSION["emailCl"] = $p["emailCl"];
                $_SESSION["passwordCl"] = $p["passwordCl"];
                $_SESSION["nameCl"] = $p["nameCl"];
                echo "<p>Welcome Back ".$_SESSION["nameCl"]."<a href='logout.php'>Deconnecter</a>";
            }
            else
            echo "Sorry but you do not have an account. Sign Up first!!!";
            echo "<script>Your inscription has been confirmed.</script>";
            exit();
          $a->closeCursor();
         $pdo=null;
        }
        catch (Exception $e) {
            echo "ERREUR : ".$e->getMessage() ;
            echo "Sorry but you do not have an account. Sign Up first!!!";
            }
    ?>