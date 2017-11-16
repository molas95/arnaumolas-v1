<?php
    $link = mysqli_connect("localhost", "molaspcr", "kontrol9") or die("<h2> No es troba el servidor</h2>");
    $db = mysqli_select_db($link, "molaspcr_db") or die("<h2> Error de connexió</h2>");

    $nom = $_POST['nom'];
    $email = $_POST['email'];
    $assumpte = $_POST['assumpte'];
    $missatge = $_POST['missatge'];

    mysqli_query($link, "utf8");
    $link->set_charset("utf8");

    if (!mysqli_query($link, "INSERT INTO contacte VALUES ('$nom','$email','$assumpte','$missatge')")) {
        header("Location: index.html#error");
        die;
    } else {

        $email_to = "admin@molas.pcriot.com";
        $email_subject = "Petició Web";

        $email_message = "Dades del formulari:\n\n";
        $email_message .= "Nom: " . $nom . "\n";
        $email_message .= "E-mail: " . $email . "\n";
        $email_message .= "Assumpte: " . $assumpte . "\n";
        $email_message .= "Missatge: " . $missatge . "\n\n";

        $headers = 'From: '.$email_from."\r\n".
        'Reply-To: '.$email_from."\r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);


        header("Location: index.html#bona");
        die;
    }
?>