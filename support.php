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
                <img src="./img/support.svg" class="img-fluid" alt="">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">date</th>
                        <th scope="col">status</th>
                        <th scope="col">message</th>
                        <th scope="col">lastname</th>
                        <th scope="col">firstname</th>
                        <th scope="col">numtel</th>
                        <th scope="col">email</th>
                        <th scope="col">type</th>
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

                    $reponse = $bdd->query("SELECT support.id, support.date, support.status, support.message, user.lastname, user.firstname, user.numTel, user.email, user.type FROM support, user where support.idUser = user.id");


                    while ($donnees = $reponse->fetch())
                    {
                        $id = $donnees[0];
                        $date = $donnees[1];
                        $status = $donnees[2];
                        $message = $donnees[3];
                        $lastname = $donnees[4];
                        $firstname = $donnees[5];
                        $numTel = $donnees[6];
                        $email = $donnees[7];
                        $type = $donnees[8];

                    echo "
          <tbody>
                <tr>
                  <th scope=\"row\">$id</th>
                  <td>$date</td>
                  <td>$status</td>
                  <td>$message</td>
                  <td>$lastname</td>
                  <td>$firstname</td>
                  <td>$numTel</td>
                  <td>$email</td>
                  <td>$type</td>
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

