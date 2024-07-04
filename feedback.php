<?php
$YourName = $_POST['YourName'];
$Email = $_POST['Email'];
$Rating = $_POST['Rating'];

$conn = new mysqli('localhost','root','','flavorfusion');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into feedback(YourName, Email, Rating)
            values(?,?,?)");
    $stmt->bind_param("sss",$YourName, $Email, $Rating);
    $stmt->execute();
    echo "Thanks for your feedback!";
    $stmt->close();
    $conn->close();
}
?>