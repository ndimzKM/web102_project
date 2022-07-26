<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latest Questions | Bantaba</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styles.css">
    <?php include('config.php'); ?>
    <?php include("includes/question_function.php"); ?>
    <?php $question = getQuestion(); $answers = getAnswers($question); ?>
</head>

<body>
        <nav>
        <div class="nav-container">
            <div class="logo">
                <span>bantaba</span>
            </div>
            <div class="actions">
                <div class="avatar user">
                    <i class="bx bx-user"></i>
                </div>
                <div style="margin-left: 4px;">
                    <?php if (isset($_SESSION['user']['username'])) { ?>
                        <div class="logged_in_info">
                            <span>Welcome: <?php echo $_SESSION['user']['name'] ?></span>
                            |
                            <span><a href="logout.php">logout</a></span>
                        </div>
                    <?php } else { ?>
                        <div class="banner">
                            <a href="login.php">login</a>

                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </nav>
    <main>
        <section class="side-nav">
            <ul>
                <li class="active">
                    <a href="/">
                        <i class="bx bx-home"></i>
                        <span>Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bx bx-compass"></i>
                        <span>Explore Topics</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bx bx-news"></i>
                        <span>My Topics</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bx bx-help-circle"></i>
                        <span>My Answers</span>
                    </a>
                </li>
            </ul>
        </section>
        <section class="questions">
            <div class="top">
                <h2>All Questions</h2>
                <a class="ask-question" href="#">Ask a question</a>
            </div>
            <div class="question">
                <h3>
                    <?php
                        $title = $question['question'];
                        $time = $question['createdAt'];
                        $user = $question['author'];
                        $qid = $question['id'];
                        $count = $question['answers'];
                        echo "<a href='#'>$title</a>"
                    ?>
                </h3>
                <div class="question-info">
                    <?php echo "<span>$count answers</span>"; ?>
                    <i class='bx bxs-circle'></i>
                    <?php echo "<span>By $time</span>"; ?>
                    <i class='bx bxs-circle'></i>
                    <?php echo "<span>By $user</span>"; ?>
                </div>
                <div class="tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                    <span>Web</span>
                </div>
            </div>
            <form class="new-question" action="create_questions.php" method="POST">
                <h3>Add an answer</h3>
                <textarea name="answer" rows="10"></textarea><br />
            <input type="hidden" name="questionID" value="<?php echo $qid; ?>"
                <?php if (isset($_SESSION['user']['id'])) { ?>
                    <input value="<?php echo $_SESSION['user']['id'] ?>" name="userID" id="userID" type="hidden" />

                <?php }  ?>
                <button type="submit" name="create_answer">Submit</button>
            </form>
            <div class="answers">
                <?php
                    $text = $answers['answer']; 
                    $time = $answers['createdAt'];
                    $author = $answers['author'];
                ?>
                <div class="answer">
                    <div class="profile">
                        <div class="avatar">
                            <i class="bx bx-user"></i>
                        </div>
                        <span><?php echo $author; ?></span>
                        <i class="bx bxs-circle"></i>
                        <span><?php echo $time; ?></span>
                    </div>
                    <p><?php echo $text; ?></p>
                </div> 
            </div>
            <form class="popup" method="post" action="<?php echo 'create_questions.php'; ?>">

                <h3>Add question</h3>
                <div class="profile">
                    <div class="avatar">
                        <i class="bx bx-user"></i>
                    </div>
                    <span>Ousman James djfkfkfkffk</span>
                    <p> test <?php echo $_SESSION['user']['id'] ?></p>

                </div>
                <textarea rows="10" name="question" id="question"></textarea>
                <div class="add-tags">
                    <h4>Add tags separated by commas</h4>
                    <input type="text" placeholder="html,css,js" />
                </div>

                <?php if (isset($_SESSION['user']['id'])) { ?>
                    <input value="<?php echo $_SESSION['user']['id'] ?>" name="userID" id="userID" type="hidden" />

                <?php }  ?>
                <button type="submit" name="create_post">Submit</button>
            </form>
        </section>
    </main>
    <section class="overlay"></section>
    <script>
        const popup = document.querySelector('.popup');
        const askQuestion = document.querySelector('.ask-question');
        const body = document.querySelector('body');
        const overlay = document.querySelector('.overlay');

        overlay.addEventListener('click', e => {
            popup.className = 'popup';
            overlay.style.display = 'none'
        })

        overlay.style.display = 'none'

        const togglePopup = e => {
            if (popup.classList.length == 1) {
                popup.classList.add('show');
                overlay.style.display = 'block'
                console.log(overlay.style.display)
            } else {
                popup.className = 'popup'
                body.className = 'no-backdrop'
                overlay.style.display = 'none'
            }

        }

        askQuestion.addEventListener('click', togglePopup);
    </script>
</body>

</html>
