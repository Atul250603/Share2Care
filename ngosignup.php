<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="HelpFavicon.png">
    <title>Share2Care-SignUp</title>
</head>
<body>
<form action="ngosignuphelper.php" method="POST">
<div class="container mt-4">
    <h2 class="text-primary text-center">SignUp As NGO</h2>
  <div class="mb-3">
  <label for="name" class="form-label">NGO Name</label>
    <input type="text" name="name" class="form-control" id="name" aria-describedby="emailHelp" required>
    <label for="phone" class="form-label">NGO Phone No.</label>
    <input type="phone" name="phone" class="form-control" id="phone" aria-describedby="emailHelp" maxlength=10 required>
    <label for="address" class="form-label">NGO Address</label>
    <input type="text" class="form-control" name="address" id="address" aria-describedby="emailHelp" required>
    <label for="city" class="form-label">NGO City</label>
    <input type="text" class="form-control" name="city" id="city" aria-describedby="emailHelp" required>
    <label for="state" class="form-label">NGO State</label>
    <input type="text" class="form-control" name="state" id="state" aria-describedby="emailHelp" required>
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
  </div>
  <p><a href="ngologin.php" >Already Registered? Click Here To Login</a></p>
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
</div>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</html>