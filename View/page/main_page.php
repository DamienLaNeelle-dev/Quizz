<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
    <link rel="stylesheet" href="/Quizz/View/css/border.css">
    <link rel="stylesheet" href="/Quizz/View/css/color.css">
    <link rel="stylesheet" href="/Quizz/View/css/flexbox.css">
    <link rel="stylesheet" href="/Quizz/View/css/margin_padding.css">
    <link rel="stylesheet" href="/Quizz/View/css/width_height.css">
    <link rel="stylesheet" href="/Quizz/View/css/all.css">
    <link rel="stylesheet" href="/Quizz/View/css/fonts.css">
    <link rel="stylesheet" href="/Quizz/View/css/button.css">
    <link rel="shortcut icon" type="image/x-icon" href="../View/svg/question-solid.svg" />
    <title>Quizz - Culture générale</title>
</head>

<body class="bg-2">

    <div class="d-flex column align-items-center color-1">
        <h1 class="signika-sb mb-0 size-3">Quizz</h1>
        <h3 class="signika-sb m-0 size-2">Culture générale</h3>
    </div>

    <section class="w-section h-section">
        <div class="d-flex justify-center align-items-center color-1 p-10 w-100 h-100">
            <div class="d-flex column justify-center align-items-center border br p-20 bg-1">
                <h4 class="signika-sb m-0">Testez vos connaissances</h4>
                <h3>Inscription</h3>
                <form class="d-flex column" action="">
                    <label class="d-flex justify-center signika-reg mb-5" for="name">Entrez votre nom :</label>
                    <input class="signika-reg mb-10" type="text" name="name" id="name">
                </form>
                <div class="d-flex justify-center">
                    <a href="/Quizz/Controller/controller_level.php"><button class="btn mb-5">Commencer le quizz</button></a>
                </div>
            </div>
        </div>
    </section>
</body>

</html>