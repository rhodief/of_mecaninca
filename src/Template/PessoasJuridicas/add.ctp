<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasJuridica $pessoasJuridica
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pessoas Juridicas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pessoasJuridicas form large-9 medium-8 columns content">
    <?= $this->Form->create($pessoasJuridica) ?>
    <fieldset>
        <legend><?= __('Add Pessoas Juridica') ?></legend>
        <?php
            echo $this->Form->control('cnpj');
            echo $this->Form->control('cliente_id', ['options' => $clientes]);
            echo $this->Form->control('responsavel');
            echo $this->Form->control('cpf_responsavel');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
