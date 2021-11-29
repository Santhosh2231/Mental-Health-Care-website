<?php
	
    session_start();
    include '../connect.php';
    $conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../admin.php");
    }
	// get and display all resource centre information
	function showResourceCentres() {
		global $conn;  
		$sql = "SELECT * FROM resourceCentre";
		$result = $conn->query($sql);
        $i=0;
		while($row = $result->fetch_assoc()) { 
            $i=$i+1;
			echo "<tr>
					<td>".$i."</td>
					<td>".$row["centreName"]."</td>
					<td>".$row["address"]."</td>
					<td>".$row["email"]."</td>
					<td>".$row["postalCode"]."</td>
					<td>".$row["phoneNum"]."</td>
                    <td> <button class='edit btn btn-sm btn-primary' id=".$row['centreID'].">Edit</button> <br><button class='delete btn btn-sm btn-danger' id=d".$row['centreID'].">Delete</button> </td>
				  </tr>";
		}
	}
    if(isset($_GET['delete'])){
        $sno = $_GET['delete'];
        $delete = true;
        $sql = "DELETE FROM `resourcecentre` WHERE `resourcecentre`.`centreID` = $sno";
        $result = mysqli_query($conn, $sql);
        
      }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset( $_POST['snoEdit'])){
            // Update the record
            $sno = $_POST["snoEdit"];
            $CenID = $_POST["titleEdit"];
            $CenName = $_POST["descriptionEdit"];
            $address = $_POST["addressEdit"];
            $email = $_POST["emailEdit"];
            $postal = $_POST["postalEdit"];
            $phone = $_POST["phoneEdit"];
            // echo $sno;
            // Sql query to be executed
            $sql = "UPDATE `resourcecentre` SET `centreID`='$CenID',`centreName`='$CenName',`address`='$address',`email`='$email',`postalCode`='$postal',`phoneNum`='$phone' WHERE `resourcecentre`.`centreID`=$sno";
            $result = mysqli_query($conn, $sql);
            if($result){
                $update = true;
            }
            else{
                echo "We could not update the record successfully";
            }
        }
    
        else{
            $CenName = $_POST["centreName"];
            $address = $_POST["address"];
            $email = $_POST["email"];
            $postal = $_POST["postal"];
            $phone = $_POST["phone"];
            
            // Sql query to be executed
            $sql = "INSERT INTO `resourcecentre`(`centreID`, `centreName`, `address`, `email`, `postalCode`, `phoneNum`) VALUES ('NULL','$CenName','$address','$email','$postal','$phone')";
            $result = mysqli_query($conn, $sql);
            
            
            if($result){ 
                $insert = true;
            }
            else{
                echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
            } 
        }
    }
?><?php include 'header.html'; ?>
    
    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            </div>
            <form action="resource_centers.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">

                <div class="form-group">
                <label for="title">Note Title</label>
                <input type="text" class="form-control" id="titleEdit" name="titleEdit" aria-describedby="emailHelp">
                </div>

                <div class="form-group">
                <label for="desc">Note Description</label>
                <input type="text" class="form-control" id="descriptionEdit" name="descriptionEdit">
                </div> 
                <div class="form-group">
                <label for="title">Address</label>
                <input type="text" class="form-control" id="addressEdit" name="addressEdit" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                <label for="title">Note Title</label>
                <input type="email" class="form-control" id="emailEdit" name="emailEdit" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                <label for="title">Postal Code</label>
                <input type="text" class="form-control" id="postalEdit" name="postalEdit" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                <label for="title">Phone Number</label>
                <input type="text" class="form-control" id="phoneEdit" name="phoneEdit" aria-describedby="emailHelp">
                </div>
            </div>
            <div class="modal-footer  mr-auto">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
        </div>
    </div>
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
        <div class="card-body mb-3">
            <form action="" method="post">
                <h3>Add Resource Centre</h3>
                <div class="row">
                    <div class="mb-3 col-12 col-sm-4 ">
                        <label for="exampleFormControlInput1" class="form-label">Resource Centre</label>
                        <input type="text" class="form-control" id="centreName" name="centreName">
                    </div>
                    <div class="mb-3 col-12 col-sm-4">
                        <label for="exampleFormControlInput1" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" >
                    </div>
                </div>
                <div class="mb-3 col-12 col-sm-6 row">
                    <label for="exampleFormControlInput1" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>
                <div class="row">
                    <div class="mb-3 col-12 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Postal Code</label>
                        <input type="text" class="form-control" id="postal" name="postal">
                    </div>
                    <div class="mb-3 col-12 col-md-4">
                        <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone" name="phone">
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary"><h5><i class="fas fa fa-plus"></i>Add Resource Centre</h5></button>
                <!-- <input type="hidden" name="snoEdit" id="deleteid" value="deleteid"> -->
            </form>
        </div>
        
        <div class="container">
            <div class="card">
                <h2 class="card-header text-white bg-primary text-center">Edit / Delete Resource Centre Directory</h2>
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
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <?php showResourceCentres()?>
                    </table>
                    
                </div>
            </div>
        </div>


    </div>
    <?php include '../templates/footer.html'; ?>
    <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
        $('#myTable').DataTable();

        });
    </script>
    <script>
        edits = document.getElementsByClassName('edit');
        Array.from(edits).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                tr = e.target.parentNode.parentNode;
                title = tr.getElementsByTagName("td")[0].innerText;
                description = tr.getElementsByTagName("td")[1].innerText;
                address = tr.getElementsByTagName("td")[2].innerText;
                email = tr.getElementsByTagName("td")[3].innerText;
                postal = tr.getElementsByTagName("td")[4].innerText;
                phone = tr.getElementsByTagName("td")[5].innerText;
                titleEdit.value = title;
                descriptionEdit.value = description;
                addressEdit.value = address;
                emailEdit.value = email;
                postalEdit.value = postal;
                phoneEdit.value = phone;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
                $('#editModal').modal('toggle');
            })
        })

        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                sno = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this note!")) {
                console.log("yes");
                window.location = `resource_centers.php?delete=${sno}`;
                // TODO: Create a form and use post request to submit a form
                }
                else {
                console.log("no");
                }
            })
        })
    </script>
</body>
</html>

