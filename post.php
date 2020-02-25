<?php 
$message = '';

if(!isset($_SESSION['user_id']) || !isset($_SESSION['logged_in'])) {
    header('Location: Index.php');
}


if(isset($_POST['upload'])) {

        
        $title = !empty($_POST['title']) ? trim($_POST['title']) : null;
        $upload = !empty($_POST['upload']) ? $_POST['upload'] : null;

        //Checks if the title already exists
        $sql = "SELECT title as tit FROM users WHERE title = :title";
        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(':title', $title);

        $stmt->execute();

        $titleposted = $stmt->fetch(PDO::FETCH_ASSOC);

        if($row['tit'] > 0 ) {
            echo '<script>alert("Title already exists. Choose another title.");</script>';
        }
        //title checking ended with code above. 
        
        //Selecting database structure.
         $sql = "INSERT INTO users (title, post) VALUES (:title, :post) WHERE username = :username";
         $stmt = $pdo->prepare($sql);
        
         //binding database table and $_POST structure.
         $stmt->bindValue(':title', $title);
         $stmt->bindValue(':post', $upload);
         $stmt->bindValue(':username', $_SESSION['user_id']);

         
         $result = $stmt->execute();
        
         $_FILES['music'] = $result['post'];
         $_REQUEST['titleposted'] = $result['title'];
        
         $_FILES['music'] = $postmusic;
         $_REQUEST['titleposted'] = $posttitle;
                        //TO BE COMPLETELY HONEST, I DO NOT UNDERSTAND THIS LOGIC. AT ALL.
                        //Sites that could be of use https://codewithawa.com/posts/image-upload-using-php-and-mysql-database, https://launchschool.com/books/sql/read/joins, https://www.dofactory.com/sql/join, https://www.techrepublic.com/article/sql-basics-query-multiple-tables/
                       /*The problem with this code is that there is nothing the website says is wrong although the code itself does not 
                         send the code to the database sql so that must mean that there is something currently wrong with it. I want to 
                         make sure that the two tables, "users" and "post_music" work together through the user_id and post_id so that
                         it can show who posted it. The database is both on One.com and locally on XAMPP. 
                         
                       */
                    }
            /* echo '<div class="alert alert-success" role="alert">
                 This is a success alert—check it out!
                 </div>';
         

         if($result) {
                $successfulifresult;
                 }
       Really want it to echo above the modal-body a success alert that says "successful"  */    
                
    
    

?>

<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                                    
                                <div class="container">
                                        <div class="row">
                                        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data" method="post">
                                        <div class="col-12">
                                            <div class="row">
                                                <?php  ?>
                                                <h2 class="offset-4">Add New Post</h2>
                                            </div>
                                            <div class="form-group row">

                                              <label for="Title" class="col-md-6 col-form-label h1">Title</label>
                                                
                                                <input type="text" class="form-control" name="title"  underneath="titlehelp">
                                                <small class="form-text text-muted" id="titlehelp" required> Make sure to type a unique title. (: </small>                                     
                                                
                                            </div>

                                            <div class="row">                                   
                                            <label for="music" class="col-md-6 col-form-label">
                                            <input type="file" class="form-control-file" name="music" >
                                            <small class="form-text text-muted" id="musicfilehelp">Pick a song.</small>
                                            </div>

                                        </div>
                                            <input type="submit" id="submitupload" name="upload" class="btn-lg btn-primary mt-2" onclick="?" value="Upload" required>
                                        </form>
                                    </div>
                                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                    </form>
                </div>
                </div>
            </div>
            </div>

<script> 
function sucess() {
    succes
}
</script>
            
