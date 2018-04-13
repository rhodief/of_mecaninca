<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Atendente $atendente
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Atendente'), ['action' => 'edit', $atendente->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Atendente'), ['action' => 'delete', $atendente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $atendente->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Atendentes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Atendente'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Funcionarios'), ['controller' => 'Funcionarios', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Funcionario'), ['controller' => 'Funcionarios', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="atendentes view large-9 medium-8 columns content">
    <h3><?= h($atendente->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Funcionario') ?></th>
            <td><?= $atendente->has('funcionario') ? $this->Html->link($atendente->funcionario->nome, ['controller' => 'Funcionarios', 'action' => 'view', $atendente->funcionario->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cargo') ?></th>
            <td><?= h($atendente->cargo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($atendente->id) ?></td>
        </tr>
    </table>
</div>
