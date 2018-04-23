<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Chave de Rodas';

?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <?= $this->Html->css('album.css') ?>
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <?php 
    /*
         <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>    

    */
    ?>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <?= $this->Html->script('script.js') ?>
</head>
<body>
<header>
      <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
          <div class="row">
            <div class="col-sm-8 col-md-7 py-4">
              <h4 class="text-white">MENU</h4>
              <ul class="list-unstyled">
                <li><a href="<?= $this->Url->Build(['controller'=>'clientes', 'action'=>'index']) ?>" class="text-white">Clientes</a></li>
                <li><a href="<?= $this->Url->Build(['controller'=>'setores', 'action'=>'index']) ?>" class="text-white">Setores</a></li>
                <li><a href="<?= $this->Url->Build(['pecas'=>'pecas', 'action'=>'index']) ?>" class="text-white">Peças</a></li>
                <li><a href="<?= $this->Url->Build(['controller'=>'servicos', 'action'=>'index']) ?>" class="text-white">Serviços</a></li>
                <li><a href="<?= $this->Url->Build(['controller'=>'carros', 'action'=>'index']) ?>" class="text-white">Carros</a></li>
                <li><a href="<?= $this->Url->Build(['controller'=>'funcionarios', 'action'=>'index']) ?>" class="text-white">Funcionários</a></li>
              </ul>
            </div>
            <div class="col-sm-4 offset-md-1 py-4">
              <h4 class="text-white">Configurações</h4>
              <ul class="list-unstyled">
                <li><a href="#" class="text-white">Preferências</a></li>
                <li><a href="#" class="text-white">Administrativo</a></li>
                <li><a href="<?= $this->Url->Build(['controller'=>'funcionarios', 'action'=>'logout']) ?>" class="text-white">Sair</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="navbar navbar-dark bg-dark box-shadow">
        <div class="container d-flex justify-content-between">
          <a href="#" class="navbar-brand d-flex align-items-center">
          <i class="fas fa-wrench"></i> &nbsp;
            <strong>Chave de Rodas - Oficina Mecânica</strong>
          </a>
          
          <span class="text-white"> <?= isset($user['user']) ? 'Olá ' . $user['user']['nome'] . ' (' . $user['alias'].$user['user']['id'] . ')' : ''  ?></span>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
        </div>
      </div>
    </header>

    <main role="main">
        <div class="container">
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
        </div>

      
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</body>
</html>
