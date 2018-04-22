<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setor $setor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $setor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $setor->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Setores'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Servicos'), ['controller' => 'Servicos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servico'), ['controller' => 'Servicos', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['controller' => 'Tecnicos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tecnico'), ['controller' => 'Tecnicos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="setores form large-9 medium-8 columns content">
    <?= $this->Form->create($setor) ?>
    <fieldset>
        <legend><?= __('Edit Setor') ?></legend>
        <?php
            echo $this->Form->control('nome');
            echo $this->Form->control('valor_hora');
            echo $this->Form->control('codigo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
