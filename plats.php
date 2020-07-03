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
                <a href='sql.html'> Retour </a>
                <img src="./img/dish.svg" class="img-fluid" alt="">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">title</th>
                            <th scope="col">description</th>
                            <th scope="col">availableDateBegin</th>
                            <th scope="col">availableDateEnd</th>
                            <th scope="col">price</th>
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
$reponse = $bdd->query("SELECT id, title, description, availableDateBegin, availableDateEnd, price, createdAt FROM dish");



while ($donnees = $reponse->fetch())
{

    $id = $donnees["id"];
    $title = $donnees["title"];
    $description = $donnees["description"];
    $availableDateBegin = $donnees["availableDateBegin"];
    $availableDateEnd = $donnees["availableDateEnd"];
    $price = $donnees["price"];
    $createdAt = $donnees["createdAt"];

    echo "
           <tbody>
                <tr>
                  <th scope=\"row\">$id</th>
                  <td>$title</td>
                  <td>$description</td>
                  <td>$availableDateBegin</td>
                  <td>$availableDateEnd</td>
                  <td>$price</td>
                  <td>$createdAt</td>
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
