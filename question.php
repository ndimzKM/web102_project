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
</head>

<body>
    <nav>
        <div class="nav-container">
            <div class="logo">
                <span>bantaba</span>
            </div>
            <form>
                <i class="bx bx-search"></i>
                <input type="text" placeholder="Search a question" name="question" />
            </form>
            <div class="actions">
                <div class="avatar">
                    <i class="bx bx-user"></i>
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
                    <a href="#">How to fix docker: Got permission while trying to connect to the Docker daemon socket.</a>
                </h3>
                <div class="question-info">
                    <span>1 answer</span>
                    <i class='bx bxs-circle'></i>
                    <span>5 days ago</span>
                    <i class='bx bxs-circle'></i>
                    <span>By green2get</span>
                </div>
                <div class="tags">
                    <span>HTML</span>
                    <span>CSS</span>
                    <span>JS</span>
                    <span>Web</span>
                </div>
            </div>
            <form class="new-question">
                <h3>Add an answer</h3>
                <textarea rows="10"></textarea><br />
                <button type="submit">Submit</button>
            </form>
            <div class="answers">
                <div class="profile">
                    <div class="avatar">
                        <i class="bx bx-user"></i>
                    </div>
                    <span>Ousman James</span>
                    <i class="bx bxs-circle"></i>
                    <span>22 July, 2022</span>
                </div>
                <p>This is going to be a very long text that might span across some stuff.This is going to be a very long text that might span across some stuff.This is going to be a very long text that might span across some stuff.This is going to be a very long text that might span across some stuff.This is going to be a very long text that might span across some stuff.</p>
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