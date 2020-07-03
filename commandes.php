<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ExpressFood</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<div class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <a href='sql.html'> Retour </a><br>
                <img src="./img/order.svg" class="img-fluid" alt="">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">lastname</th>
                            <th scope="col">firstname</th>
                            <th scope="col">numTel</th>
                            <th scope="col">order title</th>
                            <th scope="col">dish title</th>
                            <th scope="col">quantity</th>
                            <th scope="col">price</th>
                            <th scope="col">order price</th>
                            <th scope="col">status</th>
                            <th scope="col">createdAt</th>
                        </tr>
                    </thead>

<?php

try
{
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=expressfood', 'root', '');

}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
$bdd->exec("set names utf8");

$reponse = $bdd->query("SELECT `order`.id, user.lastname, user.firstname, `order`.price, `order`.title, `order`.createdAt, `order`.numTel, dish.title, dish.price, content.quantity, `order`.status FROM `order`, content, dish, user WHERE `order`.id = content.idOrder AND content.idDish = dish.id AND `order`.idUser = user.id");



while ($donnees = $reponse->fetch())
{

    $id = $donnees[0];
    $lastname = $donnees[1];
    $firstname = $donnees[2];
    $price = $donnees[3];
    $orderTitle = $donnees[4];
    $orderCreatedAt = $donnees[5];
    $numTel = $donnees[6];
    $dishTitle = $donnees[7];
    $dishPrice = $donnees[8];
    $quantity = $donnees[9];
    $status = $donnees[10];


    echo "
           <tbody>
                <tr>
                  <th scope=\"row\">$id</th>
                  <td>$lastname</td>
                  <td>$firstname</td>               
                  <td>$numTel</td>
                  <td>$orderTitle</td>  
                  <td>$dishTitle</td>  
                  <td>$quantity</td>
                  <td>$dishPrice</td>  
                  <td>$price</td> 
                  <td>$status</td>
                  <td>$orderCreatedAt</td>
                </tr>
          </tbody>
   ";

}

?>

                </table>
            </div>
        </div>
    </div>
</div>
</body>