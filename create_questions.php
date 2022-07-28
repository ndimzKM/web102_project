<?php include('config.php'); ?>
<?php include("includes/question_function.php"); ?>


<!-- Get all topics -->

<title>Question | Create </title>
</head>

<body id="">
    <!-- admin navbar -->

    <div class="container content">

        <p><?php echo $test; ?></p><br />

        <!-- Left side menu -->
        <h1> <?php echo $_SESSION['user']['id']; ?>
            <h1 />

            <!-- Middle form - to create and edit  -->
            <div class="action create-post-div">
                <h1 class="page-title">Create/Edit Post</h1>
                <form method="post" class="new-question" action="<?php echo 'create_questions.php'; ?>">
                    <!-- validation errors for the form -->
                    <?php include('./includes/errors.php') ?>

                    <!-- if editing post, the id is required to identify that post -->
                    <h3>Add an answer</h3>
                    <textarea id="question" cols="30" rows="10" name="question"><?php echo $question; ?></textarea><br />
                    <input value="<?php echo $_SESSION['user']['id'] ?>" name="userID" id="userID" type="hidden" />
                    <button type="submit" name="create_post">Submit</button>
                </form>




            </div>
            <!-- // Middle form - to create and edit -->
    </div>
</body>

</html>