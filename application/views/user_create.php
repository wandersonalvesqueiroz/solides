<?php
defined('BASEPATH') OR exit('Error');
?>
<!DOCTYPE>
<html>

<head>
    <title>Teste Solides</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/animate/animate.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/css-hamburgers/hamburgers.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/animsition/css/animsition.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/select2/select2.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/daterangepicker/daterangepicker.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/assets/css/util.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/assets/css/main.css') ?>">
</head>
<body>
<div class="limiter">
    <div class="container-login100"
         style="background-image: url(<?php echo base_url('includes/assets/img/backsolides.webp') ?>);">
        <div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Cadastrar Usuário
				</span>

            <?php if (isset($msg) && !is_null($msg)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $msg ?>
                </div>
            <?php endif; ?>

            <form action="<?php echo base_url(); ?>index.php/users_out/create" method="post" name="process"
                  class="login100-form validate-form p-b-33 p-t-5">

                <div class="wrap-input100 validate-input" data-validate="Nome">
                    <input class="input100" type="text" name="name" placeholder="nome" value="">
                </div>

                <div class="wrap-input100 validate-input" data-validate="Informe um usuário">
                    <input class="input100" type="text" name="username" placeholder="usuário" value="">
                </div>

                <div class="wrap-input100 validate-input" data-validate="Informe um e-mail">
                    <input class="input100" type="text" name="email" placeholder="e-mail" value="">
                </div>

                <div class="wrap-input100 validate-input" data-validate="Informe uma senha">
                    <input class="input100" type="password" name="password" placeholder="senha" value="">
                </div>

                <div class="wrap-input100 validate-input" data-validate="Confirme a senha">
                    <input class="input100" type="password" name="password_confirm" placeholder="confirmar senha"
                           value="">
                </div>

                <div class="container-login100-form-btn m-t-32">
                    <button type="submit" class="login100-form-btn">
                        Cadastrar
                    </button>
                </div>

            </form>
            <div class="mt-2 text-right">
                <a href="<?php echo base_url(); ?>index.php/login" class="btn btn-success btn-sm">
                    Login
                </a>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('includes/jquery/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('includes/animsition/js/animsition.min.js') ?>"></script>
<script src="<?php echo base_url('includes/bootstrap/js/popper.js') ?>"></script>
<script src="<?php echo base_url('includes/bootstrap/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('includes/select2/select2.min.js') ?>"></script>
<script src="<?php echo base_url('includes/daterangepicker/moment.min.js') ?>"></script>
<script src="<?php echo base_url('includes/daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?php echo base_url('includes/countdowntime/countdowntime.js') ?>"></script>
<script src="<?php echo base_url('includes/assets/js/main.js') ?>"></script>
</body>
</html>