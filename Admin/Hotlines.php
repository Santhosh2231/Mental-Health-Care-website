<?php
    session_start();
    include '../connect.php';
    $conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: ../admin.php");
    }
	// Display information of all hotlines
	function showHotlines() {

		global $conn;  
		$sql = "SELECT * FROM Hotline";
		$result = $conn->query($sql);

		while($row = $result->fetch_assoc()) { 
			echo "<tr class='table'>
					<td>".$row["name"]."</td>
					<td>".$row["phoneNum"]."</td>
					<td>".$row["typeOfHelp"]."</td>
                    <td> <button class='edit btn btn-sm btn-primary' id=".$row['Hotno'].">Edit</button> <button class='delete btn btn-sm btn-danger' id=d".$row['Hotno'].">Delete</button> </td>
				  </tr>";
		}
	}
    if(isset($_GET['delete'])){
        $sno = $_GET['delete'];
        $delete = true;
        $sql = "DELETE FROM `hotline` WHERE `hotline`.`Hotno`=$sno";
        $result = mysqli_query($conn, $sql);
        
      }
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset( $_POST['snoEdit'])){
            // Update the record
            $sno = $_POST["snoEdit"];
            $name = $_POST["nameEdit"];
            $phone = $_POST["phoneEdit"];
            $type = $_POST["typeEdit"];
            $sql = "UPDATE `hotline` SET `phoneNum`='$phone',`typeOfHelp`='$type',`name`='$name' WHERE `hotline`.`Hotno`=$sno";
            $result = mysqli_query($conn, $sql);
            if($result){
                $update = true;
            }
            else{
                echo "We could not update the record successfully";
            }
        }
    
        else{
            $name = $_POST["name"];
            $phone = $_POST["phone"];
            $type = $_POST["type"];
            
            // Sql query to be executed
            $sql = "INSERT INTO `hotline`(`Hotno`, `phoneNum`, `typeOfHelp`, `name`) VALUES ('NULL','$phone','$type','$name')";
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
            <form action="Hotlines.php" method="POST">
            <div class="modal-body">
                <input type="hidden" name="snoEdit" id="snoEdit">
                <div class="form-group">
                    <label for="title">Name</label>
                    <input type="text" class="form-control" id="nameEdit" name="nameEdit" >
                </div>
                <div class="form-group">
                    <label for="desc">Phone Number</label>
                    <input type="text" class="form-control" id="phoneEdit" name="phoneEdit">
                </div> 
                <div class="form-group">
                    <label for="title">Type of Help</label>
                    <input type="text" class="form-control" id="typeEdit" name="typeEdit" >
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
                <li class="breadcrumb-item active">Hotlines</li>
            </ol>
            <div class="col-12">
               <h3>Hotlines</h3>
               <hr>
            </div>
        </div>
        <div class="card-body mb-3">
            <form action="" method="post">
                <h3>Add Hotline</h3>
                
                <div class="mb-3 col-12 col-sm-5 ">
                    <label for="exampleFormControlInput1" class="form-label">Name of the Hotline</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="mb-3 col-12 col-sm-5">
                    <label for="exampleFormControlInput1" class="form-label">Phone Number</label>
                    <input type="text" class="form-control" id="phone" name="phone" >
                </div>
                
                <div class="mb-3 col-12 col-sm-5 ">
                    <label for="exampleFormControlInput1" class="form-label">Type of Help</label>
                    <input type="text" class="form-control" id="type" name="type" >
                </div>
                
                <button type="submit" class="btn btn-sm btn-primary ml-3 mb-2"><h5><i class="fas fa fa-plus"></i>Add Hotline</h5></button>
            </form>
        </div>
        <div class="container">
            <div class="card">
                <h3 class="card-header text-white bg-primary text-center">Edit / Delete  Hotline Directory</h3>
                <div class="card-body">
                    <table class="table table-striped" id="myTable">
                        <thead class="bg-success text-white">
                            <tr>
                                <th>Name</th>
                                <th>Phone Number</th>
                                <th>Type of Help</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php showHotlines() ?>
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
                name = tr.getElementsByTagName("td")[0].innerText;
                phone = tr.getElementsByTagName("td")[1].innerText;
                type = tr.getElementsByTagName("td")[2].innerText;
                nameEdit.value = name;
                phoneEdit.value = phone;
                typeEdit.value = type;
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

                if (confirm("Are you sure you want to delete this type of Help!")) {
                console.log("yes");
                window.location = `Hotlines.php?delete=${sno}`;
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