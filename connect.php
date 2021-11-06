<?php
    function OpenCon(){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "mental-health-project";

        $conn = new mysqli($server, $username, $password,$database) or die("Connect failed: %s\n". $conn -> error);
        return $conn;
    }
    function CloseCon($conn)
	{
		$conn -> close();
	}
?>