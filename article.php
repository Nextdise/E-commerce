<?php 

$user = "root";

$bdd = new PDO('mysql:host=localhost;dbname=bdd_vagabons;', $user , "");

$allproduct = $bdd->query ('SELECT name,id_product,stock,color,price,description FROM product WHERE id_product= "'.$_GET['id_product'].'"');

$product =$allproduct ->fetch();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product['name']; ?></title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

</head>
<body>
    <style>
        body{
            background: url("https://static.bayard.io/notretemps.com/images/production/2021/03/25/sorties-nature-4-forets-ou-il-fait-bon-flaner.jpg")center/cover;
        }
    </style>

    <div id = "header">
    <button type ="button" class ="btn btn-2 btn-sep icon-home"onclick ="window.location.href='index.php?s=&envoyer+la+donn%C3%A9e=Envoyer';"> Home </button>
    </div>





    <div class = "itemMid">
                                
        <div class="flex-container2">
                                
            <div class="card2">
                <div class ="itemTitle"> 
                    <h1><strong> <u><?= $product['name']; ?></u> </strong></h1>
                </div>

                <div class ="itemPic">
                    <img class ="imagee2" src=" <?= $product['color'];?>"/>
                </div>

                <div class ="itemDescription">
                    <h3> <?= $product['description']; ?> </h3>
                    <h4>Nombre en stock : <?= $product['stock'];?> produits</h4>
                    <div class ="prix">
                        <h3>Prix:<?= $product['price'];?> € </h3>
                        <div class="truc">
                            <label for="quantity"> Quantité (entre 1 et <?= $product['stock'];?>):</label>
                            <input type="number" id="quantity" name="quantity" min="1" max="<?= $product['stock'];?>">
                        </div>
                    </div>
                    
                </div>
                <div class =buttonPanier>
                    
                    <button type ="button" class ="btn btn-2 btn-sep icon-cart"> Ajouter au panier</button>
                    
                </div>
            </div>
        </div>

    </div>

    
</body>
</html>