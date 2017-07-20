<?php

function doMail($text)
{
  $email = get_option( 'admin_email', 'not' );

  $to  = $email ; 
  
  //print_r($email);exit;

  $subject = "Запрос с сайта Konis"; 

  $message = ' 
    <html> 
        <head> 
            <title>Запрос с сайта Konis</title> 
        </head> 
        <body> 
             '.$text.'
        </body> 
    </html>'; 

    $headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
    $headers .= "From: Konis <example@mail.ru>\r\n"; 

    mail($email, $subject, $message, $headers); 
}

if(isset($_POST['thisform']) && $_POST['thisform']="zayav")
{
  $text = 'Телефон: '.$_POST['uphone'];
  
  doMail($text);
}
elseif(isset($_POST['thisform']) && $_POST['thisform']="actphone")
{
  $text = 'Имя: '.$_POST['uphone'];
  $text .= '<br>Телефон: '.$_POST['uphone'];
  
  doMail($text);
}
elseif(isset($_POST['thisform']) && $_POST['thisform']="mess")
{
  
}

//print_r($_POST);exit;

echo json_encode(array('result'=>true,'text'=>'Спасибо, ваш запрос принят, мы вам перезвоним!'));