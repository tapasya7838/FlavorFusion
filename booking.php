<?php
$Date = $_POST['Date'];
$Time = $_POST['Time'];
$Peoples = $_POST['Peoples'];
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];
$Number = $_POST['Number'];

$conn = new mysqli('localhost','root','','flavorfusion');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into booking(Date, Time, Peoples, Firstname, Lastname, Email, Number)
            values(?,?,?,?,?,?,?)");
    $stmt->bind_param("ssisssi",$Date, $Time, $Peoples, $Firstname, $Lastname, $Email, $Number);
    $stmt->execute();
    echo "Your Table is booked!";
    $stmt->close();
    $conn->close();
}
?>