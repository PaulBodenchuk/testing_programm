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
        <h1>Список тем: </h1>

        <form method="post">
            <?php
            session_start();
            if (is_readable('Themes.txt')){
                $ser_arr = file_get_contents('Themes.txt');
                $arr_themes = unserialize($ser_arr);
                $_SESSION['arr_themes'] = $arr_themes;
            }

            //Add
            if (isset($_POST['action']) AND $_POST['action'] == 'Add_theme'){

                if(isset($_POST['theme']) and $_POST['theme'] != ''){

                    if (is_writable('Themes.txt')){

                        $theme = $_POST['theme'];
                        $arr_themes = $_SESSION['arr_themes'];
                        $arr_themes[] = $theme;;
                        $_SESSION['arr_themes'] = $arr_themes;
                        $ser_arr = serialize($arr_themes);
                        file_put_contents('Themes.txt',$ser_arr);
                    }
                }


            }
            if (array_key_exists('arr_themes', $_SESSION)) {
                $arr_themes = $_SESSION['arr_themes'];
                if (isset($arr_themes) and $arr_themes) {
                    foreach ($_SESSION['arr_themes'] as $key => $theme){
                        $index = $key+1;
                        echo "<br>{$index}. <a href=\"theme_questions.php?theme_name={$theme}\"$key>{$theme}</a>";
                    }
                }
            }

            ?>
            <div class="col-xs-12">
                <input type="text" id="theme" class="form-control" name="theme">
                <input type="submit" name="action" value="Add_theme" class="btn btn-success">
            </div>

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
