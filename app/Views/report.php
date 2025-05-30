<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Report</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 70px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        main {
            max-width: 900px;
            margin: auto;
        }
        h2 {
            margin-bottom: 30px;
            font-weight: 700;
        }
        canvas {
            margin-top: 20px;
        }
        table th {
            background-color: #0d6efd;
            color: white;
        }
    </style>
</head>
<body>

 <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
        <li class="nav-item"><a class="nav-link" href="/student">Student</a></li>
        <li class="nav-item"><a class="nav-link" href="/enrollment">Enrollment</a></li>
        <li class="nav-item"><a class="nav-link active" href="/report">Report</a></li>
      </ul>
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="/login/logout" class="btn btn-danger">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<main class="container mt-4">
    <h2 class="text-center">Student Report Overview</h2>

    <div class="mb-5">
        <h4>Enrolled Students by Course</h4>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr><th>Course</th><th>Enrolled Count</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($courseCounts as $course => $count): ?>
                        <tr><td><?= esc($course) ?></td><td><?= esc($count) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-5">
        <h4>Enrolled Students by Year</h4>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr><th>Year</th><th>Enrolled Count</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($yearCounts as $year => $count): ?>
                        <tr><td><?= esc($year) ?></td><td><?= esc($count) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-5">
        <h4>Enrolled Students by Section</h4>
        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead>
                    <tr><th>Section</th><th>Enrolled Count</th></tr>
                </thead>
                <tbody>
                    <?php foreach ($sectionCounts as $section => $count): ?>
                        <tr><td><?= esc($section) ?></td><td><?= esc($count) ?></td></tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mb-5">
        <h4>Enrollment Status Pie Chart</h4>
        <canvas id="enrollmentPieChart"></canvas>
    </div>
</main>

<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('enrollmentPieChart').getContext('2d');
    const enrollmentPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Enrolled', 'Pending', 'Dropped'],
            datasets: [{
                label: 'Enrollment Status',
                data: [
                    <?= esc($enrolledCount) ?>,
                    <?= esc($pendingCount) ?>,
                    <?= esc($droppedCount) ?>
                ],
                backgroundColor: [
                    'rgba(0, 128, 0, 0.7)',     // Enrolled = Green
                    'rgba(128, 128, 128, 0.7)', // Pending = Grey
                    'rgba(255, 0, 0, 0.7)'      // Dropped = Red
                ],
                borderColor: [
                    'rgba(0, 128, 0, 1)',
                    'rgba(128, 128, 128, 1)',
                    'rgba(255, 0, 0, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
