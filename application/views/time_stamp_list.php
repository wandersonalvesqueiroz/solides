<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$session = $this->session->userdata();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>Teste Solides</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo base_url('includes/assets/img/favicon.ico') ?>"/>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/assets/css/simple-sidebar.css') ?>">
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('includes/fonts/font-awesome-4.7.0/css/font-awesome.min.css') ?>">

</head>

<body>

<div class="d-flex" id="wrapper">

    <div class="bg-purple border-right text-light" id="sidebar-wrapper">
        <div class="sidebar-heading font-weight-bold">SysSolides</div>
        <div class="list-group list-group-flush">
            <span class="list-group-item list-group-item-action bg-purple-second text-light active">Registro de Horários</span>
        </div>
    </div>

    <div id="page-content-wrapper">

        <nav class="navbar navbar-expand-lg navbar-light bg-purple-second text-light border-bottom">
            <button class="btn btn-primary btn-small" id="menu-toggle">
                <i class="fa fa-bars" aria-hidden="true"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url() ?>index.php/dashboard">
                            <i class="fa fa-home" aria-hidden="true"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $session['name'] ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <!--                            <a class="dropdown-item" href="#">Editar</a>-->
                            <!--                            <a class="dropdown-item" href="#">Excluir</a>-->
                            <!--                            <div class="dropdown-divider"></div>-->
                            <a class="dropdown-item" href="<?php echo base_url() ?>index.php/logout">Sair</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>


        <div class="container-fluid">
            <h2 class="mt-4 mb-3">Registro de Horários</h2>

            <?php if (isset($months) && !empty($months)): ?>
                <form action="<?php echo base_url(); ?>index.php/time_stamp/register_list" method="post"
                      name="register_list" class="form form-inline">
                    <div class="form-group col-6">
                        <label for="month" class="col-2 col-form-label">Mês</label>
                        <select class="form-control" id="month" class="col-6">
                            <?php foreach ($months as $month):
                                $month_date_register = new DateTime($month->date_register);
                                $month_date_register = $month_date_register->format('m/Y');
                                ?>
                                <option value="<?php echo $month->date_register; ?>">
                                    <?php echo $month_date_register; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <button type="submit" class="btn btn-primary col-3 ml-3">Exibir registros</button>
                    </div>
                </form>
            <?php endif; ?>

            <?php if (isset($registers) && !empty($registers)): ?>
                <h4><?php echo 'MES'; ?></h4>
                <div class="table-responsive">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Data</th>
                            <th scope="col">Entrada</th>
                            <th scope="col">Ida Almoço</th>
                            <th scope="col">Volta Almoço</th>
                            <th scope="col">Saída</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($registers as $register):
                            $date_register = new DateTime($register->date_register);
                            $date_register = $date_register->format('d/m/Y');
                            ?>
                            <tr>
                                <th scope="row"><?php echo $date_register; ?></th>
                                <td><?php echo $register->in_time; ?></td>
                                <td><?php echo $register->out_lunch; ?></td>
                                <td><?php echo $register->in_lunch; ?></td>
                                <td><?php echo $register->out_time; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif; ?>
        </div>

    </div>

</div>

<script src="<?php echo base_url('includes/jquery/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('includes/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('includes/assets/js/main.js') ?>"></script>

</body>

</html>
