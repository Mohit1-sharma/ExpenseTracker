<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
   <!-- Bootstrap 4 CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
    <!-- Custom CSS for 3D and Animations -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: #f0f2f5;
        }
        
        .dashboard-header {
            text-align: center;
            padding: 20px;
            color: #fff;
            background: linear-gradient(to right, #36d1dc, #5b86e5);
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .card {
            border-radius: 15px;
            transition: transform 0.3s ease;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .card:hover {
            transform: translateY(-10px);
        }
        
        .chart-container {
            position: relative;
            height: 300px;
        }

        .stats-icon {
            font-size: 2.5rem;
            color: #fff;
        }

        .stats-box {
            background-color: #5b86e5;
            color: white;
            padding: 20px;
            border-radius: 15px;
            text-align: center;
            margin-bottom: 20px;
        }

        .stats-title {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #fff;
        }
    </style>
</head>


<body>

<div class="container-fluid">
<?php if (!session()->get('email')) : ?>
    <?php session()->setFlashdata('error', 'Please log in first!'); ?>
    <?php return redirect()->to('/home/login')->send(); ?>
<?php endif; ?>


    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="addExpense">Add Expense</a>
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

        
    <div class="container mt-4">
        <div class="dashboard-header">
            <h1>Expense Tracker Dashboard</h1>
            <p>Track your daily, weekly, and monthly expenses</p>
        </div>

        <!-- Weekly, Monthly, and Daywise spent stats -->
        <div class="row">
            <div class="col-md-4">
                <div class="stats-box">
                    <i class="fas fa-calendar-week stats-icon"></i>
                    <div class="stats-title">Weekly Spent</div>
                    <div class="stats-value">$<span id="weekly-spent">0</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <i class="fas fa-calendar-alt stats-icon"></i>
                    <div class="stats-title">Monthly Spent</div>
                    <div class="stats-value">$<span id="monthly-spent">0</span></div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stats-box">
                    <i class="fas fa-calendar-day stats-icon"></i>
                    <div class="stats-title">Daily Spent</div>
                    <div class="stats-value">$<span id="daily-spent">0</span></div>
                </div>
            </div>
        </div> 

        <!-- Charts -->
         <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Weekly Spending</h5>
                        <div class="chart-container">
                            <canvas id="weeklyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Monthly Spending</h5>
                        <div class="chart-container">
                            <canvas id="monthlyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Daywise Spending</h5>
                        <div class="chart-container">
                            <canvas id="dailyChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Logout Button -->
        <div class="mt-4 text-center">
            <a href="<?= base_url('/home/logout') ?>" class="btn logout-btn">Logout</a>
        </div>
    </div>

    <!-- Chart.js Initialization -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Fetching data from the backend (dummy data used for example)
            let weeklyData = [50, 75, 100, 125, 50, 90, 110];
            let monthlyData = [400, 450, 350, 600, 300, 500, 550];
            let dailyData = [15, 35, 45, 25, 40, 30, 20];

            // Display Weekly, Monthly, and Daily spent
            document.getElementById('weekly-spent').innerText = weeklyData.reduce((a, b) => a + b, 0);
            document.getElementById('monthly-spent').innerText = monthlyData.reduce((a, b) => a + b, 0);
            document.getElementById('daily-spent').innerText = dailyData.reduce((a, b) => a + b, 0);

            // Weekly Chart
            new Chart(document.getElementById('weeklyChart'), {
                type: 'line',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Weekly Spending ($)',
                        data: weeklyData,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 2,
                        tension: 0.4
                    }]
                }
            });

            // Monthly Chart
            new Chart(document.getElementById('monthlyChart'), {
                type: 'bar',
                data: {
                    labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6', 'Week 7'],
                    datasets: [{
                        label: 'Monthly Spending ($)',
                        data: monthlyData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2
                    }]
                }
            });

            // Daywise Chart
            new Chart(document.getElementById('dailyChart'), {
                type: 'pie',
                data: {
                    labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
                    datasets: [{
                        label: 'Daywise Spending ($)',
                        data: dailyData,
                        backgroundColor: ['#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF', '#FF9F40', '#C9CBCF']
                    }]
                }
            });
        });
    </script>
</body>

</html>