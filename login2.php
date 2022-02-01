<?php 
session_start();


if (isset($_POST['submit'])){

    $email = $_POST ['email'];
    $pass = $_POST ['pass'];
    $user = "root";

    $db = new PDO('mysql:host=localhost;dbname=bdd_vagabons;', $user , "");


    $sql ="SELECT * FROM users WHERE email = '$email' ";
    $result = $db -> prepare($sql);
    $result ->execute();

    if($result -> rowCount() > 0){

        $data = $result-> fetchAll();
        if (password_verify($pass,$data[0]['password'])){
          
            echo "Connexion ok";
            $_SESSION['email']= $email;
            // header('Location: http://localhost:8000/index.php');
            // Exit();
        }


    }else{

        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users(email,password) VALUES ('$email','$pass')";
        $req = $db ->prepare($sql);
        $req -> execute();
        echo "Enregistrement effectué";
    }

}




?>