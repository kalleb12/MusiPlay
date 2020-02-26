
                        <!-- LOGIN -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                <?php include 'login.php'; ?>
                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">     <!-- BEHÖVER SE TILL ATT DATABASEN ÄR CONNECTAD MED HJÄLP AV PHP OCH SQL-->
                                    <div class="form-group row">
                                        <label for="username" class="col-sm-2 col-form-label">Username</label> 
                                        <div class="col-sm-10">
                                        <input type="text" class="form-control" id="username" name ="username" required autofocus>
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
            <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel2">Register</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                         <?php include_once 'register.php'; ?>
                             <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">  
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