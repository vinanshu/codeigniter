<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 70px; /* space for fixed navbar */
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .photo {
            width: 50px;
            height: auto;
            border-radius: 8px;
        }
        main {
            max-width: 1200px;
            margin: auto;
        }
        h2 {
            margin-bottom: 30px;
            font-weight: 700;
        }
        .btn-toggle {
            margin-bottom: 15px;
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
        <li class="nav-item"><a class="nav-link" href="/report">Report</a></li>
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
    <h2>Welcome, <?= esc(session('username')) ?></h2>

    <!-- Toggle Buttons -->
    <button class="btn btn-primary btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#pending-section" aria-expanded="false" aria-controls="pending-section">
        Pending Students
    </button>
    <button class="btn btn-success btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#enrolled-section" aria-expanded="false" aria-controls="enrolled-section">
        Enrolled Students
    </button>
    <button class="btn btn-warning btn-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#dropped-section" aria-expanded="false" aria-controls="dropped-section">
        Dropped Students
    </button>

    <!-- Pending Students -->
    <div class="collapse" id="pending-section">
        <h3 class="mt-4">Pending Students</h3>
        <?php if (!empty($pending)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID Number</th>
                            <th>Full Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Photo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pending as $student): ?>
                        <tr>
                            <td><?= esc($student['id_number']) ?></td>
                            <td><?= esc($student['full_name']) ?></td>
                            <td><?= esc($student['age']) ?></td>
                            <td><?= esc($student['phone']) ?></td>
                            <td><?= esc($student['address']) ?></td>
                            <td><?= esc($student['course']) ?></td>
                            <td><?= esc($student['year']) ?></td>
                            <td><?= esc($student['section']) ?></td>
                            <td><img src="/uploads/<?= esc($student['photo']) ?>" alt="Photo" class="photo" /></td>
                            <td><span class="badge bg-primary">Pending</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No pending students.</p>
        <?php endif; ?>
    </div>

    <!-- Enrolled Students -->
    <div class="collapse" id="enrolled-section">
        <h3 class="mt-4">Enrolled Students</h3>
        <?php if (!empty($enrolled)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID Number</th>
                            <th>Full Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Photo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($enrolled as $student): ?>
                        <tr>
                            <td><?= esc($student['id_number']) ?></td>
                            <td><?= esc($student['full_name']) ?></td>
                            <td><?= esc($student['age']) ?></td>
                            <td><?= esc($student['phone']) ?></td>
                            <td><?= esc($student['address']) ?></td>
                            <td><?= esc($student['course']) ?></td>
                            <td><?= esc($student['year']) ?></td>
                            <td><?= esc($student['section']) ?></td>
                            <td><img src="/uploads/<?= esc($student['photo']) ?>" alt="Photo" class="photo" /></td>
                            <td><span class="badge bg-success">Enrolled</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No enrolled students.</p>
        <?php endif; ?>
    </div>

    <!-- Dropped Students -->
    <div class="collapse" id="dropped-section">
        <h3 class="mt-4">Dropped Students</h3>
        <?php if (!empty($dropped)): ?>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>ID Number</th>
                            <th>Full Name</th>
                            <th>Age</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Course</th>
                            <th>Year</th>
                            <th>Section</th>
                            <th>Photo</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($dropped as $student): ?>
                        <tr>
                            <td><?= esc($student['id_number']) ?></td>
                            <td><?= esc($student['full_name']) ?></td>
                            <td><?= esc($student['age']) ?></td>
                            <td><?= esc($student['phone']) ?></td>
                            <td><?= esc($student['address']) ?></td>
                            <td><?= esc($student['course']) ?></td>
                            <td><?= esc($student['year']) ?></td>
                            <td><?= esc($student['section']) ?></td>
                            <td><img src="/uploads/<?= esc($student['photo']) ?>" alt="Photo" class="photo" /></td>
                            <td><span class="badge bg-warning text-dark">Dropped</span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p>No dropped students.</p>
        <?php endif; ?>
    </div>

</main>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

