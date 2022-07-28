<?php

$errors = array();

$question = "";


function getAllQuestions()
{
    global $conn;

    $sql = "SELECT * FROM questions";

    $result = mysqli_query($conn, $sql);
    $questions = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $final_questions = array();
    foreach ($questions as $question) {
        $question['author'] = getPostAuthorById($question['userID']);
        $question['answers'] = getAnswerCount($question['id']);
        array_push($final_questions, $question);
    }
    return $final_questions;
}
// get the author/username of a post
function getPostAuthorById($userID)
{
    $userID = (int)$userID;
    global $conn;
    $sql = "SELECT username FROM users WHERE id=$userID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        // return username
        return mysqli_fetch_assoc($result)['username'];
    } else {
        return null;
    }
}

if (isset($_POST['create_post'])) {
    createQuestion($_POST);
}

if(isset($_POST['create_answer'])) {
    createAnswer($_POST);
}

function createQuestion($request_values)
{

    global $conn, $errors, $userId, $question;
    $userId =  stripslashes($request_values['userID']);
    $question = stripslashes($request_values['question']);
    if (empty($question)) {
        array_push($errors, "Question is required");
    }

    $query = "INSERT INTO questions (userID, question, createdAt) VALUES($userId, '$question', now())";
    mysqli_query($conn, $query);

    $_SESSION['message'] = "Question created successfully";
    header('location: index.php');
    exit(0);
}

function getQuestion() {
    $questionID = $_GET['id'];
    $questionID = stripslashes($questionID);
    $questionID = htmlspecialchars($questionID);

    global $conn;
    $sql = "SELECT * FROM questions WHERE id=$questionID";
    $result = mysqli_query($conn, $sql);
    $question = mysqli_fetch_assoc($result);

    $question['author'] = getPostAuthorById($question['userID']);
    $question['answers'] = getAnswerCount($questionID);

    return $question;
}

function getAnswerCount($questionID) {
    global $conn;
    $sql = "SELECT COUNT(*) as counts FROM answers where questionID=$questionID;";

    $result = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($result);
    $count = $count['counts'];

    return $count;
}

function getAnswers($question) {
    global $conn;
    $questionID = stripslashes($_GET['id']);
    $sql = "SELECT * FROM answers where questionID=$questionID;";

    $result = mysqli_query($conn, $sql);
    $answers = mysqli_fetch_assoc($result);
    $answers['author'] = getPostAuthorById($question['userID']);

    return $answers;
}

function createAnswer($request_values) {
    global $conn, $errors, $userId, $answer;
    $userId =  $_SESSION['user']['id'];
    $answerText = stripslashes($request_values['answer']);
    $questionID = (int)stripslashes($request_values['questionID']);

    if(empty($answer)) {
        array_push($errors, "Answer is required");
    }


    $query = "INSERT INTO answers (userID, questionID, answer, createdAt) VALUES($userId, $questionID, '$answerText', now())";
    mysqli_query($conn, $query);
    header("Location: question.php?id=$questionID");

}

function esc(String $value)
{
    // bring the global db connect object into function
    global $conn;

    $val = trim($value); // remove empty space sorrounding string
    $val = mysqli_real_escape_string($conn, $value);

    return $val;
}
