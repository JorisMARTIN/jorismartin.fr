<?php

    $lastName = $_POST[htmlentities('nom')];
    $firstName = $_POST[htmlentities('prenom')];
    $mail = $_POST[htmlentities('mail')];
    $phone = (isset($_POST[htmlentities('telephone')])) ? $_POST[htmlentities('telephone')] : 'Non renseigné';
    $subject = $_POST[htmlentities('sujet')];
    $text = $_POST[htmlentities('message')];

    ////////////////////////////////////

    $mailTo = "djomobil.djo@gmail.com";

    // Rédaction du mail
    $headers = array();

    $mailContentTo = "
    <html>
        <head>
            <title>Mail de $firstName $lastName</title>
            <meta charset=\"utf-8\" />

            <style>
                body{
                    width : 80 %;
                    margin : auto;
                    background-color : gray;
                }

                h1{
                    padding : 40px 20px 40px 20px;
                    text-align : center;
                    background-color : black;
                    color : white;
                }

                div{
                    margin : 10px 0px 10px 0px;
                    background-color : black;
                    color : white;
                }

            </style>
        </head>

        <body>
            <h1>Mail de $firstName $lastName</h1>

            <h2>Informations :</h2>

            <ul>
                <li>Nom : $lastName</li>
                <li>Prénom : $firstName</li>
                <li>Mail : $mail</li>
                <li>Téléphone : $phone</li>
            </ul>

            <div>
                <h2>Objet : $subject</h2>
                <h2>Message :</h2>
                <p>$text</p>
            </div>
        </body>
    </html>
    ";

    $headers[] = 'MIME-Version: 1.0';
    $headers[] = 'Content-type: text/html; charset=iso-8859-1';

    $headers[] = 'From: jorismartin.fr <noreply@jorismartin.fr>';
    
    if(mail($mailTo, $subject, $mailContentTo, implode("\r\n", $headers))) $answer = 1;
    else $answer = 0;
?>

<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <style>
            div{
                margin: 10px 10px 10px 10px;
                display: flex;
                justify-content: center;
            }
            button{
                padding: 5px 10px 5px 10px;
            }
        </style>
    </head>
    <body>
        <header>
            <?php if($answer == 1) : ?>
            <h1>Mail envoyé</h1>
            <?php else : ?>
            <h1>Erreur mail non-envoyé. Réessayer plus tard, ou contacter moi directement via <a href="mailto:contact@jorismartin.fr">contact@jorismartin.fr</a></h1>
            <?php endif; ?>
        </header>

        <div>
            <button><a href="index.html">Retour</a></button>
        </div>
    </body>
</html>
