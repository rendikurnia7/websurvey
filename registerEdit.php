<?php 
include ('securityA.php');
include ('includes/header.php');
include ('includes/navbarA.php');
?>

<div class= "container-fluid">
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m0 font-weight-bold text-primary">Edit Admin Profile</h6>
</div>
<div class="card-body">

<?php

            if(isset($_POST['edit_admin']))
            {
                $username = $_POST['edit_username'];
                
                $query = "SELECT * FROM admin WHERE username='$username' ";
                $query_run = mysqli_query($connection, $query);

                foreach($query_run as $row)
                {
                    ?>

    <form action="code.php" method="POST">
        <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
    <div class= "form_group">
        <label>Username</label>
        <input type="text" name="edit_username" value ="<?php echo $row['username']; ?>" class ="form-control">
    </div>

    <div class= "form_group">
        <label>Password</label>
        <input type="password" name="edit_password" value ="<?php echo $row['password'];?>" class ="form-control">
    </div>

    <div class= "form_group">
        <label>User Type</label>
       <select name="edit_usertype" class="form-control">
           <option value="admin">Admin</option>
           <option value="user">User</option>
       </select>
    </div>
    <p></p>

    <a href="registerA.php" class="btn btn-danger" >Cancel</a>
    <button type="submit" name="update_admin" class= "btn btn-primary">Update</button>

    </form>
    
    <?php
    
    }
    }
    ?>
    </div>
</div>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>