<?php 
    include 'connect.php';
    include 'templates/header.html';
    session_start();
    $conn = OpenCon();
    if(isset($_POST['HelpSeekerSubmit'])){ 
		processHelpSeekerUpdate();
	}
    function showeditform(){
        global $conn; 
        $sql = "SELECT * FROM Users WHERE sno =". $_SESSION['id'];
        $result = $conn->query($sql);

        $row = $result->fetch_assoc();

        echo "<form action = '' method='POST'>
                    <div class='mb-3 col-12 col-sm-5 '>
                        <label><h5>Email</h5></label>
                        <input name='email' type='text' class='form-control' placeholder='Email' value = ".$row["email"].">
                    </div>

                    <div class='mb-3 col-12 col-sm-5 '>
                        <label><h5>Password</h5></label>
                        <input name='password' type='password' class='form-control' placeholder='Password' value =".$row["password"].">
                    </div>
                    

                    <div class='mb-3 col-12 col-sm-5 '>
                        <label><h5>Name</h5></label>
                        <input name='name' type='text' class='form-control' placeholder='Name' value = ".$row["firstname"].">
                    </div>

                    <div class='mb-3 col-12 col-sm-5 '>
                        <label><h5>Age</h5></label>
                        <input name='age' type='number' class='form-control' placeholder='Age' value =".$row["age"].">
                    </div>

                    <div class='mb-3 col-12 col-sm-5 '>
                        <label><h5>Phone Number</h5></label>
                        <input name='phone' type='text' class='form-control' placeholder='Phone Number' value =".$row["phone"].">
                    </div>
                    
                    <div class = 'mb-3 col-12 col-sm-5'>
                        <button name='HelpSeekerSubmit' type='submit' class='btn btn-success mr-2'>Save Changes</button>
                        <a href='home.php' class='btn btn-success'>Go Back</a>
                    </div>
                </form>";

    }
    function processHelpSeekerUpdate() {

		global $conn;

		$email = $_POST['email'];
		$password = $_POST['password'];
	  	$name = $_POST['name'];
	  	$age = $_POST['age'];
	  	$phone = $_POST['phone'];

	  	$sql = "UPDATE Users 
	  			SET email = '$email',
	  				password = '$password',
	  				firstname = '$name',
	  				age = '$age',
	  				phone = '$phone'
	  			WHERE sno =".$_SESSION["id"];

	  	$conn->query($sql);
          $alert="<script>
          Swal.fire({
          title: 'Profile Updated Successfully',
          icon: 'success',
          button: 'OK',
          });
          </script>";
          echo $alert;
	}

?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item "><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active"><a >Edit Profile</a></li>
            </ol>
        </div>
    </div>
    <div class="container">
        <h3>
            Update Profile
        </h3>
        <hr>
        <?php showeditform(); ?>
    </div>

    <?php include 'templates/footer.html'; ?>

</body>
</html>