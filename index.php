<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container">
        <div class="jumbotron">
            <h1 class="text-center">
              Liste des étudiants DSI 22 G2 2019
            </h1>
        </div>

    
<a href="create.php"> <button class="btn btn-primary">Ajouter etudient</button></a>
    <table class="table">
    <thead class="thead-dark">
        <th>id</th>
        <th>first name</th>
        <th>last name</th>
        <th>email</th>
        <th>phone</th>
        <th>operation</th>

    </thead>
    <tbody>
        <?php

include 'dbconnexion.php';
$rep=$cnx->query('SELECT * FROM students');
while($data=$rep->fetch()){
    echo '<tr>';
    echo '<td>'.$data['id'].'</td>';
    echo '<td>'.$data['firstname'].'</td>';
    echo '<td>'.$data['lastname'].'</td>';
    echo '<td>'.$data['email'].'</td>';
    echo '<td>'.$data['phone'].'</td>';

    echo '<td><a href="edit.php?id='.$data['id'].'"><button type="submit" class="btn btn-success">Editer</button></a> &nbsp;&nbsp;';
        echo ' <a href="delete.php?id='.$data['id'].'"><button type="submit" class="btn btn-danger">Supprimer</button></a>  </td>';
}
?>
    </tbody>
</table>
</div>
    

</body>
</html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>