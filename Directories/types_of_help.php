<?php
	
	include '../connect.php';
	$conn = OpenCon();

	// Display information of all hotlines
	function showTypesOfHelp() {

		global $conn;  
		$sql = "SELECT * FROM TypesOfHelp";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) { 
			echo "<tr>
					<td>".$row["helpType"]."</td>
					<td>".$row["description"]."</td>
				  </tr>";
		}
	}
?><?php include '../templates/folheader.html'; ?>
    <div class="container mb-5">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Directories</a></li>
                <li class="breadcrumb-item active">types of help</li>
            </ol>
            <div class="col-12">
               <h3>Types of Help</h3>
               <hr>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Types of help</h2>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col" class="col-sm-4"><h5>Helptype</h5></th>
                                <th scope="col" class="col-sm-8"><h5>Description</h5></th>
                            </tr>
                        </thead>
                        <?php showTypesOfHelp()?>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <?php include '../templates/footer.html'; ?>
</body>
</html>
