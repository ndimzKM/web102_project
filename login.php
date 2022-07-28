<?php include('config.php'); ?>
<?php include('includes/registration_login.php'); ?>


<link rel="stylesheet" href="./css/styles.css" />
<title>Bantaba | Sign in </title>
</head>

<body>
    <div class="login">
            <form method="post" action="login.php">
                <h2>Login</h2>
                <?php include(ROOT_PATH . '/includes/errors.php') ?>
                <input type="text" name="username" value="<?php echo $username; ?>" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" class="btn" name="login_btn">Login</button>
                <p>
                    Not yet a member?<a href="register.php">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</body>
