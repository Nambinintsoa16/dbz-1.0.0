<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=gestiondevente", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connected successfully"; 
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
$json = array();
	$pdo_statement = $conn->prepare("SELECT idcomand ,datedecomand FROM comande");
    $pdo_statement->execute();
    $result = $pdo_statement->fetchAll();
    echo json_encode($result);
?>