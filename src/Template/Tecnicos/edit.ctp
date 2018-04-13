<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico $tecnico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $tecnico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $tecnico->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Setores'), ['controller' => 'Setores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Setor'), ['controller' => 'Setores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="tecnicos form large-9 medium-8 columns content">
    <?= $this->Form->create($tecnico) ?>
    <fieldset>
        <legend><?= __('Edit Tecnico') ?></legend>
        <?php
            echo $this->Form->control('funcionario_id', ['options' => $funcionarios]);
            echo $this->Form->control('setor_id', ['options' => $setores]);
            echo $this->Form->control('funcao');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
