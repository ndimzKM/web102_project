<?php include('config.php'); ?>
<!-- Source code for handling registration and login -->
<?php include('./includes/registration_login.php'); ?>



<title>LifeBlog | Sign up </title>
</head>

<body>
    <div class="container">
        <!-- Navbar -->

        <!-- // Navbar -->

        <div style="width: 40%; margin: 20px auto;">
            <form method="post" action="register.php">
                <h2>Register on Bantaba</h2>

                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                <input type="email" name="email" value="<?php echo $email ?>" placeholder="Email">
                <input type="text" name="name" value="<?php echo $name ?>" placeholder="name">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" class="btn" name="reg_user">Register</button>
                <p>
                    Already a member? <a href="login.php">Sign in</a>
                </p>
            </form>
        </div>
    </div>
    <!-- // container -->
    <!-- Footer -->

    <!-- // Footer -->