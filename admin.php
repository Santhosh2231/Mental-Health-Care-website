<?php
include 'templates/iniheader.html';
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $conn = OpenCon();
    $email = $_POST["email"];
    $password = $_POST["password"]; 
    $secpassword = $_POST["secpassword"];
    
    $sql = "Select * from admin where email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);
    if ($num > 0){
        $sql = "Select * from security_password where password='$secpassword'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        echo "$num";
        if($num==1){
            session_start();
            $_SESSION['Loggedin'] = true;
            $sql = "select ano from admin where email='$email' AND password='$password'";
            $result = mysqli_query($conn,$sql);
            while($row = $result->fetch_assoc()) { 
                $id = $row['ano'];
            }
            $_SESSION['id'] = $id;
            $_SESSION['times'] = 1;
            header("location: Admin/home.php");
        }
        else{
            $showError = "<script>
            Swal.fire({
            title: 'Invalid Login!!',
            text: 'Please enter correct Security Password !',
            icon: 'error',
            button: 'OK',
            });
            </script>";
            echo $showError;
        }

    } 
    else{
        $showError = "<script>
            Swal.fire({
            title: 'Invalid Login!!',
            text: 'Please enter valid credentials !',
            icon: 'error',
            button: 'OK',
            });
            </script>";
        echo $showError;
    }
    
}

?>
    <div class="container col-12 col-sm-5 " style="margin-top: 10px; margin-bottom: 10px;">
        <div class="card col-12" style="width: 40rem;">
            <br>
            <div class="card-header bg-primary text-white">
            <h2 class="text-center">Admin Login</h2> 
            </div>
            <div class="card-body">
                <div class="container">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="email" class="form-label"><b><h4>Email address</h4></b></label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" aria-describedby="emailHelp">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><b><h4>Password</h4></b></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password">
                        </div>
                        <div class="mb-3">
                            <label for="secpassword" class="form-label"><b><h4>Security Password</h4></b></label>
                            <input type="password" class="form-control" id="secpassword" name="secpassword" placeholder="Enter your Security Password">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Check me out</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <br>
                        
                    </form>
                </div>
            </body>
            </div>
        </div>
    </div>
    <?php include 'templates/footer.html'; ?>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
