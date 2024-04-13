<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Login</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #ffcc00; /* Yellow background */
            color: #333; /* Dark text color */
            font-family: Arial, sans-serif; /* Use professional font */
        }
        .container {
            margin-top: 100px;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #ff4d4d; /* Red background */
            color: #fff; /* White text color */
            font-weight: bold;
        }
        .form-control {
            border-radius: 5px;
        }
        .btn-custom {
            background-color: #333;
            color: #ffcc00;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Student Login</h2>
                </div>
                <div class="card-body">
                    <form action="student_login_process.php" method="POST">
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-custom btn-block">Login</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <p>Not a student? <a href="index.html">Back to Home</a></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap JS and dependencies (not required for this page) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
