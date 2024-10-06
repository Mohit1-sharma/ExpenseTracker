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
<div class="card mb-4">
                <div class="card-header">
                    <h4>Add New Expense</h4>
                </div>
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
    </div>

   

    
                <div class="card-body">
                   
                    <form action="<?= site_url('/home/addExpense') ?>" method="post">
                        <div class="form-group">
                            <label for="expense_date">Date</label>
                            <input type="date" name="expense_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="expense_Item">Item</label>
                            <input type="text" name="expense_Item" class="form-control" placeholder="e.g. Food, Transport" required>
                        </div>
                        <div class="form-group">
                            <label for="expense_cost">Amount</label>
                            <input type="number" name="expense_cost" class="form-control" placeholder="Enter amount" required>
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Add Expense</button>
                    </form>
  
                </div>
            </div>
        
</body>
</html>