<?php
$name=$_POST['name'];
$phone=$_POST['phone'];
$email=$_POST['email'];
$address=$_POST['address'];
$password=$_POST['password'];
$city=$_POST['city'];
$state=$_POST['state'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect to the database due to ". mysqli_connect_error());
}
$sql1="SELECT * from donor where Email='$email'";
$result1=$conn->query($sql1);
if(mysqli_num_rows($result1)>0){
    header("location:https://share2care.000webhostapp.com/share2care/donorsignup.php");
}
else{
$sql="INSERT INTO donor(Name,Phone,Email,Address,City,State,Password)values('$name','$phone','$email','$address','$city','$state','$password')";
$result=$conn->query($sql);
if($result){
    header("location:https://share2care.000webhostapp.com/share2care/donorlogin.php");
}
else{
    header("location:https://share2care.000webhostapp.com/share2care/index.php");
}
}
?>