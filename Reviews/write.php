<?php
    session_start();
    include '../connect.php';
    $conn = OpenCon();
?>
<?php include '../templates/folheader.html'; ?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Reviews</a></li>
                <li class="breadcrumb-item active">Write Reviews</li>
            </ol>
            <div class="col-12">
               <h3> Write Reviews</h3>
               <hr>
            </div>
        </div>
        <div class="container" style="background-color:rgb(255, 252, 245); padding: 10px 10px 10px 10px;">
            <table class="table table-striped" id="myTable">
                <thead class="bg-primary text-white">
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Counsellor Name</th>
                    <th scope="col" class='text-center'>Write Reviews</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT * FROM `counsellors`;";
                    $result = mysqli_query($conn, $sql);
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno + 1;
                        $k = "Dr. ".$row['firstname'];
                        echo "<tr>
                        <th class='text-center' scope='row'>". $sno . "</th>
                        <td > ".$k . "</td>
                        <td class='text-center'><a class='btn btn-success btn-xs' href='rating.php?Cid=".$row['cno']."><button class='text-center btn btn-sm btn-primary>Write Review</button></a></td>
                    </tr>";
                    } 
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php include '../templates/footer.html'; ?>
     <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
            $("#signout").addClass('active');
        } );
    </script>
</body>
</html>
