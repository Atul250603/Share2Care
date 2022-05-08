<?php
$donor=$_POST['donor'];
$itemname=$_POST['itemname'];
$qty=$_POST['qty'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect To The Serve due to ".mysqli_connect_error());
}
if($qty<=0){
    header("location:https://share2care.000webhostapp.com/share2care/donorhome.php?id=$donor");
}
$sql="INSERT INTO donateditem(ItemName,Quantity,DonorId) values('$itemname','$qty','$donor')";
$sql1="UPDATE donor SET Coins=Coins+100 where Id='$donor'";
$result=$conn->query($sql);
$result1=$conn->query($sql1);
if($result){
    header("location:https://share2care.000webhostapp.com/share2care/donorhome.php?id=$donor");
}
?>