<?php
require "PHPMailer/Exception.php";
require "PHPMailer/OAuth.php";
require "PHPMailer/PHPMailer.php";
require "PHPMailer/POP3.php";
require "PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class Message
{
    private $para = null;
    private $assunto = null;
    private $msg = null;
    public $status = array('codigoStatus' => null, 'descStatus' => '');

    public function __get($attr)
    {
        return $this->$attr;
    }

    public function __set($attr, $valor)
    {
        $this->$attr = $valor;
    }

    public function validMessage()
    {
        if (empty($this->para) || empty($this->assunto) || empty($this->msg)) {
            return false;
        }

        return true;
    }
}

$message = new Message();

$message->__set('para', $_POST['para']);
$message->__set('assunto', $_POST['assunto']);
$message->__set('msg', $_POST['msg']);

if (!$message->validMessage()) {
    header('Location: index.php');
}

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = false;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'email';                     //SMTP username
    $mail->Password   = 'password';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('email', 'name');
    $mail->addAddress($message->__get('para'));

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $message->__get('assunto');
    $mail->Body    = $message->__get('msg');

    $mail->send();
    $message->status['codigoStatus'] = 1;
    $message->status['descStatus'] = 'E-mail enviado com sucesso';
} catch (Exception $e) {
    $message->status['codigoStatus'] = 2;
    $message->status['descStatus'] = 'Não foi possível enviar o e-mail: ' . $mail->ErrorInfo;
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Mail Send</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="py-3 text-center">
            <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
            <h2>Send Mail</h2>
            <p class="lead">Seu app de envio de e-mails particular!</p>
        </div>

        <div class="row">
            <div class="col-md-12">
                <?php
                if ($message->status['codigoStatus'] == 1) {
                ?>

                    <div class="container d-flex flex-column align-items-center">
                        <h1 class="display-4 text-success">Sucesso</h1>
                        <p><?= $message->status['descStatus'] ?></p>
                        <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                    </div>

                <?php } ?>

                <?php
                if ($message->status['codigoStatus'] == 2) {
                ?>

                    <div class="container d-flex flex-column align-items-center">
                        <h1 class="display-4 text-danger">Ops!</h1>
                        <p><?= $message->status['descStatus'] ?></p>
                        <a href="index.php" class="btn btn-danger btn-lg mt-5 text-white">Voltar</a>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>