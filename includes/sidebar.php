<div class="col-md-4">

<?php

if (isset($_POST['submit'])) {
    $search = $_POST['search'];

    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
    $search_query = mysqli_query($connection, $query);

    if(!$search_query) {
        die("QUERY FAILED" . mysqli_error($connection));

    }

    $count = mysqli_num_rows($search_query);

    if ($count == 0) {
        echo "<h1> NO RESULT </h1>";
    } 

}

?>

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    <!-- search form -->
                    </form> 
                    
                    <!-- /.input-group -->
                </div>


 <!-- login form -->
    <div class="well">
        <h4>Login</h4>
        <form action="includes/login.php" method="post">
        
           <div class="form-group">
               <input type="text" name="username" class="form-control" placeholder= "Enter Username">

            </div>

           <div class="input-group">
               <input type="password" name="password" class="form-control" placeholder= "Enter Password">
               <span class="input-group-btn">
                <button class="btn btn-primary" name="login" type="submit">Submit</button>
               </span>

            </div>
        </form> 
    </div>



                <!-- Blog Categories Well -->
                <div class="well">

                <?php

                $query = "SELECT * FROM categories";
                $select_categories_sidebar = mysqli_query($connection, $query);

               
            
                ?>
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">  
                                
                            <?php 

                             while($row = mysqli_fetch_assoc             ($select_categories_sidebar)){
                              $cat_title =  $row['cat_title'];
                              $cat_id =  $row['cat_id'];

                                echo "<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                             }

                            ?>
       
                            </ul>
                        </div>

                    </div>
                    <!-- /.row -->
                </div>





                <!-- Side Widget Well -->
                <?php include "widget.php"?>

            </div>
