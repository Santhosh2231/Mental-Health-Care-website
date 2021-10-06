<?php
    include '../connect.php';
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
                    $sql = "SELECT counsellors.cno cno,counsellors.firstname Cname,review.rating rating,counsellor_exper.counsellor_exp expe FROM `counsellors`";
                    $sql .= "LEFT JOIN review on counsellors.cno=review.counsellorid LEFT JOIN counsellor_exper on counsellors.cno=counsellor_exper.cno;";
                    $result = mysqli_query($conn, $sql);
                    $sno = 0;
                    while($row = mysqli_fetch_assoc($result)){
                        $sno = $sno + 1;
                        echo "<tr>
                        <th class='text-center' scope='row'>". $sno . "</th>
                        <td > Dr. ". $row['Cname'] . "</td>
                        <td class='text-center'><button class='btnmodal text-center btn btn-sm btn-primary' id=".$row['cno']." data-id=".$row['cno']." data-toggle='modal' data-target='#exampleModalCenter'>Write Review</button></td>
                    </tr>";
                    } 
                ?>
                </tbody>
            </table>
        </div>
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <div class="form-group">
                         <label class="control-label">Id: </label>
                         <input type="text" name="id" id="id" />
                     </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>


    </div>
    <?php include '../templates/footer.html'; ?>
     <script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#myTable').DataTable();
            $("#signout").addClass('active');
            $(".btnmodal").click(function(){
                var passedID = $(this).data('id');
                $('input:text').val(passedID);
            })
        } );
    </script>
</body>
</html>
