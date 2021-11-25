<?php 
    session_start();
    include '../connect.php';
    include 'header.html';
    $conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../login.php");
    }
    else{
        if($_SESSION['times']==1){
            $alert="<script>
            Swal.fire({
            title: 'Good Job!',
            text: 'LoggedIn successfully!',
            icon: 'success',
            button: 'OK',
            });
            </script>";
            echo $alert;
            $_SESSION['times'] = 0;
        }
    }
    function showProfilePicture() {


			echo "<img src='../Images/counsellor-pfp.png' class='img-fluid img-max'>";
		
	}
    function showBasicInfo(){
        global $conn;
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM `counsellors` WHERE `counsellors`.`cno`=$id";
        $result = mysqli_query($conn,$sql);
        $row = $result->fetch_assoc();

		echo "<p><b>Name: </b> Dr. ".$row["firstname"]."</p>
			  <p><b>Age: </b>".$row["age"]."</p>
			  <p><b>Location: </b>".$row["location"]."</p>
			  <p><b>Email: </b>".$row["email"]."</p
			  <p><b>Phone: </b>".$row['phone']."</p>";
    }
    
?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item active"><a href="home.php">Home</a></li>
            </ol>
        </div>
    </div>
    <div class="container col-12 col-sm-6" style="margin-top: 10px; margin-bottom: 10px;">
        <div class="card col-12" style="">
        <br>
            <div class="card-header bg-primary text-white">
            <h2 class="text-center">My Profile</h2> 
            </div>
            <div class="card-body">
                <div class = "row">
                    <div class ="col-3 mr-3 text-center">
                        <?php showProfilePicture() ?>
                    </div>
                    <div class ="col">
                        <?php showBasicInfo() ?>
                        <a href="editprofile.php" class="btn btn-success mr-2">Edit Profile</a>
                        <a href="delprofile.php" class="btn btn-danger">Delete Account</a>

                        <form action = 'signout.php' method='POST'>
                            <button name='logoutSubmit' type='submit' class='btn btn-primary mt-2'>Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include '../templates/footer.html'; ?>
</body>
</html>