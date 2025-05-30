<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        /* Same styles as before - you can move to a common CSS */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        nav {
            background-color: #333;
            overflow: hidden;
        }
        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 20px;
            text-decoration: none;
            font-weight: bold;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .logout {
            float: right;
            background-color: #e74c3c;
            color: white !important;
            font-weight: normal;
        }
        .logout:hover {
            background-color: #c0392b;
            color: white !important;
        }
        form {
            max-width: 600px;
            margin-top: 20px;
            background: #f9f9f9;
            padding: 20px;
            border-radius: 6px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
        }
        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 18px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<nav>
    <a href="/dashboard">Dashboard</a>
    <a href="/register">Register</a>
    <a href="/student">Student</a>
    <a href="/enrollment">Enrollment</a>
    <a href="/report">Report</a>
    <a href="/login/logout" class="logout">Logout</a>
</nav>

<main>
    <h2>Edit Student Information</h2>

    <form action="/student/update/<?= $student['id'] ?>" method="post">
        <?= csrf_field() ?> <!-- CSRF protection -->

        <label for="id_number">ID Number:</label>
        <input type="text" id="id_number" name="id_number" value="<?= esc($student['id_number']) ?>" required>

        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" value="<?= esc($student['full_name']) ?>" required>

        <label for="course">Course:</label>
        <select name="course" id="course" required>
            <option value="BSIT" <?= $student['course'] == 'BSIT' ? 'selected' : '' ?>>BSIT</option>
            <option value="BSTCM" <?= $student['course'] == 'BSTCM' ? 'selected' : '' ?>>BSTCM</option>
            <option value="BSEMT" <?= $student['course'] == 'BSEMT' ? 'selected' : '' ?>>BSEMT</option>
        </select>

        <label for="year">Year:</label>
        <select name="year" id="year" required>
            <option value="1st" <?= $student['year'] == '1st' ? 'selected' : '' ?>>1st</option>
            <option value="2nd" <?= $student['year'] == '2nd' ? 'selected' : '' ?>>2nd</option>
            <option value="3rd" <?= $student['year'] == '3rd' ? 'selected' : '' ?>>3rd</option>
            <option value="4th" <?= $student['year'] == '4th' ? 'selected' : '' ?>>4th</option>
        </select>

        <label for="section">Section:</label>
        <select name="section" id="section" required>
            <option value="A" <?= $student['section'] == 'A' ? 'selected' : '' ?>>A</option>
            <option value="B" <?= $student['section'] == 'B' ? 'selected' : '' ?>>B</option>
            <option value="C" <?= $student['section'] == 'C' ? 'selected' : '' ?>>C</option>
            <option value="D" <?= $student['section'] == 'D' ? 'selected' : '' ?>>D</option>
            <option value="E" <?= $student['section'] == 'E' ? 'selected' : '' ?>>E</option>
        </select>

        <button type="submit">Update Student</button>
    </form>
</main>

</body>
</html>
