<?php 
define("passkey", "root");

$v_passkey = false;

if (!isset($_POST["Password"]) || $_POST["Password"] == "")
{
    echo '<script>alert("Entrer le mot de passe pour l\'envoi du mail !")</script>';
    $v_passkey = false;
}
elseif ($_POST["Password"] != passkey) 
{
    echo '<div style="background-color:red">
    <h1 style="text-align:center"> Mot de Passe incorrect  </h1><br><hr>
    <h1><a href="index.html"> Acceuil  </a></h1>
   </div>';
    $v_passkey = false;
}
else
{
	$v_passkey = true;
}
if(isset($_POST["to"]) && isset($_POST["from"]) &&
isset($_POST["fromname"]) && isset($_POST["replyto"]) && 
isset($_POST["subject"]) && isset($_POST["message"]) && 
!empty($_POST["to"]) && !empty($_POST["from"]) &&
!empty($_POST["fromname"]) && !empty($_POST["replyto"]) && 
!empty($_POST["subject"]) && !empty($_POST["message"]) && 
$v_passkey)
{
    
    $mail_tete = "From: ".$_POST["fromname"]."<".$_POST["from"].">"."\r\n". "Reply-To: ".$_POST["replyto"]."\r\n";
    $send_mail = mail($_POST["to"], $_POST["subject"], $_POST["message"], $mail_tete);
    if($send_mail)
    {
        echo '<div style="background-color:green">
        <h1 style="text-align:center"> Message envoyé avec succès ! </h1><br><hr>
        <h1><a href="index.html"> Envoyer un autre Mail ? </a></h1>
       </div>';
    }
    else 
    {
        echo '<script> alert("Mail  non envoyé ! Une erreur s\'est produite !! ")</script>';
    }
}
else 
{
    echo '<script> alert("Il y a un champs manquant pour l\'envoir du Mail") </script>';
}
?>