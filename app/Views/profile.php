<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1FkwJf5dlt6tbt/" crossorigin="anonymous">

    <style>
        body {
            background-color: #f4f4f4;
        }
        .sidebar {
            width: 250px;
            height: 100vh;
            background-color: #343a40;
            padding-top: 20px;
            position: fixed;
            color: #fff;
        }
        .sidebar .nav-link {
            color: #c7c7c7;
            padding: 10px 20px;
        }
        .sidebar .nav-link.active, .sidebar .nav-link:hover {
            color: #fff;
            background-color: #007bff;
        }
        .content {
            margin-left: 250px; /* Space for sidebar */
            padding: 20px;
        }
        .profile-card {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .profile-card p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

    <div class="d-flex">
        <!-- Sidebar -->
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

        <!-- Content -->
        <div class="content">
            <div class="profile-card">
                <h1 class="mb-4">Welcome to Your Profile, <?= esc($user['fullname']) ?></h1>
                <div class="card p-4">
                    <p><strong>Full Name:</strong> <?= esc($user['fullname']) ?></p>
                    <p><strong>Email:</strong> <?= esc($user['email']) ?></p>
                    <p><strong>Mobile No:</strong> <?= esc($user['moblie_no']) ?></p>
                    <p><strong>Registration Date:</strong> <?= esc($user['reg_date']) ?></p>
                </div>
                <a href="#" class="btn btn-primary mt-4">Edit Profile</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-mQ93J5crbJA4inMyA9dP/Im9vvbJC5V8QcBTwFFVYkGAiLvILkCvL6KJ7LgY/z18" crossorigin="anonymous"></script>
</body>
</html>
