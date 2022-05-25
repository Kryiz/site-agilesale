<?php
// Подключаем библиотеку PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
require 'phpmailer/PHPMailer.php';

// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$source = $_POST['form_subject'];
// $text = $_POST['text'];
// $file = $_FILES['myfile'];
 
// Создаем письмо
$mail = new PHPMailer();
$mail->setFrom('info@agilesale.ru', 'AgileSale'); // от кого (email и имя)
$mail->addAddress('info@agilesale.ru', 'AgileSale');  // кому (email и имя)
$mail->Subject = 'AgileSale';                         // тема письма
// Формирование самого письма
$title = "Заявка";
$body = "
<html>
<head>
  <title>AgileSale</title>
</head>
<body>
  <p>$source</p>
  <table>
<tr style='background-color: #f8f8f8;'>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Имя :</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$name</td>
</tr>
<tr style='background-color: #f8f8f8;'>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Телефон :</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$phone</td>
</tr>
<tr style='background-color: #f8f8f8;'>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Почта :</b></td>
    <td style='padding: 10px; border: #e9e9e9 1px solid;'>$email</td>
</tr>
  </table>
</body>
</html>
";

// Отправка сообщения
$mail->isHTML(true);
$mail->CharSet = 'UTF-8';
$mail->Subject = $title;
$mail->Body = $body;    

// Отправляем
if ($mail->send()) {
    echo 'ok';
  } else {
    echo 'Ошибка: ' . $mail->ErrorInfo;
  } 

// if ($mail->send()) {
//     header('location: index.html');
//   } else {
//     echo 'Ошибка: ' . $mail->ErrorInfo;
//   } 