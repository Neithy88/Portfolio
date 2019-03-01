<?php

$email_destinataire = "alexandra.moullet@gmail.com";

$email = htmlspecialchars($_POST['email']);
$sujet = htmlspecialchars($_POST['sujet']);
$message = htmlspecialchars($_POST['message']);

$error_message = ""; 

$canSend = true; 


if(!isset($message) || empty($message)) { 

    $error_message .= "Veuillez remplir le champs message <br>";
    $canSend = false; 

}

if(!isset($sujet) || empty($sujet)) { 

    $error_message .= "Veuillez remplir le champs sujet <br>";
    $canSend = false;

}

if(!isset($email) || empty($email)) { 

    $error_message .= "Veuillez remplir le champs email <br>";
    $canSend = false;

}
else if (!filter_var($email,FILTER_VALIDATE_EMAIL)) { 
    $error_message .= "L'adresse mail renseignée n'est pas valide<br>";
    $canSend = false;
}


if(!$canSend) { 
    $error_message .= "Il y a un problème avec les informations renseignées. <a href='index.html'>Retour au formulaire</a>";
    echo $error_message;
}
else { 

    $message = "Nouveau message de : ".$email."\n".$message; 

    if(mail($email_destinataire,$sujet,$message)) {
        echo "Votre message a bien été envoyé : ". $message;
    }
    else {
        echo "echec de l'envoi. Veuillez réessayer. Si le problème persiste, merci de contacter l'administrateur";
    }

    
}


?>