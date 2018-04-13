<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasFisica $pessoasFisica
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Fisica'), ['action' => 'edit', $pessoasFisica->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Fisica'), ['action' => 'delete', $pessoasFisica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasFisica->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Fisicas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Fisica'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasFisicas view large-9 medium-8 columns content">
    <h3><?= h($pessoasFisica->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cpf') ?></th>
            <td><?= h($pessoasFisica->cpf) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $pessoasFisica->has('cliente') ? $this->Html->link($pessoasFisica->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $pessoasFisica->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasFisica->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('DataNascimento') ?></th>
            <td><?= h($pessoasFisica->dataNascimento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($pessoasFisica->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($pessoasFisica->modified) ?></td>
        </tr>
    </table>
</div>
