<?php include "includes-amin/header_admin.php" ?>

<?php

if (isset($_SESSION['username'])) {

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username = '{$username}' ";

    $select_user_profile_query = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_array($select_user_profile_query) ) {
    
    $user_id = $row['user_id'];
    $username = $row['username'];
    $user_password = $row['user_password'];
    $user_firstname = $row['user_firstname'];
    $user_lastname = $row['user_lastname'];
    $user_email = $row['user_email'];
    $user_role = $row['user_role'];

    }



}

?>

<?php 

if (isset($_POST['profile'])) {

    $user_profile = $username;
 
    $username = $_POST['username'];
    $user_password = $_POST['user_password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];

    // $post_image = $_FILES['image']['name'];
    // $post_image_temp = $_FILES['image']['tmp_name'];

    $user_email = $_POST['user_email'];
    $user_role = $_POST['user_role'];

    // $post_date = date('d-m-y');

    // move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "UPDATE users SET ";
    $query .= "username = '{$username}', ";
    $query .= "user_password = '{$user_password}', ";
    $query .= "user_firstname = '{$user_firstname}', ";
    $query .= "user_lastname = '{$user_lastname}', ";
    $query .= "user_email = '{$user_email}', ";
    $query .= "user_role = '{$user_role}'  ";
    $query .= " WHERE username = '{$user_profile}'";

    $edit_user_profile_query = mysqli_query($connection, $query);

    confirm( $edit_user_profile_query);
    

}

?>


    <div id="wrapper">

    <!-- Navigation -->
<?php include "includes-amin/navigation_admin.php" ?>
        
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        <h1 class="page-header">
                            Welcome to the Admin Page
                            <small>Author</small>
                        </h1>

<form action="" method="post" enctype="multipart/form-data">

<div class="form-group">
<label for="user_firstname">Firstname</label>
<input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
</div>

<div class="form-group">
<label for="user_lastname">Lastname</label>
<input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname">
</div>

<div class="form-group">
<select name="user_role" id="">
<option value="subscriber"><?php echo $user_role; ?></option>
<?php 
if($user_role == 'admin'){
    echo "<option value='subscriber'>subscriber</option>";
    
} else {
    echo "<option value='admin'>admin</option>";
}

?>



</select>
</div>


<!-- <div class="form-group">
<label for="post_image">Image</label>
<input type="file"  name="image">
</div> -->

<div class="form-group">
<label for="username">Username</label>
<input type="text" value="<?php echo $username; ?>" class="form-control" name="username">
</div>

<div class="form-group">
<label for="user_email">Email</label>
<input type="email" value="<?php echo $user_email; ?>" class="form-control" name="user_email">
</div>

<div class="form-group">
<label for="user_password">Password</label>
<input type="password" value="<?php echo $user_password; ?>" class="form-control" name="user_password">
</div>

<div class="form-group">
<input type="submit" class="btn btn-primary" name="profile" value="Update Profile">
</div>



</form>                       
                       
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php include "includes-amin/footer_admin.php" ?>
