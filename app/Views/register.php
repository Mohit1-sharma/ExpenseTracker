<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
 
<center>
<h1  style="color:blue;text-align:center;"> Daily expense Tracker </h1>
<h3>Register here</h3>
</center>
    
    <div class="container">
    <!-- Display success or error message -->
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('success'); ?>
        </div>
    <?php elseif (session()->getFlashdata('error')) : ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?>
        </div>
    <?php endif; ?>

      
    <form method="post" action="<?= base_url('home/store') ?>">
    <!-- <form method="post" action="store"> -->
            <div class ="form-group">
                <label for = "fullname"></label>
                <input type ="text" name="fullname" placeholder="Enter your first name" class="form-control" required>
</div>
            <div>
              <label for="email"></label>
                <input type="email" name="email" placeholder="enter your email id" class="form-control" required>
</div>   
           <div>  
              <label for="mobile_no"></label>
              <input type="tel" id="mobile_no" name="mobile_no" pattern="[0-9]{10}" placeholder="Enter mobile number" title="Mobile number should be 10 digits long" class="form-control" required>
</div> 
            <div>  
              <label for="password"></label>
                <input type="password" name="password" placeholder="Enter the Password" class="form-control" required>
</div>    
           

<div>  
              <label for="confirm password"></label>
                <input type="password" name="confirm password" placeholder=" confirm Password" class="form-control" required>
</div>
            <input type="submit" value="SAVE" class="btn btn-primary">
            <a href="login">Already Registered</a>
        </form>


</div>




</body>
</html>