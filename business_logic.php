<?php

function theme_choose (){
    if (isset($_GET['theme_name'])){
        $theme_name = $_GET['theme_name'];
        $file_name = $theme_name.".txt";
        $_SESSION['file_name'] = $file_name;
    }
}

function init_questions(){
    if (isset($_SESSION['file_name']) and $_SESSION['file_name'] != ''){
        $fileName = $_SESSION['file_name'];
    }

    if (is_readable($fileName)){
        $ser_arr = file_get_contents($fileName);
        $arr_questions = unserialize($ser_arr);
        $_SESSION['$arr_questions'] = $arr_questions;
    } else {
        $_SESSION['$arr_questions'] = array();
    }

}

function add_question (){
    if (isset($_SESSION['file_name']) and $_SESSION['file_name'] != ''){
        $fileName = $_SESSION['file_name'];
    }
    if ($_POST['action'] == 'Add_question'){
        $arr_questions = $_SESSION['$arr_questions'];
        $answers = array();
        for ($i = 1; $i <= 4; $i++){

            if ($_POST['chosen_answer'] == $i){
                $is_correct = 'yes';
            } else {
                $is_correct = 'no';
            }
            $answers[] = array('answer' => $_POST["answer{$i}"], 'is_correct' => $is_correct);
        }

        $question = array(
            'name' => $_POST['question'],
            'answers' => $answers
        );

        $arr_questions[] = $question;
        $_SESSION['$arr_questions'][] = $question;
        $ser_arr = serialize($arr_questions);
        file_put_contents($fileName,$ser_arr);
    }
}

function delete_question (){
    if (isset($_SESSION['file_name']) and $_SESSION['file_name'] != ''){
        $fileName = $_SESSION['file_name'];
    }
    if (array_key_exists('$arr_questions', $_SESSION)){
        $arr_questions = $_SESSION['$arr_questions'];

        unset($arr_questions[$_POST['id']]);
        $_SESSION['$arr_questions'] = $arr_questions;
        $ser_arr = serialize($arr_questions);
        file_put_contents($fileName,$ser_arr);
    }
}

function edit_question (){
    if (array_key_exists('$arr_questions', $_SESSION)){
        $arr_questions = $_SESSION['$arr_questions'];
        $question = $arr_questions[$_POST['id']];
        $_SESSION['edit_quest_id'] = $_POST['id'];
        return $question;
    }
}

function confirm_edit_question(){
    if (isset($_SESSION['file_name']) and $_SESSION['file_name'] != ''){
        $fileName = $_SESSION['file_name'];
    }
    if (array_key_exists('$arr_questions', $_SESSION)){
        $arr_questions = $_SESSION['$arr_questions'];

        $answers = array();
        for ($i = 1; $i <= 4; $i++){
            if ($_POST['chosen_answer'] == $i){
                $is_correct = 'yes';
            } else {
                $is_correct = 'no';
            }
            $answers[] = array('answer' => $_POST["answer{$i}"], 'is_correct' => $is_correct);
        }

        $question = array(
            'name' => $_POST['question'],
            'answers' => $answers
        );
        $arr_questions[$_SESSION['edit_quest_id']] = $question;
        unset($_SESSION['edit_quest_id']);
        $_SESSION['$arr_questions'] = $arr_questions;
        $ser_arr = serialize($arr_questions);
        file_put_contents($fileName,$ser_arr);
    }
}

function get_all_questions(){
    if (array_key_exists('$arr_questions', $_SESSION)){
        $arr_questions = $_SESSION['$arr_questions'];

        if (isset($arr_questions) and $arr_questions) {

            foreach ($arr_questions as $key => $question){
                print_quest($question, $key);
            }
        }
    }
}

function print_quest ($question, $index){
    echo "<form method=\"post\">";
        echo "<b><div>{$question['name']}:</b><br>";
        echo "<input type=\"submit\" name=\"action\" class=\"col-md-1 btn btn-xs\" value=\"Del\">";
        echo "<input type=\"submit\" name=\"action\" class=\"col-md-1 btn btn-xs\" value=\"Edit\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"{$index}\"></div><br><br>";
        foreach ($question['answers'] as $index => $answer){
            $is_checked = "";
            if (isset($question) and $question['answers'][$index]['is_correct'] == 'yes'){
                $is_checked = 'checked';
            }
            echo "<div class=\"row\">                
                <input type=\"radio\" name=\"chosen_answer\" class=\"col-md-1\" {$is_checked}>
                <div class=\"col-xs-11\">
                    {$answer['answer']}
                </div>
             </div>";
        }
        echo '<br>';
    echo "</form>";
}

function clear_form(){
    unset($_SESSION['edit_quest_id']);
}