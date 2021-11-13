<?php
	session_start();
	include '../connect.php';
	$conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../login.php");
    }
	// Display information of all hotlines
	function showusers() {

		global $conn;  
		$sql = "SELECT * FROM `users` ";
		$result = $conn->query($sql);
        $i=0;
		while($row = $result->fetch_assoc()) {
            $i=$i+1; 
			echo "<tr>
                    <td>".$i."</td>
					<td>".$row["firstname"]."</td>
					<td>".$row["secondname"]."</td>
                    <td>".$row["location"]."</td>
                    <td>".$row["gender"]."</td>
				  </tr>";
		}
	}
?><?php include 'header.html'; ?>
    <div class="container mb-5">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="menu.php">Directories</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
            <div class="col-12">
               <h3>Users</h3>
               <hr>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Users</h2>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col" ><h5>S.No</h5></th>
                                <th scope="col" ><h5>First Name</h5></th>
                                <th scope="col" ><h5>Last Name</h5></th>
                                <th scope="col" ><h5>Location</h5></th>
                                <th scope="col" ><h5>Gender</h5></th>
                            </tr>
                        </thead>
                        <?php showusers()?>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <?php include '../templates/footer.html'; ?>
    <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
    </script>
</body>
</html>
