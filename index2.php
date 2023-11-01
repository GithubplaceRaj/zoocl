<?php
$serverName = "csit805server.database.windows.net";
$connectionOptions = array(
    "Database" => "zoo_db",
    "Uid" => "admin123", // Replace 'admin123' with your actual username
    "PWD" => "?s)&+sn5f5P4_8i123" // Replace with your actual password
);

// Establish the connection
$con = sqlsrv_connect($serverName, $connectionOptions);

if (!$conn) {
    die(print_r(sqlsrv_errors(), true));
}

// Handle user login (e.g., with POST data)
$username = $_POST['username'];
$password = $_POST['password'];

// Perform the SQL query to check if the user exists and credentials are correct
$sql = "SELECT * FROM users WHERE username = ? AND password = ?";
$params = array($username, $password);
$query = sqlsrv_query($conn, $sql, $params);

if ($query === false) {
    die(print_r(sqlsrv_errors(), true));
}

if (sqlsrv_has_rows($query)) {
    // User is authenticated, redirect to dashboard.php
    header("Location: dashboard.php");
    exit(); // Make sure to exit after the redirection
} else {
    // User authentication failed, you can display an error message
    echo "Invalid username or password.";
}

// Close the connection
sqlsrv_close($conn);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - Zoo Management System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="favicon.ico">
    <link rel="stylesheet" href="min.css">
    <link rel="stylesheet" href="font-awesome.min.css">
    <link rel="stylesheet" href="themify-icons.css">
    <link rel="stylesheet" href="metisMenu.css">
    <link rel="stylesheet" href="owl.carousel.min.css">
    <link rel="stylesheet" href="slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="typography.css">
    <link rel="stylesheet" href="default-css.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="responsive.css">
    <!-- modernizr css -->
    <script src="modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="#" method="post" name="login">
                  
                    <div class="login-form-head">
                        <h4>Zoo Management System</h4>
                        <p>Hello there, Sign in and start managing your Admin Template</p>
                    </div>
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="exampleInputEmail1">User Name</label>
                            <input type="text" id="username" name="username" required="true">
                            <i class="ti-user"></i>
                        </div>
                        <div class="form-gp">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" id="password" name="password" required="true">
                            <i class="ti-lock"></i>
                        </div>
                        <div class="row mb-4 rmber-area">
                            <div class="col-6">
                                
                            </div>
                            <div class="col-6 text-right">
                                <a href="forgot-password.php">Forgot Password?</a>
                            </div>
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" name="login">Submit <i class="ti-arrow-right"></i></button>
                            
                        </div>
                        <div style="padding-top: 20px">
                                <a href="../index1.php">Back Home!!</a>
                            </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->

    <!-- jquery latest version -->
    <script src="jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="popper.min.js"></script>
    <script src="bootstrap.min.js"></script>
    <script src="owl.carousel.min.js"></script>
    <script src="metisMenu.min.js"></script>
    <script src="jquery.slimscroll.min.js"></script>
    <script src="jquery.slicknav.min.js"></script>
    
    <!-- others plugins -->
    <script src="plugins.js"></script>
    <script src="scripts.js"></script>
</body>

</html>