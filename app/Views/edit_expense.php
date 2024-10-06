<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Expense</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Edit Expense</h2>

       

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

        <form action="<?= site_url('/home/updateExpense/' . $expense['id']); ?>" method="post">
            <div class="form-group">
                <label for="expense_date">Date</label>
                <input type="date" name="expense_date" class="form-control" value="<?= $expense['expense_date']; ?>" required>
            </div>
            <div class="form-group">
                <label for="expense_Item">Item</label>
                <input type="text" name="expense_Item" class="form-control" value="<?= $expense['expense_Item']; ?>" required>
            </div>
            <div class="form-group">
                <label for="expense_cost">Amount</label>
                <input type="number" name="expense_cost" class="form-control" value="<?= $expense['expense_cost']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Expense</button>
        </form>
    </div>
</body>
</html>
