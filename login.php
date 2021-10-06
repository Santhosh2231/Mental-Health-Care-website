<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $type = $_POST["type"];
    
    if($type=="Counsellor"){
        $sql = "Select * from counsellors where email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $sql = "select sno from counsellors where email='$email' AND password='$password'";
            $id = mysqli_query($conn,$sql);
            $_SESSION['id'] = $id;
            header("location: home.php");

        } 
        else{
            $showError = "Invalid Credentials";
        }
    }else{
        $sql = "Select * from users where email='$email' AND password='$password'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if ($num > 0){
            $login = true;
            session_start();
            $_SESSION['loggedin'] = true;
            $sql = "select sno from counsellors where email='$email' AND password='$password'";
            $id = mysqli_query($conn,$sql);
            $_SESSION['id'] = $id;
            header("location: home.php");

        } 
        else{
            $showError = "Invalid Credentials";
        }
    }
}

?><?php include 'templates/iniheader.html'; ?>
    <div class="container col-12 col-sm-5" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="card col-12" style="width: 60rem;">
            <div class="card-header">
            <h2 class="text-center">Login</h2> 
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label"><b><h4>Email address</h4></b></label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter your email address" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><b><h4>Password</h4></b></label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <div class="form-group">
                            <select class="form-control" name="type" id="type"> 
                                <option value="HelpSeeker">Helpseeker</option>
                                <option value="Counsellor">Counsellor</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <br>
                        <div class="text-center">
                            <h5>New user? <a href="./signup.php">signup</a></h5>
                        </div>
                    </form>
                </div>
            </body>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.html'; ?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
     <?php
        if($login==false){
            ?>
            <script>
                // swal("Oops...!","<?php echo $showError ?>","error");
            </script>
            <?php
        }
     ?>
</body>
</html>