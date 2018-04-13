<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tecnico $tecnico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tecnico'), ['action' => 'edit', $tecnico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tecnico'), ['action' => 'delete', $tecnico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tecnico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tecnico'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Setores'), ['controller' => 'Setores', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Setor'), ['controller' => 'Setores', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tecnicos view large-9 medium-8 columns content">
    <h3><?= h($tecnico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $tecnico->has('funcionario') ? $this->Html->link($tecnico->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'view', $tecnico->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Setor') ?></th>
            <td><?= $tecnico->has('setor') ? $this->Html->link($tecnico->setor->nome, ['controller' => 'Setores', 'action' => 'view', $tecnico->setor->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Funcao') ?></th>
            <td><?= h($tecnico->funcao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tecnico->id) ?></td>
        </tr>
    </table>
</div>
