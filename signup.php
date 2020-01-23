<?php

    session_start();

    include 'classes/user.class.php';

    if(isset($_SESSION['username'])!="") {
        header("Location: dashboard.php");
    }

    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $telephone = $_POST['telephone'];
        $lastname = $_POST['lastname'];
        $firstname = $_POST['firstname'];
        $ville = $_POST['ville'];
        $date = $_POST['date'];
        $sexe = $_POST['sex'];
        $departement=$_POST['departement'];
        $cpassword = $_POST['cpassword'];

        if (!preg_match("/^[a-zA-Z0-9 ]+$/",$username)) {
            $username_error = "Name must contain only letters, numbers and space";
            goto error;
        }
        
        if (!preg_match("/^[a-zA-Z0-9 ]+$/",$ville)) {
            $ville_error = "Name must contain only letters, numbers and space";
            goto error;
        }
        if (!preg_match("/^[a-zA-Z0-9 ]+$/",$departement)) {
            $departement_error = "Departement name must contain only letters, numbers and space";
            goto error;
        }
        if ( !preg_match ("/^[a-zA-Z\s]+$/",$firstname)){
            $name_error = "first name and last name contain only letters";
            goto error;
        }
        if ( !preg_match ("/^[a-zA-Z\s]+$/",$lastname)){
            $name_error = "first name and last name contain only letters";
            goto error;
        }


        if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $email_error = "Please Enter Valid Email";
            goto error;
        }

        if(strlen($password) < 6) {
            $password_error = "Password must be minimum of 6 characters";
            goto error;
        }
        if(strlen($telephone) < 8) {
            $telephone_error = "Numero de telephone  must be minimum of 8 numbers";
            goto error;
        }

        if($password != $cpassword) {
            $cpassword_error = "Password and Confirm Password doesn't match";
            goto error;
        }

        $user = new User;
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $user->register($username,$email,$hashed_password,$firstname,$lastname,$ville,$sexe,$telephone,$date,$departement);
        header('Location:login.php');
        exit();
    }
    error:
    include 'signup.phtml';