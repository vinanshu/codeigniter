<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Enrollment Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 70px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .status-btn {
            padding: 5px 10px;
            margin-right: 5px;
            border: none;
            cursor: pointer;
            color: white;
            border-radius: 3px;
        }
        .Pending {
            background-color: gray;
        }
        .Enrolled {
            background-color: green;
        }
        .Dropped {
            background-color: red;
        }
        .message {
            margin-bottom: 10px;
            padding: 10px;
            border-radius: 4px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
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
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="/enrollment">Enrollment</a></li>
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
    <h2>Enrollment Management</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="message success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="message error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <div class="table-responsive mt-3">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-light">
                <tr>
                    <th>ID Number</th>
                    <th>Full Name</th>
                    <th>Course</th>
                    <th>Year</th>
                    <th>Section</th>
                    <th>Enrollment Status</th>
                    <th>Change Status</th>
                </tr>
            </thead>
            <tbody>
                <?php if(!empty($students) && is_array($students)): ?>
                    <?php foreach($students as $student): ?>
                        <tr>
                            <td><?= esc($student['id_number']) ?></td>
                            <td><?= esc($student['full_name']) ?></td>
                            <td><?= esc($student['course']) ?></td>
                            <td><?= esc($student['year']) ?></td>
                            <td><?= esc($student['section']) ?></td>
                            <td>
                                <span class="badge <?= match($student['enrollment_status']) {
                                    'Pending' => 'bg-secondary',
                                    'Enrolled' => 'bg-success',
                                    'Dropped' => 'bg-danger',
                                    default => 'bg-light text-dark'
                                } ?>">
                                    <?= esc($student['enrollment_status']) ?>
                                </span>
                            </td>
                            <td>
                                <form action="/enrollment/updateStatus/<?= $student['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="status" value="Pending">
                                    <button class="btn btn-sm btn-secondary" type="submit">Pending</button>
                                </form>
                                <form action="/enrollment/updateStatus/<?= $student['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="status" value="Enrolled">
                                    <button class="btn btn-sm btn-success" type="submit">Enrolled</button>
                                </form>
                                <form action="/enrollment/updateStatus/<?= $student['id'] ?>" method="post" class="d-inline">
                                    <?= csrf_field() ?>
                                    <input type="hidden" name="status" value="Dropped">
                                    <button class="btn btn-sm btn-danger" type="submit">Dropped</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr><td colspan="7" class="text-center">No students found.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
