<?php 
session_start();
require 'connection.php'; 

/*
$user_name = $_GET['user_name'];
$password = $_GET['password'];
$action = $_GET['action'];
*/

$username = "";
$password = $confirm_password = "";
$username_error = $password_error = "";

$not_loggedin = '<div class="position-right">
<button type="button" class="btn btn-primary mx-2 px-3" data-toggle="modal" data-target="#exampleModal">
Login
</button>
          
<button type="button" class="btn btn-primary mx-2 px-3" data-toggle="modal" data-target="#exampleModal2">
Register
</button>
</div>';

/*retrives the SESSION COOKIE USER_ID, the process
 after logging in is stored in the cookie-sesion*/
 $username_show = $_SESSION['user_id'];   
//selects the username from the database where the id is equal to the user_id.
 $sql = "SELECT username FROM users WHERE id = :id";
 //prepare to execute the code via $pdo which is the database
 $stmt = $pdo->prepare($sql);
 //binds both the :id from the database and connects it to the user_id
   $stmt->bindValue(':id', $username_show);
   //executes the code
    $stmt->execute();
    //fetch_assoc because I only want to fetch 1 value per column.
    $user_name = $stmt->fetch(PDO::FETCH_ASSOC);
    //now that $user_name['username']
    $_SESSION['user_name'] = $user_name['username'];
    $logged_in = $_SESSION['user_name'];
/*
    $username_sql = $sql = "SELECT id FROM users WHERE username = ?";

        if(empty($_POST["username"])) {
            $username_error = "Please enter a username.";
        } else {
            $username_sql;
        
             //bind variables to the prepared statement as parameters
            if($stmt = $link->prepare($sql)) {
                $stmt->bindParam(1, $param_username);
            
                //Set parameters
                $param_username = $_POST["username"];

            //May need to type ($link->execute(array($stmt))), unsure though, if ERROR appears on the line below then try this. 

        if($stmt->execute()) {
            $stmt->fetch();
        
            //Row has to be equal to it's own number, uniqueness
            if($row = $stmt->rowCount() == 1) {
                ////Each row has to be unique 
                 $username_error = "This username is already taken.";
            } else {
                $username = ($_POST["username"]);
            }
        } else {
            echo "Something went wrong, please try again later";
        }
            }
            /* could type $stmt->close(); and thereafter
             $db->close(); on the row below the first statment, though there is no need to do so because after the php is runned 
             the statement automatically becomes NULL*/
       /* }
    
        //password 
        
        if(empty($_POST["password"])) {
            $password_error = "Please enter a password";
        } elseif(strlen($_POST["password"]) < 6)  { 
            $password_error = "You must have more than 6 characters";
        } else {
            $password = $_POST["password"];
        }
        //confirm password
        if(empty($_POST["confirm_password"])) {
            $password_error = "Please confirm password";
        } else {
            $confirm_password = $_POST["confirm_password"];
            if(empty($password_error) && ($password != $confirm_password)) {
                $confirm_password_error = "Password does not match";
            }        
        }
        
            //validate le password
        if(empty($username_error) && empty($password_error) && empty($confirm_password_error)) {
            //prepare a select statement
            $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
            
                if($stmt = $link->prepare($sql)) {
                    //bind variables to the prepared statemant as parameters
                    $stmt->bindParam(2, $param_username, $param_password); 

                    //set parameters
                    $param_username = $username;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); //hashes the password

                    if(execute($stmt)) {
                        header("location: index.php");
                    } else {
                        $result='<div class="alert alert-danger">Sorry there seems to be a problem, try re-doing it or try again later. </div>';
                    }
                }
            }
            */
                
              //"too MANY REDIRECTS BUG HOW TO FIX: https://stackoverflow.com/questions/5269813/php-how-to-hide-text-from-users-who-are-not-logged-in
                                    //ALLTSÅ SKA DU ÄNDRA PÅ "HEADER(LOCATION: INDEX) PÅ BÅDE ÖVRE OCH NEDRE KOD.

                                    include_once 'login.php';
?>                              

<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Musiplay: Home</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="stylesheet" source="">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand h1">Home</a>
                <?php
                  if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
                    echo $not_loggedin;
                    
                }else {
                   /*$sql = "SELECT username FROM users WHERE username = :username";
                   $stmt = $pdo->prepare($sql);
                    $stmt->bindValue(':username', $username);
                    $stmt->execute();
                   $echo_username = $stmt->fetch(PDO::FETCH_ASSOC);

                   echo $echo_username;
                   */
                  
                  echo $logged_in; /* >->->->> här är då det nuvarande problemet, försök att fixa till att 
                  det går att skriva "echo $_SESSION['username']; för att jag vill att usernamnet ska visas
                  istället för endast user_id då det är bara ett jävla nummer. 2020-02-16" <<-<-<-<-<

                  */
                }
                        

                ?>
</nav>

        <div class="text-center pt-3">
        <h1>Welcome to Musiplay</h1>
        <p>your favorite online music player</p>
        </div>


     <div class="container pt-5">
         <div class="row">
             <div class="col-md-4">123</div>
             <div class="col-md-4">123</div>
             <div class="col-md-4">123</div>
         </div>
     </div>
                    <!-- HJÄLP TILL ATT SKAPA LOG IN FORM, kom ihåg, din TABLE 'login' är redan skapat. 
                    https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

                    KOM IHÅG ATT DU HAR SKAPAT ALLTING INOM PHP, SE TILL ATT FIXA HTML 09-02-2020
                    10-02-2020... Det verkar som att den ovanför linken inte fungerar... Försök att använda nedanför länk istället :)
                    https://www.webslesson.info/2016/06/php-login-script-using-pdo-with-session.html 
                    om den ens nu fungerar lmfao
                    -->


   

                        <!-- LOGIN -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                <?php include_once 'login.php'; ?>
                                    <form action="index.php" method="post">     <!-- BEHÖVER SE TILL ATT DATABASEN ÄR CONNECTAD MED HJÄLP AV PHP OCH SQL-->
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name ="username" required>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-10">
                                        <input type="password" class="form-control" id="inputPassword2" name="password"required>
                                        </div>
                                    </div>
                                    <input type="submit" name="login" class="btn btn-primary" value="Login">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                    </form>
                </div>
                </div>
            </div>
            </div>
            <!-- END OF LOGIN -->

            <!-- REGISTER -->
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                         <?php include_once 'register.php'; ?>
                             <form action="index.php" method="post">  
                             <div class="form-group row">
                                  <label for="username" class="col-sm-2 col-form-label">Username</label>
                                  <div class="col-sm-10">
                               <input type="text" name="username" class="form-control"  
                                 required>
                            <small class="form-text text-muted"></small>
                                 </div>
                               </div>
                               <div class="form-group row">
                                 <label for="password" name="password" class="col-sm-2 col-form-label">Password</label>
                                 <div class="col-sm-10">
                                 <input type="password" name="password" class="form-control" id="inputPassword" 
                                  required>
                                 <small class="form-text text-muted"></small>
                                </div>
                                 </div>                   
                                    <input type="submit" name="register" class="btn btn-primary" value="Register">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                    </form>
                </div>
                </div>
            </div>
            </div>
            <!-- END OF REGISTER -->
            


    </body>



</html>