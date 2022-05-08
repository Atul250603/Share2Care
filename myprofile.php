<?php
$ngoid=$_GET['id'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect to the server due to " .mysqli_connect_error());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3' crossorigin='anonymous'>
<link rel="icon" type="image/x-icon" href="HelpFavicon.png">
    <title>Share2Care-My Profile</title>
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
<?php
$sql="Select * from ngo where Id='$ngoid'";
$result=$conn->query($sql);
if(mysqli_num_rows($result)<=0){
  header("location:https://share2care.000webhostapp.com/share2care/ngosignup.php");
}
?>
<div>
    <div class="d-flex py-4 px-2 bg-light">
        <div class="d-flex user justify-content-center align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="#0d6efd" class="bi bi-person-circle" viewBox="0 0 16 16">
  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
</svg>
        </div>
        <div class="details mx-4 fs-5 justify-content-center align-items-center">
        <?php
                while($row=$result->fetch_assoc()){
                    echo"
                    <div class='name'>
                    {$row['Name']}
            </div>
            <div class='contact d-flex'>
                <div class='phone'>{$row['Phone']}</div>
                <div class='email mx-2'>{$row['Email']}</div>
            </div>
            <div class='address'>
            {$row['Address']}
            </div>
                    ";
                }
        ?>
        </div>
    </div>
</div>
<div class="orders mt-3">
<h3 class="text-center">All Past Orders</h3>
      <?php
      $i=1;
      $sql="SELECT * from order_details where NgoId='$ngoid'";
      $result=$conn->query($sql);
      $flag=0;
      if(mysqli_num_rows($result)>0){
        $flag=1;
      }
      if($flag==1){
        echo"<table class='table table-striped text-center mt-4'>
        <thead>
          <tr>
            <th scope='col'>S.No</th>
            <th scope='col'>Item Name</th>
            <th scope='col'>Quantity</th>
            <th scope='col'>Donor</th>
            <th scope='col'>Order Status</th>
            <th scope='col'>Order Date</th>
          </tr>
        </thead>
        <tbody>";
      while($row=$result->fetch_assoc()){
          $sql1="SELECT Name from donor where Id={$row['DonorId']}";
          $result1=$conn->query($sql1);
          while($row1=$result1->fetch_assoc()){
              echo"
              <tr>
              <th scope='row'>{$i}</th>
              <td>{$row['ItemName']}</td>
              <td>{$row['Quantity']}</td>
              <td>{$row1['Name']}</td>
              <td class='d-flex justify-content-center align-items-center'>{$row['OrderStatus']}
              <div class='d-flex justify-content-center flex-column px-2'>";
              if($row['OrderStatus']=='Active'){
              echo" <form action='ordereceived.php' method='POST'>
                <input type='hidden' name='orderid' value='{$row['Id']}'>
                <input type='hidden' name='ngoid' value='$ngoid'>
                <button type='submit' class='btn btn-primary btn-sm my-1'>Receieved</button>
              </form>";
              }
              if($row['OrderStatus']=='Active' || $row['OrderStatus']=='Received'){
              echo"<form action='orderdistributed.php' method='POST'>
                <input type='hidden' name='orderid' value='{$row['Id']}'>
                <input type='hidden' name='ngoid' value='$ngoid'>
                <button type='submit' class='btn btn-success btn-sm my-1'>Distributed</button>
              </form>";
              }
              echo"
              </div>
              </td>
              <td>{$row['OrderDate']}</td>
            </tr>
              ";
              $i++;
          }
      }
    }
    else{
      echo"<div class='text-danger text-center'>No Orders Yet....</div>";
    }
      ?>
      <?php if($flag==1){echo"</tbody>
</table>";}?>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</html>