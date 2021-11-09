<?php
    session_start();
    include '../connect.php';
    include '../templates/folheader.html';
	$conn = OpenCon();
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $k = $_SESSION['Cid'];
        $aid = $_SESSION['id'];
        $rating = $_POST["rating"];
        $feedback = $_POST["feedback"];
        $sql = "INSERT INTO `review`(`reviewid`, `authorid`, `counsellorid`, `rating`, `feedback`) VALUES ('NULL','$aid','$k','$rating','$feedback')";
        $result = $conn->query($sql);
        if($result){
            $alert="<script>
            Swal.fire({
            title: 'Review Submitted successfully!',
            icon: 'success',
            button: 'OK',
            });
            </script>";
            echo $alert;
            unset($_SESSION['Cid']);
        }
    }
	// Display information of all hotlines
	function showTypesOfHelp() {

		global $conn;  
		$sql = "SELECT counsellors.firstname Cname,users.firstname Uname,review.rating rating,review.feedback feedback FROM `review`";
        $sql .= "LEFT JOIN counsellors on review.counsellorid=counsellors.cno LEFT JOIN users on review.authorid=users.sno;";
		$result = $conn->query($sql);
        $i=0;
		while($row = $result->fetch_assoc()) { 
            $i=$i+1;
			echo "<tr>
					<td>".$i."</td>
					<td> Dr. ".$row["Cname"]."</td>
                    <td>".$row["Uname"]."</td>
                    <td>".$row["rating"]."</td>
                    <td>".$row["feedback"]."</td>
				  </tr>";
		}
	}


?>
    <div class="container mb-5">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Reviews</a></li>
                <li class="breadcrumb-item active">View Reviews</li>
            </ol>
            <div class="col-12">
               <h3>View Reviews</h3>
               <hr>
            </div>
        </div>
        <div class="container">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Counsellor Review</h2>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead class="bg-success text-white">
                            <tr>
                                <th scope="col"><h5>S.No</h5></th>
                                <th scope="col"><h5>Counsellor</h5></th>
                                <th scope="col"><h5>User Name</h5></th>
                                <th scope="col"><h5>Rating</h5></th>
                                <th scope="col"><h5>Feedback</h5></th>
                            </tr>
                        </thead>
                        <?php showTypesOfHelp()?>
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
