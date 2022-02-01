<?php
$user = "root";
$pass = "";
$bdd = new PDO('mysql:host=localhost;dbname=bdd_vagabons;', $user , $pass);
$allarticles = $bdd ->query('SELECT * FROM product ORDER BY id_product DESC');
$checks = isset($_GET['s']) AND!empty($_GET['s']);
if ($checks){
    $recherche = htmlspecialchars($_GET['s']);
    $allproduct = $bdd->query ('SELECT name,id_product FROM product WHERE name LIKE "%'.$recherche.'%" ORDER BY id_product DESC');
    $imagesProduct = $bdd ->query ('SELECT color FROM product WHERE name LIKE "%'.$recherche.'%" ORDER BY id_product DESC');
    $descriptionProduct=$bdd->query ('SELECT description,price FROM product WHERE name LIKE "%'.$recherche.'%" ORDER BY id_product DESC');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vagabonds Inc.</title>
    <link rel="stylesheet" href="style.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
</head>



<body>
    <?php 
    if (isset($_SESSION['email'])){
        file_put_contents('php://stderr', print_r("connecté\n", true));




    
    }else{
        ?>
    <div id="header">
        <h1 class=titre>Vagabonds Inc.</h1>

        <div class= "buttonHeader">



            <button type ="button" class="btn btn-2 btn-sep icon-cart" onclick ="window.location.href='';"> Panier </button>


            <button type ="button" class="btn btn-2 btn-sep icon-man" onclick ="window.location.href='login.php';"> Sign in </button>



        </div>


    </div>




    <div class= "Mid">

        <h2 class ="titre">Vagabonds Inc.</h2>


    </div>

    <div class ="MidBot">

        <div class = "barreSearch">                    
            <form method="get">

                <input type="search" class="textbox" name= "s" placeholder="Nos article">
                <input type="submit" class="buttonn" name= "envoyer la donnée" >


                <!-- <label for="search">Search</label>
	            <input id="search" type="search" name="s" pattern=".*\S.*" required>
	            <span class="caret"></span> -->
                
            </form>
        </div>

      
    </div>
    <div class=indexMid>


    
        <section class ="affichage_articles" >
            <?php
                if($checks && $allproduct->rowCount() > 0){
                    
                    while($user = $allproduct->fetch() ){
                        $image= $imagesProduct->fetch();
                        $description = $descriptionProduct->fetch()?>
                        
                        
                        <div class="flex-container">
                            
                            <div class="card">
                            <p class ="nameArticle" ><strong><u><?= $user['name']; ?></u></strong</p>
                                <div class="flex-container">
                                    
                                    <img class ="imagee" src=" <?= $image['color'];?>"/>
                                    <p><?=$description['description']; ?></p>
                                    <h3>Prix:<?= $description['price'];?> € </h3>
                                    
                                </div>
                                <div class ="b-flex">
                                    <button type ="button" class ="btn btn-2 btn-sep icon-search" onclick ="window.location.href='article.php?id_product=<?= $user['id_product']; ?>' ;" > En voir plus </button>
                                    <button type ="button" class ="btn btn-2 btn-sep icon-cart"> Ajouter au panier</button>
                                </div>

                            </div>
                        </div>

                        <?php
                    }

                }
                else {
                    ?>
                    <h1 class = "rien"> Aucun article trouvé, désolé... </h1>
                    <?php 
                }

                ?>

        </section>
    </div>
    <?php
    }
    ?>

  
    
    
</body>
</html>