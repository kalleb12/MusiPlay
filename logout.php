        <?php
        //logout function
        function session_endi() {
                 unset($_SESSION['username']);
                 session_destroy(); 
                    header("Location: Index.php"); 
                    die();
              }
                //So that it can be called out by the html, it calls out the html and processes the function above.
              if(isset($_GET['session_enderino'])) {
                session_endi();
              }
                  $account_loggedin  = $_SESSION['user_name'];
                echo ' <a class="nav-item active h3" data-toggle="modal" data-target="#exampleModal3">Upload Music</a>  
                <div class="">
                <a class="nav-item" href="account.php"> ' . ucwords($account_loggedin) . '</a>
                <a class="nav-item" href="?session_enderino" onclick="logged_out()">Logout</a> 
                </div>';           //DIV class should float/positiom this div to the right.
                                  //Also make sure to add some distance between the username and logout
                                 //Style the "Upload Music", It does not fully fit with the background etc.
                                                                          
         ?>
                                                                            
              <script>
              function logged_out() 
              {
                  alert("You have been logged out!");
              }
              </script>
            