<?php
	
    include '../connect.php';
    session_start();
	$conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../login.php");
    }
	// get and display all resource centre information
	function showResourceCentres() {

		global $conn;  
		$sql = "SELECT * FROM ResourceCentre";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) { 
			echo "<tr>
					<td>".$row["centreID"]."</td>
					<td>".$row["centreName"]."</td>
					<td>".$row["address"]."</td>
					<td>".$row["email"]."</td>
					<td>".$row["postalCode"]."</td>
					<td>".$row["phoneNum"]."</td>
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
                <li class="breadcrumb-item active">Resource Centers</li>
            </ol>
            <div class="col-12">
               <h3>Resource Centers</h3>
               <hr>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Resource Centre Directory</h2>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead class="bg-success text-white">
                            <tr>
                                
                                <th scope="col">Centre ID</th>
                                <th scope="col">Centre Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Email</th>
                                <th scope="col">Postal Code</th>
                                <th scope="col">Phone</th>
                            </tr>
                        </thead>
                        <?php showResourceCentres()?>
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
