<?php 
    include 'connect.php';
    include 'templates/header.html';
    session_start();
    $conn = OpenCon();
    if(isset($_POST['deleteSubmit'])){ 
		deleteUser();
	} 
	
	// Delete User
	function deleteUser() {
		global $conn;
        $id = $_SESSION['id'];  
        $sql = "DELETE FROM `booking` WHERE `booking`.`helpseekerid`=$id";
        $result = mysqli_query($conn,$sql);
        $sql = "DELETE FROM `review` WHERE `review`.`authorid`=$id";
        $result = mysqli_query($conn,$sql);
		$sql = "DELETE FROM `users` WHERE sno = '".$id."'";
		$result = mysqli_query($conn,$sql);
        session_destroy();
        header("Location: login.php"); 
        exit;
	}

?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item "><a href="home.php">Home</a></li>
                <li class="breadcrumb-item active"><a >Delete Profile</a></li>
            </ol>
        </div>
    </div>
    <div class = "container mb-5">
			<h1 class = "text-center mt-5 mb-5"> Profile Deletion </h1>
			<h3 class = "text-center mt-5 mb-5"> ⚠ This is a irreversible action, are you sure you want to proceed? ⚠ </h3>
			<div class = "row justify-content-center mt-5">
				<form action = '' method='POST'>
					<button name='deleteSubmit' type='submit' class='btn btn-danger mr-3'>Yes, Delete my profile </button>
					<a href='home.php' class='btn btn-success'>No, take me back</a>
				</form>
			</div>
		</div>

    <?php include 'templates/footer.html'; ?>

</body>
</html>