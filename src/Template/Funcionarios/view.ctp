<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Funcionario $funcionario
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Funcionario'), ['action' => 'edit', $funcionario->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Funcionario'), ['action' => 'delete', $funcionario->id], ['confirm' => __('Are you sure you want to delete # {0}?', $funcionario->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Atendentes'), ['controller' => 'Atendentes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atendente'), ['controller' => 'Atendentes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Tecnicos'), ['controller' => 'Tecnicos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tecnico'), ['controller' => 'Tecnicos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="funcionarios view large-9 medium-8 columns content">
    <h3><?= h($funcionario->nome) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Nome') ?></th>
            <td><?= h($funcionario->nome) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($funcionario->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Atendente') ?></th>
            <td><?= $funcionario->has('atendente') ? $this->Html->link($funcionario->atendente->cargo, ['controller' => 'Atendentes', 'action' => 'view', $funcionario->atendente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tecnico') ?></th>
            <td><?= $funcionario->has('tecnico') ? $this->Html->link($funcionario->tecnico->funcao, ['controller' => 'Tecnicos', 'action' => 'view', $funcionario->tecnico->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($funcionario->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Admissao') ?></th>
            <td><?= h($funcionario->data_admissao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Desligamento') ?></th>
            <td><?= h($funcionario->data_desligamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($funcionario->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($funcionario->modified) ?></td>
        </tr>
    </table>
</div>
