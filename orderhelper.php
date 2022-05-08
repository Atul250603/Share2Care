<?php
$itemname=$_POST['itemname'];
$itemid=$_POST['itemid'];
$donorid=$_POST['donorid'];
$qty=$_POST['qty'];
$ngoid=$_POST['ngoid'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect to the server due to ". mysqli_connect_error());
}
$sql2="SELECT Quantity from donateditem where Id='$itemid'";
$result2=$conn->query($sql2);
$flag=1;
while($row=$result2->fetch_assoc()){
    if($row['Quantity']<$qty || $qty<=0){
        $flag=0;
    }
}
if($flag==1 ){
$sql="INSERT INTO order_details(ItemId,ItemName,Quantity,DonorId,NgoId) values('$itemid','$itemname','$qty','$donorid','$ngoid')";
$result=$conn->query($sql);
$sql1="UPDATE donateditem SET Quantity=Quantity-'$qty' where Id='$itemid'";
$result1=$conn->query($sql1);
if($result){
    header("location:https://share2care.000webhostapp.com/share2care/ngohome.php?id=$ngoid");
}
}
else{
    header("location:https://share2care.000webhostapp.com/share2care/ngohome.php?id=$ngoid");
}
?>