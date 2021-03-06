                           <?php 
                            //register 
                            //If the POST var "register" exists (our submit button), then we can
                            //assume that the user has submitted the registration form.
                            //Source used to help me for this https://www.sitepoint.com/hashing-passwords-php-5-5-password-hashing-api/, efficent way to HASH password
                            if(isset($_POST['register'])){
                                
                                //Retrieve the field values from our registration form.
                                $username = !empty($_POST['username']) ? trim($_POST['username']) : null;
                                $pass = !empty($_POST['password']) ? trim($_POST['password']) : null;
                                
                                
                                
                                //check if the supplied username already exists.
                                
                                //Construct the SQL statement and prepare it.
                                $sql = "SELECT COUNT(username) AS num FROM users WHERE username = :username";
                                $stmt = $pdo->prepare($sql);
                                
                                //Bind the provided username to our prepared statement.
                                $stmt->bindValue(':username', $username);
                                
                                //Execute.
                                $stmt->execute();
                                
                                //Fetch the row.
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                
                                //If the provided username already exists - display error.
                                //TO ADD - Your own method of handling this error. For example purposes,
                                //I'm just going to kill the script completely, as error handling is outside
                                //the scope of this tutorial.
                                if($row['num'] > 0){
                                    echo '<div class="alert alert-danger" role="alert">
                                   That username already exists!
                                   </div>';
                                   exit();
                                }
                                
                                $passcost = [
                                    "cost" => 12
                                ];
                                //Hash the password as we do NOT want to store our passwords in plain text.
                                $passwordHash = password_hash($pass, PASSWORD_BCRYPT, $passcost);
                                
                                //Prepare our INSERT statement.
                                //Remember: We are inserting a new row into our users table.
                                $sql = "INSERT INTO users (username, password) VALUES (:username, :password)";
                                $stmt = $pdo->prepare($sql);
                                
                                //Bind our variables.
                                $stmt->bindValue(':username', $username);
                                $stmt->bindValue(':password', $passwordHash);
                            
                                //Execute the statement and insert the new account.
                                $result = $stmt->execute();
                                
                                //If the signup process is successful.
                                if($result){
                                    // set up an alert echoing below, instead. 
                                    echo 'Thank you for registering with our website.';
                                }
                                
                            }
                            ?>