<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href=https://getbootstrap.com/favicon.ico">

    <title>Form Test</title>

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="https://getbootstrap.com//assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/examples/sticky-footer/sticky-footer.css" rel="stylesheet">
    <link href="style.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="https://getbootstrap.com//assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="https://getbootstrap.com//assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>

<body>
<!-- Begin page content -->
<div class="container">
    <div class="page-header">
        <h1><a href="http://localhost/testing_programm/index.php">На стартовую страницу</a></h1>
    </div>

    <div>
        <form id="input_form" method="post">
            <div >
                <label for="question">Формулировка вопроса:</label>
                <input type="text" id="question" class="form-control" name="question" value="<?php if (isset($question)) echo $question['name']?>">
            </div>
            <div>
                <label for="question">Варианты ответа:</label>
                <div class="row">
                    <input type="radio" name="chosen_answer" class="col-md-1" value="1" <?php if (isset($question) and $question['answers'][0]['is_correct'] == 'yes') echo 'checked'?>>
                    <div class="col-xs-11">
                        <input type="text" id="answer1" class="form-control" name="answer1" value="<?php if (isset($question)) echo $question['answers'][0]['answer']?>">
                    </div>
                </div>
                <div class="row">
                    <input type="radio" name="chosen_answer" class="col-md-1" value="2" <?php if (isset($question) and $question['answers'][1]['is_correct'] == 'yes') echo 'checked'?>>
                    <div class="col-xs-11">
                        <input type="text" id="answer2" class="form-control" name="answer2" value="<?php if (isset($question)) echo $question['answers'][1]['answer']?>">
                    </div>
                </div>
                <div class="row">
                    <input type="radio" name="chosen_answer" class="col-md-1" value="3" <?php if (isset($question) and $question['answers'][2]['is_correct'] == 'yes') echo 'checked'?>>
                    <div class="col-xs-11">
                        <input type="text" id="answer3" class="form-control" name="answer3" value="<?php if (isset($question)) echo $question['answers'][2]['answer']?>">
                    </div>
                </div>
                <div class="row">
                    <input type="radio" name="chosen_answer" class="col-md-1" value="4" <?php if (isset($question) and $question['answers'][3]['is_correct'] == 'yes') echo 'checked'?>>
                    <div class="col-xs-11">
                        <input type="text" id="answer4" class="form-control" name="answer4" value="<?php if (isset($question)) echo $question['answers'][3]['answer']?>">
                    </div>
                </div>
            </div>
            <input type="submit" name="action" value="Add_question" class="btn btn-success">
            <input type="submit" name="action" value="Confirm_Edit" class="btn btn-success">
            <input type="submit" name="action" value="Cancel" class="btn btn-danger">
            <hr>

        </form>
        <form id="output_form" method="post">
            <?php
                show_quests();
            ?>
        </form>

    </div>

</div>


<footer class="footer">
    <div class="container">
        <p class="text-muted">phpAcademy</p>
    </div>
</footer>


<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="https://getbootstrap.com/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
