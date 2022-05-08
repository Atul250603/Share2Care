<?php
$email=$_POST['email'];
$password=$_POST['password'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect to the database due to ". mysqli_connect_error());
}
$sql="SELECT * from donor where Email='$email' and Password='$password'";
$result=$conn->query($sql);
$id=0;
if(mysqli_num_rows($result)>0){
    while($row=$result->fetch_assoc()){
        $id=$row['Id'];
    }
    header("location:https://share2care.000webhostapp.com/share2care/donorhome.php?id=$id");
}
else{
    
    header("location:https://share2care.000webhostapp.com/share2care/donorlogin.php");
}
?>