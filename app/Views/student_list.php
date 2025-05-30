<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Student List</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa;
      padding-top: 80px;
    }

    .navbar {
      background-color: #343a40;
    }

    .navbar-nav .nav-link {
      color: #f8f9fa !important;
      font-weight: 600;
      padding: 14px 20px;
      transition: background-color 0.3s ease, color 0.3s ease;
    }

    .navbar-nav .nav-link:hover {
      background-color: #495057 !important;
      color: #fff !important;
    }

    .navbar-nav .nav-item .btn-danger {
      margin-left: 12px;
    }

    h2 {
      margin-top: 30px;
      margin-bottom: 25px;
      font-weight: 700;
      color: #212529;
      text-align: center;
    }

    /* Flash message animations */
    .flash-message {
      border-radius: 0.375rem;
      padding: 12px 20px;
      margin-bottom: 25px;
      font-weight: 600;
      text-align: center;
      opacity: 0;
      animation: fadeInDown 0.8s forwards;
    }

    .flash-success {
      background-color: #d1e7dd;
      color: #0f5132;
      border: 1px solid #badbcc;
    }

    .flash-error {
      background-color: #f8d7da;
      color: #842029;
      border: 1px solid #f5c2c7;
    }

    @keyframes fadeInDown {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    table {
      background: white;
      border-radius: 0.375rem;
      box-shadow: 0 4px 10px rgb(0 0 0 / 0.05);
      overflow: hidden;
      animation: fadeInUp 0.8s ease forwards;
      opacity: 0;
      transform: translateY(30px);
      width: 100%;
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    thead th {
      background-color: #198754;
      color: white;
      font-weight: 700;
      text-align: left;
      padding: 14px 18px;
    }

    tbody td {
      padding: 12px 18px;
      vertical-align: middle;
    }

    tbody tr:hover {
      background-color: #e9f7ef;
      transition: background-color 0.3s ease;
    }

    .btn-action {
      padding: 6px 14px;
      font-weight: 600;
      border-radius: 0.375rem;
      transition: transform 0.2s ease, box-shadow 0.3s ease;
      user-select: none;
      display: inline-block;
      text-decoration: none;
    }

    .btn-action:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 12px rgba(25, 135, 84, 0.3);
      text-decoration: none;
    }

    .btn-edit {
      background-color: #198754;
      color: white;
      border: none;
    }

    .btn-edit:hover {
      background-color: #146c43;
      color: white;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
      border: none;
      margin-left: 6px;
    }

    .btn-delete:hover {
      background-color: #a71d2a;
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

  <!-- Flash messages -->
  <div class="container">
    <?php if(session()->getFlashdata('message')): ?>
      <div class="flash-message flash-success">
        <?= session()->getFlashdata('message') ?>
      </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
      <div class="flash-message flash-error">
        <?= session()->getFlashdata('error') ?>
      </div>
    <?php endif; ?>

    <h2>Student List (Enrolled Only)</h2>

    <table class="table mb-5">
      <thead>
        <tr>
          <th>ID Number</th>
          <th>Full Name</th>
          <th>Course</th>
          <th>Year</th>
          <th>Section</th>
          <th style="width: 160px;">Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($students) && is_array($students)) : ?>
          <?php foreach ($students as $student) : ?>
            <tr>
              <td><?= esc($student['id_number']) ?></td>
              <td><?= esc($student['full_name']) ?></td>
              <td><?= esc($student['course']) ?></td>
              <td><?= esc($student['year']) ?></td>
              <td><?= esc($student['section']) ?></td>
              <td>
                <a href="/student/edit/<?= $student['id'] ?>" class="btn-action btn-edit">Edit</a>
                <a href="/student/delete/<?= $student['id'] ?>" class="btn-action btn-delete"
                  onclick="return confirm('Are you sure you want to delete this student?');">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="6" class="text-center fst-italic text-muted">No enrolled students found.</td>
          </tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
