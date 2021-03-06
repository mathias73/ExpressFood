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
            <img src="./img/customer.svg" class="img-fluid" alt="">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">lastname</th>
                        <th scope="col">firstname</th>
                        <th scope="col">numTel</th>
                        <th scope="col">pseudo</th>
                        <th scope="col">age</th>
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

$reponse = $bdd->query("SELECT id, lastname, firstname, numTel, pseudo, age, createdAt FROM user WHERE type = 'customer'");


while ($donnees = $reponse->fetch())
{
    $id = $donnees["id"];
    $lastname = $donnees["lastname"];
    $firstname = $donnees["firstname"];
    $numTel = $donnees["numTel"];
    $pseudo = $donnees["pseudo"];
    $age = $donnees["age"];
    $createdAt = $donnees["createdAt"];


echo "
          <tbody>
                <tr>
                  <th scope=\"row\">$id</th>
                  <td>$lastname</td>
                  <td>$firstname</td>
                  <td>$numTel</td>
                  <td>$pseudo</td>
                  <td>$age</td>
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