<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/comum.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/icofont.min.css">
    <link rel="stylesheet" href="assets/css/login.css">

    <title>In 'N Out</title>
</head>
<body>

    <form class="form-login" action="#" method="post">

        <div class="login-card card">
            <div class="card-header">
                <i class="icofont-travelling mr-2"></i>
                <span class="font-weight-light">In</span>
                <span class="font-weight-bold mx-1">N'</span>
                <span class="font-weight-light">Out</span>
                <i class="icofont-runner-alt-1 ml-2"></i>

            </div>

            <div class="card-body">
                <?php include (VIEW_PATH . '/template/messages.php') ?>
                <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" class="form-control <?= isset($exception) &&
                    $errors["email"] ? "is-invalid" : "" ?>"
                           id="email" placeholder="Informe seu E-mail" value="<?= $viewData["email"] ?>" autofocus>

                    <div class="invalid-feedback">
                        <?= $errors["email"] ?>
                    </div>

                </div>

                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" class="form-control <?= isset($exception) &&
                    $errors["password"] ? "is-invalid" : "" ?>" id="password"
                           placeholder="Informe sua senha">

                    <div class="invalid-feedback">
                        <?= $errors["password"] ?>
                    </div>

                </div>

            </div>

            <div class="card-footer">
                <button class="btn btn-lg btn-primary" type="submit">
                    Entrar
                </button>
            </div>

        </div>
    </form>

</body>
</html>