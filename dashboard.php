<?php
session_start();
include 'classes/user.class.php';



if(isset($_SESSION['email']) =="") {
    header("Location: login.php");
}
else{
$eid=$_SESSION['email'];
if(isset($_POST['update']))
{

$fname=$_POST['firstName'];
$lname=$_POST['lastName'];   
$department=$_POST['department']; 
$address=$_POST['address']; 
$mobileno=$_POST['mobileno'];
$sexe= $_POST['gender'];
$date=$_POST['dob'];
$userr = new User;
$userr->update($fname,$lname,$department,$address,$sexe,$mobileno,$eid,$date);

}

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="../vend/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../vend/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../vend/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vend/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../cs/main.css" rel="stylesheet" media="all">
</head>

<body>
    
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Update employee</h2>
                </div>
                <?php 
$eid=$_SESSION['email'];
$user = new User;
$query=$user->select($eid);
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?> 
                <div class="card-body">
                    <form method="POST">
                        <div class="form-row m-b-55">
                            <div class="name">Name

                            </div>
                            <div class="value">
                                <div class="row row-space">
                                
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="firstName" value="<?php echo htmlentities($result->first_name);?>" autocomplete="off" >
                                            <label class="label--desc">First name</label>
                                       
                                    </div>
                                
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="lastName" value="<?php echo htmlentities($result->last_name);?>" autocomplete="off" >
                                            <label class="label--desc">last name</label>
                                    
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name"> Employee Code</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="empcode" value="<?php echo htmlentities($result->empid);?>"readonly autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="<?php echo htmlentities($result->email);?>"autocomplete="off" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="name">User name</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="username" value="<?php echo htmlentities($result->username);?>" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Address</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="address" value="<?php echo htmlentities($result->city);?>" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Phone</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="mobileno" value="<?php echo htmlentities($result->telephone);?>" autocomplete="off" >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="name">Date de naissance</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="date" class="datepicker" name="dob" value="<?php echo htmlentities($result->date_naissance);?>" autocomplete="off" >
                                </div>
                            </div>
                        </div>


                      
                        <div class="form-row">
                            <div class="name">Sexe</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                        <option value="<?php echo htmlentities($result->sexe);?>"><?php echo htmlentities($result->sexe);?></option>                                          
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                         <option value="Other">Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                             
                        <div class="form-row">
                            <div class="name">Departement</div>
                            <div class="value">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
<select  name="department" autocomplete="off">
<option value="<?php echo htmlentities($result->departementname);?>"><?php echo htmlentities($result->departementname);?></option>
<?php
$use = new User;
$query=$use->departement();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;

if($query->rowCount() > 0)
{
foreach($results as $resultt)
{   ?>                                            
<option value="<?php echo htmlentities($resultt->depname);?>"><?php echo htmlentities($resultt->depname);?></option>
<?php }} ?>
</select>
<div class="select-dropdown"></div>
</div>
                                </div>
                            </div>
                        </div>


                            <button class="btn btn--radius-2 btn--red" type="submit" name="update">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php }} ?>

    <!-- Jquery JS-->
    <script src="../vend/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="../vend/select2/select2.min.js"></script>
    <script src="../vend/datepicker/moment.min.js"></script>
    <script src="../vend/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="../j/global.js"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
<?php } ?>