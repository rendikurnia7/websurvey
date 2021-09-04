<?php 
include ('securityA.php');
include ('includes/header.php');
include ('includes/navbarA.php');

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username Max.20 Karakter">
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password Max.10 Karakter">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
            
            <input type="hidden" name="usertype" value="admin">


        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
      
    </div>
  </div>
</div>

<div class="container-fluid">

<!---dataTables--->

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m0 font-weight-bold text-primary">Admin Profile 
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
        Add Admin
        </button>
        </h6>

<div class="card-body">
<div class="table-responsive">
<?php
if (isset($_SESSION['success']) && $_SESSION['success'] !='')
{
    echo '<h2 class= "bg-primary text-white">'.$_SESSION['success'].'</h2>';
    unset ($_SESSION['success']);
}

elseif(isset($_SESSION['status']) && $_SESSION['status'] !='')
{
        echo '<h2 class= "bg-primary text-white">'.$_SESSION['status'].'</h2>';
        unset ($_SESSION['status']);
}


    
    $query = "select * from admin";
    $query_run = mysqli_query($connection, $query);

?>
    <table class="table table-bordered" id="dataTable" width= 100% cellspacing="0">
        <thead>
            <tr>
            
                <th>No.</th>
                <th>Username<i class="fas fa-key"></i></th>
                <th>Password</th>
                <th>User Type</th>
                <th>Edit</th>
                <th>Delete</th>
                
            </tr>
        </thead>

        <tbody>
            <?php
            $no=1;
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run))
                {
                ?>
             
            <tr>
                <td><?php echo $no++?></td>
                <td><?php echo $row['username']; ?></td>
                <td ></td>
                <td><?php echo $row['usertype']; ?></td>
                <td>
                <form action="registerEdit.php" method ="post">
                <input type="hidden" name="edit_username" value ="<?php echo $row['username'];?>">
                <button type="submit" name ="edit_admin" class= "btn btn-success">EDIT</button>
                </form>
                </td>
                <td>
                    <form action="code.php" method="post">
                    <input type="hidden" name="delete_username" value="<?php echo $row['username'];?>">
                    <button type="submit" name= "delete_admin" class= "btn btn-danger"> DELETE</button>
                </form>
            </td>
            </tr>
           
           <?php
                }
            }
            else {
                echo "No Record Found";
            }
            ?>
        </tbody>

    </table>
    </div>
</div>
</div>

        </div>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>