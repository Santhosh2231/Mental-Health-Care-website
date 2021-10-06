<?php
    include '../connect.php';
?>
<?php include './templates/folheader.html'; ?>
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
