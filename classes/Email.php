<?php
namespace Classes;

use AddressInfo;
use PHPMailer\PHPMailer\PHPMailer;

    
class Email{
    public $email;
    public $nombre;
    public $token;

    public function __construct($email,$nombre,$token)
    {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }

    public function enviarConfirmacion(){
        // Crear un Objetp de Email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];
       
        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->setFrom('nomadas21@hotmail.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Confirmar su Cuenta';
        $contenido = "<HTML>";
        $contenido .= "<p> <strong>Hola " . $this->nombre . " </strong> Has creado tu cuenta en Estética Krystal, 
        solo debes confirmarla presionando en el siguiente enlace</p>";
        $contenido .= "<p> Presiona aqui : <a href='" . $_ENV['APP_URL'] . "/confirmar-cuenta?token=" . $this->token . "'>Confirmar cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste éste cambio o ésta cuenta, ignora éste correo.... </p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar E-mail
        $mail->send();
    }
    public function enviarInstrucciones(){
        // Crear un Objetp de Email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->Username = $_ENV['EMAIL_USER'];
        $mail->Password = $_ENV['EMAIL_PASSWORD'];
        // Set HTML
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('nomadas21@hotmail.com');
        $mail->addAddress($this->email);
        $mail->Subject = 'Reestablece tu password';
        $contenido = "<HTML>";
        $contenido .= "<p> <strong>Hola " . $this->nombre . " </strong> Has solicitado reestablecer tu password en Estética Krystal, 
        sigue el siguiente enlace</p>";
        $contenido .= "<p> Presiona aqui : <a href='" . $_ENV['APP_URL'] . "/recuperar?token=" . $this->token . "'>Reestableblecer Password</a> </p>";
        $contenido .= "<p>Si tu no solicitaste éste cambio o ésta cuenta, ignora éste correo.... </p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar E-mail
        $mail->send();
    }
}
?>