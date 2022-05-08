<?php
$donorid=$_GET['id'];
$conn=mysqli_connect("localhost","id18900758_root","AtulGoyal1234@","id18900758_share2care");
if(!$conn){
    die("Couldn't Connect To The Server due to ".mysqli_connect_error());
}
$sql1="Select Coins from donor where Id='$donorid'";
$result1=$conn->query($sql1);
if(mysqli_num_rows($result1)<=0){
  header("location:https://share2care.000webhostapp.com/share2care/donorsignup.php");
}
$coins;
while($row=$result1->fetch_assoc()){
    $coins=$row['Coins'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="HelpFavicon.png">
    <title>Share2Care-Home</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container-fluid ">
    <a class="navbar-brand" href="donorhome.php?id=<?php echo$donorid ?>">Share2Care</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="d-flex justify-content-between">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="donorhome.php?id=<?php echo$donorid ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="ngosignup.php">Redeem</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active disabled" href="ngosignup.php"><?php echo($coins) ?> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="gold" class="bi bi-coin" viewBox="0 0 16 16">
  <path d="M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z"/>
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"/>
</svg></a>
        </li>
        <li class='nav-item'>
          <a class='nav-link active' href='index.php'>Logout</a>
        </li>
        </ul>
        </div>
</div>
</div>
</nav>
<div class="container mt-4">

    <h3 class='mb-4'>All Available Prizes</h3>
    <div class="row">
    <?php
        $sql="SELECT * from redeemitems";
        $result=$conn->query($sql);
        while($row=$result->fetch_assoc()){
            echo"
            <div class='card mx-2' style='width: 18rem;'>
  <img src='Tshirt.png' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>{$row['Name']} Merchandise</h5>
    <div>
    <form action='redeemhelper.php' method='POST'>
            <input type='hidden' name='donorid' value='$donorid'>
            <input type='hidden' name='redeemid' value='{$row['Id']}'>
            <input type='hidden' name='itemprice' value='{$row['Price']}'>";
            $disabled="";
            if($row['Price']>$coins){
                $disabled="disabled";
            }
            echo"
            <div class='text-center d-flex justify-content-center align-items-center'>
            <button type='submit' class='btn btn-primary' $disabled>{$row['Price']}  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='gold' class='bi bi-coin' viewBox='0 0 16 16'>
            <path d='M5.5 9.511c.076.954.83 1.697 2.182 1.785V12h.6v-.709c1.4-.098 2.218-.846 2.218-1.932 0-.987-.626-1.496-1.745-1.76l-.473-.112V5.57c.6.068.982.396 1.074.85h1.052c-.076-.919-.864-1.638-2.126-1.716V4h-.6v.719c-1.195.117-2.01.836-2.01 1.853 0 .9.606 1.472 1.613 1.707l.397.098v2.034c-.615-.093-1.022-.43-1.114-.9H5.5zm2.177-2.166c-.59-.137-.91-.416-.91-.836 0-.47.345-.822.915-.925v1.76h-.005zm.692 1.193c.717.166 1.048.435 1.048.91 0 .542-.412.914-1.135.982V8.518l.087.02z'/>
            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
            <path d='M8 13.5a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11zm0 .5A6 6 0 1 0 8 2a6 6 0 0 0 0 12z'/>
          </svg></button>
            </div>
    </form>
    </div>
  </div>
</div>";
        }
    ?>
    </div>
</div>
<div class="container mt-3">
    <h3 class='mt-2'>Redeemed Orders</h3>
    <div class="table">
    <table class='table table-striped text-center'>
        <thead>
          <tr>
            <th scope='col'>S.No</th>
            <th scope='col'>Item Name</th>
            <th scope='col'>Order Status</th>
            <th scope='col'>Order Date</th>
          </tr>
        </thead>
        <tbody>
            <?php
            $i=1;
            $sql2="SELECT * from redeemorder where DonorId='$donorid'";
            $result2=$conn->query($sql2);
            while($row=$result2->fetch_assoc()){
                $sql3="SELECT * from redeemitems where Id='{$row['ItemId']}'";
                $result3=$conn->query($sql3);
                while($row1=$result3->fetch_assoc()){
                    echo"<tr>
              <th scope='row'>{$i}</th>
              <td>{$row1['Name']}</td>
              <td>{$row['OrderStatus']}</td>
              <td>{$row['Date']}</td>
              </tr>
              ";
              $i++;
                }
            }
            ?>
    </tbody>   
    </div>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js' integrity='sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p' crossorigin='anonymous'></script>
</html>