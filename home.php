<?php 
    session_set_cookie_params(0);
    session_start();
    include 'connect.php';
    include 'templates/header.html';
    $conn = OpenCon();
    if(!isset($_SESSION['Loggedin']) || $_SESSION['Loggedin']!==true || !isset($_SESSION['id'])){
        header("location: login.php");
    }
    else{
        $alert="<script>
        Swal.fire({
        title: 'Good Job!',
        text: 'LoggedIn successfully!',
        icon: 'success',
        button: 'OK',
        });
        </script>";
        echo $alert;
        // unset($_SESSION['Loggedin']);
    }
    echo "variable";
    echo $_SESSION['id'];
?>

    <?php include 'templates/footer.html'; ?>
</body>
</html>