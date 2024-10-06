<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Expense List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
         .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%; /* Full height */
            width: 175px; /* Adjust width as per your need */
            background-color: #f8f9fa; /* Sidebar background color */
            padding-top: 20px; /* Optional: add some padding */
        }
    </style>
</head>
<body>

<table  width="100%" >
    <tr>
        <td colspan ="2"> <div class="card-header">


<h2 class="text-center mb-4">Expense Tracker</h2>



</div>
</td>
        
    </tr>

    <tr>
    
        <td width="175px" >
            
   
        <nav class="sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="addExpense">Add Expense</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Settings</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('/home/logout') ?>">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        </td>



        <td>    
            
 
<div class="container mt-5">
  
    
  <!-- Flash messages for success or error -->
  <?php if (session()->getFlashdata('success')) : ?>
      <div class="alert alert-success">
          <?= session()->getFlashdata('success'); ?>
      </div>
  <?php elseif (session()->getFlashdata('error')) : ?>
      <div class="alert alert-danger">
          <?= session()->getFlashdata('error'); ?>
      </div>
  <?php endif; ?>

 
  
  <div class="card">
      
      
      <div class="card-body">
          <table class="table table-hover table-bordered table-striped">
              <thead >  <h4>List of Expenses</h4> 
                  <tr>
                      <th>Sno.</th>
                      <th>Date</th>
                      <th>Item</th>
                      <th>Amount</th>
                      <th>Actions</th>
                  </tr>
              </thead>
              <tbody>
                  <?php if (!empty($expenses) && is_array($expenses)) : ?>
                      <?php foreach ($expenses as $key => $expense) : ?>
                          <tr>
                              <td><?= $key + 1; ?></td>
                              <td><?= $expense['expense_date']; ?></td>
                              <td><?= $expense['expense_Item']; ?></td>
                              <td><?= $expense['expense_cost']; ?></td>
                              <td>
                                  <!-- Add your edit and delete action links here -->
                                  <a href="<?= site_url('home/editExpense/' . $expense['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                                  <a href="<?= site_url('home/deleteExpense/' . $expense['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</a>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                  <?php else : ?>
                      <tr>
                          <td colspan="5" class="text-center">No expenses added yet.</td>
                      </tr>
                  <?php endif; ?>
              </tbody>
          </table>
      </div>
  </div>
</div>   </td>
    </tr>
</table>





<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
