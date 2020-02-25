                <?php
                
                if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])){
                    $not_loggedin = '<div class="position-right">
                    <button type="button" class="btn btn-primary mx-2 px-3" data-toggle="modal" data-target="#exampleModal">
                    Login
                    </button>
                              
                    <button type="button" class="btn btn-primary mx-2 px-3" data-toggle="modal" data-target="#exampleModal2">
                    Register
                    </button>
                    </div>';
                    echo $not_loggedin;
                    
                }else {
                                                                                /*$sql = "SELECT username FROM users WHERE username = :username";
                                                                                $stmt = $pdo->prepare($sql);
                                                                                    $stmt->bindValue(':username', $username);
                                                                                    $stmt->execute();
                                                                                $echo_username = $stmt->fetch(PDO::FETCH_ASSOC);

                                                                                echo $echo_username;
                                                                                */
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
                //Might be a bad idea for future coding if $_SESSION['logged_in'] is identical to the string $logged_in. 
                $logged_in = $_SESSION['user_name'];
                    
                //logout function,
                include 'logout.php';
                                                           
              }
              ?>
