<?php include('server.php'); ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" href="css/material-dashboard.min.css">
    </head>
    <body class="bg-light">
        <div class="container">
            
            <div class="row mt-5">
                <div class="col-lg-6 col-md-6 offset-3">
                    <div class="center">
                        
                        <!-- Material form login -->
                        <div class="card">
                            
                            <div class="card-header card-header-success text-center w-50 mx-auto mb-2">
                                <img class="img-thumbnail" src="img/logo.png">
                            </div>
                            
                            <!--Card content-->
                            <div class="card-body px-lg-5 pt-0">
                                <?php include('errors.php'); ?>
                                
                            <!-- Form -->
                            <form class="text-center" style="color: #757575;" action="login.php" method="POST">
                        
                              <!-- Email -->
                              <div class="md-form">
                                <input type="text" class="form-control" placeholder="Username" name="username"autofocus required autocomplete="off">
                              </div>
                        
                              <!-- Password -->
                              <div class="md-form">
                                <input type="password" class="form-control" placeholder="Password" name="password"required autocomplete="off">
                              </div>
                        
                              <!-- Sign in button -->
                              <button class="btn btn-success btn-rounded btn-block my-4 waves-effect z-depth-0" type="submit" name="login_user">Sign in</button>
                        
                              <!-- Register -->
                              <p>Not a member?
                                <a href="register.php">Register</a>
                              </p>

                              <p> Or 
                                <a href="classroom.php">Select a Classroom</a>
                              </p>
                        
                            </form>
                            <!-- Form -->
                        
                          </div>
                        
                        </div>
                        <!-- Material form login -->
                </div>
            </div>
    </body>
    </html>
    