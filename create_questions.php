<?php include('config.php'); ?>
<?php include("includes/question_function.php"); ?>
<?php include(ROOT_PATH . './includes/question_function.php') ?>


<!-- Get all topics -->

<title>Question | Create </title>
</head>

<body id="">
    <!-- admin navbar -->

    <div class="container content">

        <p><?php echo $test; ?></p><br />

        <!-- Left side menu -->

        <!-- Middle form - to create and edit  -->
        <div class="action create-post-div">
            <h1 class="page-title">Create/Edit Post</h1>
            <form method="post" class="new-question" action="<?php echo BASE_URL . '/create_questions.php'; ?>">
                <!-- validation errors for the form -->
                <?php include(ROOT_PATH . './includes/errors.php') ?>

                <!-- if editing post, the id is required to identify that post -->
                <h3>Add an answer</h3>
                <textarea name="question" id="question" cols="30" rows="10"><?php echo $question; ?></textarea><br />
                <button type="submit" name="create_post">>Submit</button>
            </form>




        </div>
        <!-- // Middle form - to create and edit -->
    </div>
</body>

</html>

<!-- <script>
    CKEDITOR.replace('body');
</script> -->