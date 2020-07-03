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
                <img src="./img/opinion.svg" class="img-fluid" alt="">
                <table class="table">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">mark</th>
                        <th scope="col">message</th>
                        <th scope="col">title</th>
                        <th scope="col">date</th>
                        <th scope="col">price</th>
                        <th scope="col">lastname</th>
                        <th scope="col">firstname</th>
                        <th scope="col">numtel</th>
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

                    $reponse = $bdd->query("SELECT opinion.id, opinion.mark, opinion.message, `order`.title, `order`.`createdAt`, `order`.`price`, user.lastname, user.firstname, user.numTel FROM opinion, `order`, user WHERE opinion.idOrder = `order`.id AND `order`.idUser = user.id");


                    while ($donnees = $reponse->fetch())
                    {
                        $id = $donnees[0];
                        $mark = $donnees[1];
                        $message = $donnees[2];
                        $title = $donnees[3];
                        $createdAt = $donnees[4];
                        $price = $donnees[5];
                        $lastname = $donnees[6];
                        $firstname = $donnees[7];
                        $numtel = $donnees[8];

                        echo "
          <tbody>
                <tr>
                  <th scope=\"row\">$id</th>
                  <td>$mark</td>
                  <td>$message</td>
                  <td>$title</td>
                  <td>$createdAt</td>
                  <td>$price</td>
                  <td>$lastname</td>
                  <td>$firstname</td>
                  <td>$numtel</td>
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

