<?php
$redeemid=$_POST['redeemid'];
$donorid=$_POST['donorid'];
$itemprice=$_POST['itemprice'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect to the server due to ".mysqli_connect_error());
}
$sql="INSERT INTO redeemorder(ItemId,DonorId)value('$redeemid','$donorid')";
$result=$conn->query($sql);
if($result){
    $sql1="UPDATE donor SET Coins=Coins-$itemprice where Id='$donorid'";
    $result1=$conn->query($sql1);
    if($result1){
        header("location:https://share2care.000webhostapp.com/share2care/redeem.php?id=$donorid");
    }
}

?>