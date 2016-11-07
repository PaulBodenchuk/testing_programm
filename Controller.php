<?php
session_start();

include('business_logic.php');

theme_choose ();
init_questions();

//Add
if (isset($_POST['action']) AND $_POST['action'] == 'Add_question'){
    if (isset($_POST["question"]) and $_POST["question"] != ''
        and isset($_POST["answer1"]) and $_POST["answer1"] != ''
        and isset($_POST["answer2"]) and $_POST["answer2"] != ''
        and isset($_POST["answer3"]) and $_POST["answer3"] != ''
        and isset($_POST["answer4"]) and $_POST["answer4"] != ''
        and isset($_POST['chosen_answer']) and $_POST['chosen_answer'] != ''){

        add_question();
    } else{
        echo "<script>alert('Проверте правильность заполнения данных!')</script>";
    }
}

//show all
function show_quests (){
    get_all_questions();
}

// delete
if (isset($_POST['action']) AND $_POST['action'] == 'Del') {
    delete_question();
}

// Edit
if (isset($_POST['action']) AND $_POST['action'] == 'Edit') {
    $question = edit_question();
}

// Edit Confirm
if (isset($_POST['action']) AND $_POST['action'] == 'Confirm_Edit'){

    if (isset($_SESSION['edit_quest_id'])) {
        if (isset($_POST["question"]) and $_POST["question"] != ''
            and isset($_POST["answer1"]) and $_POST["answer1"] != ''
            and isset($_POST["answer2"]) and $_POST["answer2"] != ''
            and isset($_POST["answer3"]) and $_POST["answer3"] != ''
            and isset($_POST["answer4"]) and $_POST["answer4"] != ''
            and isset($_POST['chosen_answer']) and $_POST['chosen_answer'] != ''){
            confirm_edit_question();
        } else{
            echo "<script>alert('Проверте правильность заполнения данных!')</script>";
        }
    } else {
        echo "<script>alert('Не выбран вопрос для редактирования!')</script>";
    }


}

// Cancel
if (isset($_POST['action']) AND $_POST['action'] == 'Cancel') {
    clear_form();
}


include('view.php');

