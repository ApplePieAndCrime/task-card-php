<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
    <title>Login</title>
  </head>
  <body>
    <div class="login-page page">
      <div class="page-title">
        <h1>Войти</h1>
      </div>
      <section>
        <p>Для входа в аккаунт можно использовать пример: milka@gmail.com '12345'</p>
      </section>
      <form name="login_form" class="login-wrapper">
        <input name="email" type="text" placeholder="логин или email" value="milka@gmail.com">
        <input name="password" type="password" placeholder="пароль" value="12345">
        <button class="login-btn" type="submit"> войти </button>
        <a class="reg-link" href="registration.php">Не зарегистрированы?</a>
      </form>
    </div>
    <script src="js/login.js" type="module"></script>
  </body>
</html>