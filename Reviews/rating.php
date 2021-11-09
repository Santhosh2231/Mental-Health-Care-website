<?php
    session_start();
    include '../connect.php';
    $conn = OpenCon();
    $_SESSION['Cid'] = $_GET['Cid'];
    function counsellorname(){
        global $conn;
        $k = $_GET['Cid'];
        $sql = "select firstname from `counsellors` where cno = '$k'";
        $result = $conn->query($sql);
        // if($result->num_rows==1){
        while($row = $result->fetch_assoc()){
            echo "<h3 class='text-success'>Dr. ".$row['firstname']."</h3>";
        }
        // }
    }
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
        <div class="container">
            <div class="card col-sm-8 offset-sm-2">
                <h2 class="card-header text-white bg-primary text-center">Review </h2>
                <div class="card-body">
                    <form action="view.php" method="post">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label class="control-label mx-2"><h3>Counsellor Name :</h3></label>
                                </div>
                                <div class="col-6">
                                    <?php counsellorname(); ?>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="exampleFormControlTextarea1" class="form-label">Rating</label>
                                    <select name="rating" class="form-control" id="rating">
                                        <option value="10"> 10 stars</option>
                                        <option value="9">9 stars</option>
                                        <option value="8">8 stars</option>
                                        <option value="7">7 stars</option>
                                        <option value="6">6 stars</option>
                                        <option value="5">5 stars</option>
                                        <option value="4">4 stars</option>
                                        <option value="3">3 stars</option>
                                        <option value="2">2 stars</option>
                                        <option value="1">1 star</option>
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Feedback</label>
                                <textarea class="form-control" id="feedback" rows="6" name="feedback" placeholder="Give your Feedback"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    
                        </div>
                    </form>
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
        } );
    </script>
</body>
</html>
