<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
 
<center>
<h1  style="color:blue;text-align:center;"> Daily expense Tracker </h1>
<h3  style="color:black;text-align:center;"> User Log in </h3>
</center>
    <div class="container">
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php ;endif ?>
      
    <form method="post" action="<?= base_url('home/login') ?>">
    <!-- <form  method = "post" action= "home/login"> -->
            <div class ="form-group">
                <label for = "email"></label>
                <input type ="email" name="email" placeholder="Enter your email id" class="form-control" required>
</div>
            <div>
              <label for="password"></label>
                <input type="password" name="password" placeholder="Enter your password" class="form-control" required>
</div>   
          
           


            <input type="submit" value="Login" class="btn btn-primary">
            <br>
             <p>Not register Yet?</p>   
             <!-- <a href="register">Register Here</a> -->
             <a href="<?= base_url('home/register') ?>">Register Here</a>
        </form>


</div>




</body>
</html>