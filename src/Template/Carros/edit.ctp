<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Carro $carro
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $carro->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $carro->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Carros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="carros form large-9 medium-8 columns content">
    <?= $this->Form->create($carro) ?>
    <fieldset>
        <legend><?= __('Edit Carro') ?></legend>
        <?php
            echo $this->Form->control('placa');
            echo $this->Form->control('marca');
            echo $this->Form->control('modelo');
            echo $this->Form->control('cor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
