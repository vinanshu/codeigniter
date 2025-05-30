<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #667eea, #764ba2);
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
    }

    .login-card {
      background: white;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.2);
      width: 100%;
      max-width: 380px;
      animation: fadeInUp 0.8s ease forwards;
      opacity: 0;
      transform: translateY(30px);
    }

    @keyframes fadeInUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h2 {
      text-align: center;
      margin-bottom: 30px;
      font-weight: 700;
      color: #343a40;
    }

    label {
      font-weight: 600;
      color: #495057;
    }

    .form-control {
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 1rem;
      box-shadow: none;
      border: 1.5px solid #ced4da;
      transition: border-color 0.3s ease;
    }

    .form-control:focus {
      border-color: #667eea;
      box-shadow: 0 0 8px rgba(102, 126, 234, 0.5);
      outline: none;
    }

    .btn-primary {
      width: 100%;
      padding: 12px;
      font-weight: 600;
      font-size: 1.1rem;
      border-radius: 8px;
      position: relative;
      overflow: hidden;
    }

    /* Spinner styles */
    .spinner-border {
      width: 1.3rem;
      height: 1.3rem;
      border-width: 0.15em;
      vertical-align: middle;
      margin-left: 8px;
      display: none;
    }

    .btn-loading .spinner-border {
      display: inline-block;
    }

    .btn-loading .btn-text {
      visibility: hidden;
    }

    /* Flash message style */
    .flash-error {
      background-color: #f8d7da;
      color: #842029;
      border: 1px solid #f5c2c7;
      padding: 12px 15px;
      border-radius: 6px;
      margin-bottom: 20px;
      font-weight: 600;
      text-align: center;
    }
  </style>
</head>
<body>

  <div class="login-card">
    <h2>Login</h2>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="flash-error"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <form action="/login/auth" method="post" id="loginForm" novalidate>
      <div class="mb-3">
        <label for="username" class="form-label">Username</label>
        <input id="username" type="text" name="username" class="form-control" required autofocus />
      </div>

      <div class="mb-4">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" name="password" class="form-control" required />
      </div>

      <button type="submit" class="btn btn-primary" id="submitBtn">
        <span class="btn-text">Login</span>
        <div class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></div>
      </button>
    </form>
  </div>

  <!-- Bootstrap JS Bundle -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    const form = document.getElementById('loginForm');
    const submitBtn = document.getElementById('submitBtn');

    form.addEventListener('submit', function () {
      submitBtn.classList.add('btn-loading');
      // Optionally disable button to prevent multiple submits
      submitBtn.disabled = true;
    });
  </script>

</body>
</html>
