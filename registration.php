<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/registration.css">
    <title>Registration</title>
  </head>
  <body>
    <div class="reg-page page">
      <div class="page-title">
        <h1>Регистрация</h1>
      </div>
      <form class="reg-wrapper" name="reg_form">
        <div class="input-wrapper"><span>Email:</span>
          <input name="email" type="text" placeholder="email">
        </div>
        <div class="input-wrapper"><span>Псевдоним:</span>
          <input name="username" type="text" placeholder="логин">
        </div>
        <div class="input-wrapper"><span>Пароль:</span>
          <input name="password" type="password" placeholder="пароль">
        </div>
        <div class="input-wrapper btn-wrapper">
          <button class="reg-btn" type="submit">зарегистрироваться</button>
        </div>
      </form>
    </div>
    <script src="js/registration.js" type="module"></script>
  </body>
</html>