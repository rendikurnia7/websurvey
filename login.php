<?php

include ('includes/header.php');
session_start();

?>


<div class="container">

<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Admin Login</h1>
                            </div>

                            <?php
                                if(isset($_SESSION['status']) && $_SESSION['status'] !='') 
                                {
                                    echo '<h2 class="bg-danger text-white"> '.$_SESSION['status'].' </h2>';
                                    unset($_SESSION['status']);
                                }
                            ?>


                            <form class="user" action="code.php" method="POST">

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                        name="usernamel"placeholder="Enter Username..." autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input id="myInput" type="password" class="form-control form-control-user"
                                    name="passwordl" placeholder="Password" autocomplete="off">
                                    <input type="checkbox" onclick="myFunction()"> Show Password
                                </div>
                                
                                <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block">Login</button>
                                <hr>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>

</div>

</div>

<script>
    function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<?php


include ('includes/scripts.php');


?>