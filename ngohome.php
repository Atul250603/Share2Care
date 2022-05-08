<?php
$ngoid=$_GET['id'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect to the server due to ".mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
     <!-- CSS only -->
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
<link rel="icon" type="image/x-icon" href="HelpFavicon.png">
    <title>Share2Care-Home</title>
</head>
<body>
<nav class='navbar navbar-expand-lg navbar-dark bg-primary'>
  <div class='container-fluid '>
    <a class='navbar-brand' href='ngohome.php?id=<?php echo$ngoid ?>'>Share2Care</a>
    <button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
      <span class='navbar-toggler-icon'></span>
    </button>
    <div class='collapse navbar-collapse' id='navbarSupportedContent'>
        <div class='d-flex justify-content-between'>
      <ul class='navbar-nav me-auto mb-2 mb-lg-0'>
        <li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='ngohome.php?id=<?php echo$ngoid ?>'>Home</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link active' href='myprofile.php?id=<?php echo$ngoid ?>'>My Profile</a>
        </li>
        <li class='nav-item'>
          <a class='nav-link active' href='index.php'>Logout</a>
        </li>
        </ul>
        </div>
</div>
</div>
</nav>
<div class='container mt-4 text-center '>
<h3>All Available Items</h3>
<div class='d-flex justify-content-center row'>
<?php
$sql5="Select State from ngo where Id='$ngoid'";
$result5=$conn->query($sql5);
while($row=$result5->fetch_assoc()){
  $ngostate=$row['State'];
}
$sql="SELECT * from donateditem where DonorId IN(Select Id from donor where State='$ngostate') AND Quantity>0";
$result=$conn->query($sql);
if($result && mysqli_num_rows($result)){
  while($row=$result->fetch_assoc()){
    $sql1="SELECT Name from donor where Id={$row['DonorId']}";
    $result1=$conn->query($sql1);
    while($row1=$result1->fetch_assoc()){
     echo"
      <div class='card text-white bg-primary mb-3 mx-2 col-3'>
    <div class='card-body text-center border border-1 border-primary'>
      <h5 class='card-title'>{$row['ItemName']}</h5>
      <h6 class='card-subtitle mb-2'>Quantity - {$row['Quantity']}</h6>
      <h6 class='card-subtitle mb-2'>Donor - {$row1['Name']}</h6>
  <button type='button' class='btn btn-light' data-bs-toggle='modal' data-bs-target='#exampleModal{$row['Id']}'>
    Order
  </button>
  <div class='modal fade text-dark text-start' id='exampleModal{$row['Id']}' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
        <h5 class='modal-title' id='exampleModalLabel'>{$row['ItemName']}</h5>
          <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
        </div>
        <div class='modal-body'>
        <form action='orderhelper.php' method='POST'>
        <label for='qty' class='form-label'>Quantity</label>
  <input type='number' id='qty' name='qty' class='form-control'>
  <input type='hidden' id='itemid' name='itemid' value='{$row['Id']}'>
  <input type='hidden' id='donorid' name='donorid' value='{$row['DonorId']}'>
  <input type='hidden' id='ngoid' name='ngoid' value='$ngoid'>
  <input type='hidden' id='itemname' name='itemname' value='{$row['ItemName']}'>
  <div class='container text-center'>
  <button type='submit' class='btn btn-primary mt-3'>Order</button>
  </div>
  </form>
        </div>
      </div>
    </div>
  </div>
    </div>
  </div>
      ";
  }
}
}
else{
  echo"<div class='text-danger'>No Donor In Your State Yet.....</div>";
}
?>
</div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</html>