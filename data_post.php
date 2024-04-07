<?php
  session_start(); //запускаємо сесію
  $session_id='some session id';
  $_SESSION['session']=$session_id;
  //unset($_SESSION['session']);  можемо знищити певні дані які були отримані раніше
  //session_destroy();   ми також можемо вручну "вбити сессію", але дані які були до цього отримані, залишаться(якщо ми їх не видалимо)

  //сессії автоматично знищуються після закриття браузера, і їм можна задавити свій час життя,

  //print_r($_POST); //оскільки ми передаємо дані за рахунок post,дані передаються за рахунок глобального асоційованого масиву пост
$clientName=$_REQUEST['Name'];
$clientSurname=$_POST['Surname'];
$email=$_POST['Email'];

$user_name="Vlad";
setcookie("name", $user_name, time()+64);
//для кукі можна встановити час її зберігання(тут стоїть 64 секунди)
//Відмінність кукі від сесій - кукі зберігаються на стороні клієнта, в той час як сессії зберігатимуться на сервері


class RequestWrapper
{
    private $get;
    private $post;

    public function __construct()
    {$this->get = $_GET;
        $this->post = $_POST;
    }

    public function getParameter($name)
    {return $this->get[$name] ?? null;
    }

    public function postParameter($name)
    {
        return $this->post[$name] ?? null;
    }
}

$req = new RequestWrapper();



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="input.css"  rel="stylesheet">
    <title>Ukrzaliznitsya</title>
</head>
<body style="margin: 0px;">
<div class ='main'>
    <div class="output">
        <h1 >Дякуємо за реєстрацію!</h1>
        <p> Ваше Ім'я:  <?php echo $req->postParameter('Name'); ?>  </p>
        <p> Ваш призвіще:  <?php echo $req->postParameter('Surname'); ?>  </p>
        <p> Ваша пошта:  <?php echo $req->postParameter('Email'); ?>  </p>
        <button type="submit" class="button">Переглянути квитки</button>
    </div>
</div>
</body>
</html>











