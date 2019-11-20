<?php
    require 'dbconnexion.php';

    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $id =$_POST['id'];

    $req= $cnx->prepare(
        'UPDATE students SET firstname = :firstname , lastname = :lastname , email= :email , phone= :phone WHERE id= :id'


    );
    $req->bindParam(':firstname',$firstname);
        $req->bindParam(':lastname',$lastname);
        $req->bindParam(':email',$email);
        $req->bindParam(':phone',$phone);
        $req->bindParam(':id',$id);
        $req->execute();

        header('Location:index.php');

?>