<?php
include 'templates/iniheader.html';
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    include 'connect.php';
    $conn = OpenCon();

    $type = $_POST["type"];
    $firstname = $_POST["firstname"];
    $secondname = $_POST["lastname"];
    $password = $_POST["password"];
    $conpassword = $_POST["conpassword"];
    $email = $_POST["email"];
    $age = $_POST["age"] ;
    $gender = $_POST["gender"];
    $location = $_POST["location"] ;
    $phone = $_POST["phone"] ;

    $exists=false;
    if(($password == $conpassword) && $exists==false){
        if($type=="Counsellor"){
            $sql = "INSERT INTO `counsellors` (`cno`,`firstname`, `secondname`, `email`, `password`, `age`, `gender`, `location`, `phone`) VALUES (NULL,'$firstname', '$secondname', '$email', '$password', '$age', '$gender', '$location', '$phone')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $yearsExp = $_POST["yearsExp"];
                $cert = $_POST["cert"];
                $sql = "select cno from counsellors where email='$email' AND password='$password'";
                $result = mysqli_query($conn,$sql);
                $id = $result->fetch_assoc()["cno"];
                $sql = "INSERT INTO `counsellor_exper` (`cno`, `counsellor_exp`, `cerfication`) VALUES ('$id', '$yearsExp', '$cert');";
                $showAlert = true;
                $result = mysqli_query($conn,$sql);

                $success = "<script>
                Swal.fire({
                title: 'Registered Succesfully!!',
                text: 'Now please login into website!',
                icon: 'success',
                button: 'OK',
                });
                </script>";
                echo $success;
                
            }
            else{
                $showError = "<script>
                Swal.fire({
                title: 'Registration unsuccessful!',
                text: 'You have been registered already!',
                icon: 'error',
                button: 'OK',
                });
                </script>";
                echo $showError;
            }
        }
        else{
            $sql = "INSERT INTO `users` (`sno`,`firstname`, `secondname`, `email`, `password`, `age`, `gender`, `location`, `phone`) VALUES (NULL,'$firstname', '$secondname', '$email', '$password', $age, '$gender', '$location', '$phone')";
            $result = mysqli_query($conn, $sql);
            if ($result){
                $sql = "select sno from users where email='$email' AND password='$password'";
                $result = mysqli_query($conn,$sql);
                $id = $result->fetch_assoc()["sno"];
                $sql = "insert into userdata (sno, noofcounsellings, noofreviews) values ($id, 0, 0);";
                $result = $conn->query($sql);
                $showAlert = true;
                $success = "<script>
                Swal.fire({
                title: 'Registered Succesfully!!',
                text: 'Now please login into website!',
                icon: 'success',
                button: 'OK',
                });
                </script>";
                echo $success;
            }
            else{
                $showError = "<script>
                Swal.fire({
                title: 'Registration unsuccessful!',
                text: 'You have been registered already!',
                icon: 'error',
                button: 'OK',
                });
                </script>";
                echo $showError;
            }
        }
    }
    else{
        $showError = "<script>
                Swal.fire({
                title: 'Registration unsuccessful!',
                text: 'Make sure that passwords are same!',
                icon: 'error',
                button: 'OK',
                });
                </script>";
        echo $showError;
    }
}
?>
    <div class="container col-12 col-sm-6" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="card col-12" style="width: 45rem;">
        <br>
            <div class="card-header bg-primary text-white">
            <h2 class="text-center">Sign Up</h2> 
            </div>
            <div class="card-body">
                <div class="container row-content">
                    <form action="" method="post" >
                        <br>
                        <div class="form-group">
                            <select class="form-control" name="type" id="type"> 
                                <option value="HelpSeeker">Helpseeker</option>
                                <option value="Counsellor">Counsellor</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="firstname" id="firstname"><h5>First Name:</h5></input>
                                    <input name="firstname" id="firstname" placeholder="Firstname" class="form-control" required></input>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="form-group">
                                    <label for="lastname" id="lastname"><h5>Last Name:</h5></input>
                                    <input name="lastname" id="lastname" placeholder="Lastname" class="form-control" required></input>
                                </div>
                            </div>
                        </div>
                
                        <div class="form-group">
                            <label for="email" id="email"><h5>Email:</h5></label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="ex:abc123@gmail.com"
                            pattern=".+@.+" required>
                        </div>
                        
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="password" id="password"><h5>Password :</h5></input>
                                    <input type="password" name="password" id="password" placeholder="Password" class="form-control" required></input>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="conpassword" id="conpassword"><h5>Confirm Password: </h5></input>
                                    <input type="password" name="conpassword" id="conpassword" placeholder="Confirm password" class="form-control" required></input>
                                </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="age" id="age"><h5>Age:</h5></input>
                                    <input type="number" class="form-control" placeholder="Age" name="age" id="age" min=0 max=200></input>
                                    </div>
                            </div>
                            <div class="col">
                                    <div class="form-group">
                                    <label for="location" id="location"><h5>Location:</h5></input>
                                    <input name="location" class="form-control" placeholder="Location" id="location"></input> 
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="phone"><h5>Phone Number:</h5></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number"
                                    pattern="[0-9]{3}[0-9]{3}[0-9]{4}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                        <label for="gender" id="gender"><h5>Gender:</h5></input>
                                        <!-- <input type="number" class="form-control" name="age" id="age" min=0 max=200></input> -->
                                        <select class="form-control" name="gender" id="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="other">Prefer not to say</option>
                                        </select>

                                </div>
                            </div>
                        </div>
                        
                
                        <div class="alert alert-info" role="alert"><b> Only fill this part out if you are a counsellor:</b>
                            <div style="padding-top:1%" class="form-row">
                                <div class="form-group col-md-6">
                                    How many years of experience as a mental health professional do you have?
                                    <select name="yearsExp" class="form-control" id="yearsExp">
                                        <option value="1"> &lt; 1 year</option>
                                        <option value="2">2 years</option>
                                        <option value="3">3 years</option>
                                        <option value="4">4 years</option>
                                        <option value="5"> 5 years</option>
                                        <option value="6">6 years</option>
                                        <option value="7">7 years</option>
                                        <option value="8">8 years</option>
                                        <option value="9">9 years</option>
                                        <option value="10">10 years</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-1"></div>
                                <div class="form-group col-md-4">
                                    Select your current status as a counsellor.
                                    <select name="cert" class="form-control" id="cert">
                                        <option value="certified">Certified</option>
                                        <option value="in progress">In progress</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button class="btn btn-primary" type="submit" value="submit">Sign up </button>
                        </div>
                    </form>
                    <div class="alert alert-info mt-3" id="login-link">Already have an account? Login <a href="./login.php">here</a></p>
                </div>
            </body>
            </div>
        </div>
    </div>
    </div>

    <?php include 'templates/footer.html'; ?>
     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>