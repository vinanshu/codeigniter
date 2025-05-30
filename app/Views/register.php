<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            padding-top: 70px;
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        main.container {
            max-width: 700px;
            background: white;
            padding: 30px 40px;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        h2 {
            font-weight: 700;
            margin-bottom: 30px;
            color: #212529;
            text-align: center;
        }
        .btn-primary {
            width: 100%;
            font-weight: 600;
            padding: 12px;
            font-size: 1.1rem;
        }
        .form-label {
            font-weight: 600;
            color: #495057;
        }
        .form-control, .form-select {
            box-shadow: none;
            border-radius: 6px;
            border: 1.5px solid #ced4da;
            transition: border-color 0.3s ease;
        }
        .form-control:focus, .form-select:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.3);
        }
        .alert-success, .alert-danger {
            font-weight: 600;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<!-- Navbar (Same as Dashboard) -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top shadow">
  <div class="container">
    <a class="navbar-brand" href="/dashboard">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link active" href="/register">Register</a></li>
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

<!-- Main Form Content -->
<main class="container my-5">
    <h2>Student Registration</h2>

    <?php if(session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <?php if(isset($errors)): ?>
        <div class="alert alert-danger">
            <ul class="mb-0">
                <?php foreach($errors as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="/register/save" method="post" enctype="multipart/form-data" novalidate>
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="id_number" class="form-label">ID Number</label>
            <input type="text" id="id_number" name="id_number" value="<?= old('id_number') ?>" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?= old('full_name') ?>" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="age" class="form-label">Age</label>
            <input type="number" id="age" name="age" value="<?= old('age') ?>" class="form-control" min="0" required />
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="text" id="phone" name="phone" value="<?= old('phone') ?>" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <textarea id="address" name="address" class="form-control" rows="3" required><?= old('address') ?></textarea>
        </div>

        <div class="mb-3">
            <label for="course" class="form-label">Course</label>
            <select id="course" name="course" class="form-select" required>
                <option value="" disabled <?= old('course') ? '' : 'selected' ?>>Select Course</option>
                <option value="BSIT" <?= old('course')=='BSIT' ? 'selected' : '' ?>>BSIT</option>
                <option value="BSTCM" <?= old('course')=='BSTCM' ? 'selected' : '' ?>>BSTCM</option>
                <option value="BSEMT" <?= old('course')=='BSEMT' ? 'selected' : '' ?>>BSEMT</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="year" class="form-label">Year</label>
            <select id="year" name="year" class="form-select" required>
                <option value="" disabled <?= old('year') ? '' : 'selected' ?>>Select Year</option>
                <option value="1st" <?= old('year')=='1st' ? 'selected' : '' ?>>1st</option>
                <option value="2nd" <?= old('year')=='2nd' ? 'selected' : '' ?>>2nd</option>
                <option value="3rd" <?= old('year')=='3rd' ? 'selected' : '' ?>>3rd</option>
                <option value="4th" <?= old('year')=='4th' ? 'selected' : '' ?>>4th</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="section" class="form-label">Section</label>
            <select id="section" name="section" class="form-select" required>
                <option value="" disabled <?= old('section') ? '' : 'selected' ?>>Select Section</option>
                <option value="A" <?= old('section')=='A' ? 'selected' : '' ?>>A</option>
                <option value="B" <?= old('section')=='B' ? 'selected' : '' ?>>B</option>
                <option value="C" <?= old('section')=='C' ? 'selected' : '' ?>>C</option>
                <option value="D" <?= old('section')=='D' ? 'selected' : '' ?>>D</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" id="photo" name="photo" class="form-control" accept="image/*" required />
        </div>

        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</main>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
