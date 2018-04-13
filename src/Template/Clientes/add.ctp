<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas Fisicas'), ['controller' => 'PessoasFisicas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoas Fisica'), ['controller' => 'PessoasFisicas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pessoas Juridicas'), ['controller' => 'PessoasJuridicas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pessoas Juridica'), ['controller' => 'PessoasJuridicas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="clientes form large-9 medium-8 columns content">
    <?= $this->Form->create($cliente) ?>
    <fieldset>
        <legend><?= __('Add Cliente') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('email');
            echo $this->Form->control('telefone_fixo');
            echo $this->Form->control('telefone_celular');
            echo $this->Form->control('endereco');
            echo $this->Form->control('numero');
            echo $this->Form->control('cep');
            echo $this->Form->control('cidade');
            echo $this->Form->control('uf');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
