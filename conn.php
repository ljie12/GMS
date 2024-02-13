<?php 
try {
    $host = "localhost";
    $dbname = "id21868705_gms";
    $user = "id21868705_root";
    $password = "Elgie*12";

    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // if($conn){
    //     echo 'Connected to DB';
    // }
} catch (PDOException $err) {
    echo $err->getMessage();
}
?>
