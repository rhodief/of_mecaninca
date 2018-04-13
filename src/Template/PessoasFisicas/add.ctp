<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasFisica $pessoasFisica
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pessoas Fisicas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasFisicas form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoasFisica) ?>
    <fieldset>
        <legend><?= __('Add Pessoas Fisica') ?></legend>
        <?php
            echo $this->Form->control('cpf');
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            echo $this->Form->control('dataNascimento');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
