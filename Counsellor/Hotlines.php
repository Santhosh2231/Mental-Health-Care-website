<?php
    session_start();
    include '../connect.php';
    $conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../login.php");
    }
	// Display information of all hotlines
	function showHotlines() {

		global $conn;  
		$sql = "SELECT name, phoneNum, typeOfHelp FROM Hotline";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) { 
			echo "<tr class='table'>
					<td>".$row["name"]."</td>
					<td>".$row["phoneNum"]."</td>
					<td>".$row["typeOfHelp"]."</td>
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
                <li class="breadcrumb-item active">Hotlines</li>
            </ol>
            <div class="col-12">
               <h3>Hotlines</h3>
               <hr>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <h3 class="card-header text-white bg-primary text-center">Hotline Directory</h3>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Type of Help</th>
                            </tr>
                        </thead>
                        <?php showHotlines() ?>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <?php include '../templates/footer.html'; ?>
</body>
</html>