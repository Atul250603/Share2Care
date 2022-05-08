<?php
$ngoid=$_POST['ngoid'];
$orderid=$_POST['orderid'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect to the server due to ".mysqli_connect_error());
}
$sql="UPDATE order_details SET OrderStatus='Distributed' where Id='$orderid'";
$result=$conn->query($sql);
if($result){
    header("location:https://share2care.000webhostapp.com/share2care/myprofile.php?id=$ngoid");
}
?>