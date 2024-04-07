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
<!--      вказуємо метод передачі даних як пост-->
    <form  action="data_post.php"  method="post"  >
              <h1 >Зареєструйтеся на порталі Укрзалізниці</h1>
              <input type="text" name="Name" placeholder="Введіть ваше ім'я">
              <input type="text" name="Surname" placeholder="Введіть ваше призвіще">
              <input type="text" name="Email" placeholder="Введіть вашу електронну пошту">
              <button type="submit" class="button">Продовжити</button>
    </form>
  </div>
</body>
</html>

<?php

