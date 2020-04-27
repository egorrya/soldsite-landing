<?php
if(isset($_POST["send"])){
if (isset($_POST['g-recaptcha-response'])) {
$url_to_google_api = "https://www.google.com/recaptcha/api/siteverify";

$secret_key = '6LefsmUUAAAAADXGgzLl9cmUmy7FholiSWjJCa8S';

$query = $url_to_google_api . '?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'] . '&remoteip=' . $_SERVER['REMOTE_ADDR'];

$data = json_decode(file_get_contents($query));

if ($data->success) {

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

$contact = $_POST['contact'];
$logo = $_POST['logo'];
$name = $_POST['name-2'];
$email = $_POST['email-2'];
$phone = $_POST['phone-2'];
$text = $_POST['text-2'];

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  																							// Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'soldsiteru@gmail.com'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'Kakawka008'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465; // TCP port to connect to / этот порт может отличаться у других провайдеров

$mail->setFrom('soldsiteru@gmail.com'); // от кого будет уходить письмо?
$mail->addAddress('mail@soldsite.ru');     // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Заявка на создание сайта';
$mail->Body    = 'Имя: ' .$name . '<br/>Телефон: ' .$phone . '<br/>Email: ' .$email . '<br/>Сообщение: ' .$text . '<br/><br/>Сайт: ' .$contact . '<br/>Лого: ' .$logo;
$mail->AltBody = '';
if(!$mail->send()) {
    echo 'Error';
} else {
    header('location: thanks.html');
}
}

else {
}

}

}
else {
}

?>

