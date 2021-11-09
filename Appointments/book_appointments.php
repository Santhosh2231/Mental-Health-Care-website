<?php
    session_start();
    include '../connect.php';
    $conn = OpenCon();
?><?php include '../templates/folheader.html'; ?>
    <div class="container">
        <div class="row">
            <ol class="col-12 breadcrumb">
                <li class="breadcrumb-item"><a href="../home.php">Home</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Menu</a></li>
                <li class="breadcrumb-item"><a href="../menu.php">Appointments</a></li>
                <li class="breadcrumb-item active">Book Appointments</li>
            </ol>
            <div class="col-12">
               <h3>Book Appointments</h3>
               <hr>
            </div>
        </div>
        <div class="container" style="background-color:rgb(255, 252, 245); padding: 10px 10px 10px 10px;">
            <table class="table table-striped" id="myTable">
                <thead>
                    <tr>
                    <th scope="col">S.No</th>
                    <th scope="col">Counsellor Name</th>
                    <th scope="col">Rating</th>
                    <th scope="col">Years of Experience</th>
                    <th scope="col">Book Appointment</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $sql = "SELECT counsellors.cno cno,counsellors.firstname Cname,ROUND(AVG(review.rating),1) rating,counsellor_exper.counsellor_exp expe FROM `counsellors`";
                    $sql .= "LEFT JOIN review on counsellors.cno=review.counsellorid LEFT JOIN counsellor_exper on counsellors.cno=counsellor_exper.cno GROUP BY counsellors.cno;";
                    $result = mysqli_query($conn, $sql);
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno + 1;
                        echo "<tr>
                        <th class='text-center' scope='row'>". $sno . "</th>
                        <td > Dr. ". $row['Cname'] . "</td>
                        <td class='text-center'>". $row['rating'] . "</td>
                        <td class='text-center'>". $row['expe'] . "</td>
                        <td class='text-center'><a href='counsellor_booking.php?counsellorid=".$row['cno']."<form action='counsellor_booking.php' method='get' ><button class='book text-center btn btn-sm btn-primary' id=".$row['cno'].">Book Appointment</button></form></a></td>
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
        } );
    </script>
</body>
</html>