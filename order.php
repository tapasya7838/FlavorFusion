<?php
$Firstname = $_POST['Firstname'];
$Lastname = $_POST['Lastname'];
$Email = $_POST['Email'];
$Number = $_POST['Number'];
$Order = $_POST['Order'];
$Payment_mode = $_POST['Payment_mode'];

$conn = new mysqli('localhost','root','','flavorfusion');
if($conn->connect_error){
    die('Connection Failed :'.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into order(Firstname, Lastname, Email, Number, Order, Payment_mode)
            values(?,?,?,?,?,?)");
    $stmt->bind_param("sssiss",$Firstname, $Lastname, $Email, $Number, $Order, $Payment_mode);
    $stmt->execute();
    echo "Thanks for ordering! Your Order will be deliverd Within 30 minutes!";
    $stmt->close();
    $conn->close();
}
?>