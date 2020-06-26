<?php
session_start();

$APIURL = getenv('APIURL');

include_once('./utils.php');

if (isset($_POST['auth'])) {
    $response = Utils::get($APIURL . 'auth');
    $response = json_decode($response['body'], true);

    $token = $response['token'];
    if (isset($token)) {
        $_SESSION['TOKEN'] = $token;
    }

}

if (isset($_POST['logout'])) {
    session_destroy();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client</title>
    <link href="https://cdn.jsdelivr.net/npm/docsearch.js@2/dist/cdn/docsearch.min.css" rel="stylesheet">
    <link href='./assets/vendor/css/bootstrap.min.css' rel='stylesheet'>
    <link href='./assets/main.css' rel='stylesheet'>
</head>
<body>
    <div class='container mt-5' id='main'>
        <h1 class='text-center'>Simple REST API</h1>
        <?php 
            if (isset($_GET['t'])) {
                $params = ['t' => $_GET['t']];
            
                if (isset($_GET['y'])) {
                    $params['y'] = $_GET['y'];
                }

                $params['plot'] = isset($_GET['plot']) ? $_GET['plot'] : 'short';
            
                $response = Utils::get($APIURL . 'getMovie', $params, ['Authorization: Bearer ' . $_SESSION['TOKEN']]);

                echo "<div class='mt-5 text-center'><code>".$response['body']."</code></div>";
            }

            if (isset($_GET['isbn'])) {
                $response = Utils::get($APIURL . 'getBook', ['bibkeys' => 'ISBN:'.$_GET['isbn']], ['Authorization: Bearer ' . $_SESSION['TOKEN']]);
                echo "<div class='mt-5 text-center'><code>".$response['body']."</code></div>";
            }
        ?>       
        <div class='row mt-5 d-flex justify-content-center align-items-center'>
            <form action='/' method='POST'>
                <input type='text' name='auth' value=1 style='display: none'>
                <button type='submit' class='btn btn-primary mr-5' id='login'>Login</button>
            </form>
            <form action='/' method='POST'>
                <input type='text' name='logout' value=1 style='display: none'>
                <button type='submit' class='btn btn-danger ml-5' id='logout'>Logout</button>
            </form>
        </div>
        <div class='row mt-5 mb-3'>
            <div class='col-lg'>
                <h3 class='text-center'>Movie</h3>
            </div>
            <div class='col-lg'>
                <h3 class='text-center'>Book</h3>
            </div>
        </div>
        <div class='row d-flex justify-content-space-between'>
            <div class='col-sm d-flex justify-content-center'>
                <form id='movieForm' method='GET' action='/'>
                    <div class='form-group'>
                        <label for='movieName'>Name</label>
                        <input type='text' class='form-control' id='movieName' name='t' required>
                    </div>
                    <div class='form-group'>
                        <label for='movieYear'>Year</label>
                        <input type='number' min=0 class='form-control' id='movieYear' name='movieYear'>
                    </div>
                    <div class='form-group'>
                        <label for='moviePlot'>Plot</label>
                        <select class='form-control' id='moviePlot' name='moviePlot'>
                            <option value='short'>Short</option>
                            <option value='long'>Long</option>
                        </select>
                    </div>
                    <button type='submit' class='btn btn-info mt-4 d-block ml-auto mr-auto'>/getMovie</button>            
                </form>
            </div>
            <div class='col-sm d-flex justify-content-center'>
                <form action='/' method='GET'>
                    <div class='form-group'>
                        <label for='isbn'>ISBN</label>
                        <input type='text' class='form-control' id='isbn' name='isbn' required>
                    </div>
                    <button type='submit' class='btn btn-info mt-4 d-block ml-auto mr-auto'>/getBook</button>
                </form>
            </div>
        </div>
    </div>
    <script src='./assets/vendor/js/bootstrap.min.js'></script>
</body>
</html>