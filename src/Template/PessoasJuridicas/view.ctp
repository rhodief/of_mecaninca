<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PessoasJuridica $pessoasJuridica
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pessoas Juridica'), ['action' => 'edit', $pessoasJuridica->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pessoas Juridica'), ['action' => 'delete', $pessoasJuridica->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pessoasJuridica->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pessoas Juridicas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pessoas Juridica'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pessoasJuridicas view large-9 medium-8 columns content">
    <h3><?= h($pessoasJuridica->cnpj) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Cliente') ?></th>
            <td><?= $pessoasJuridica->has('cliente') ? $this->Html->link($pessoasJuridica->cliente->nome, ['controller' => 'Clientes', 'action' => 'view', $pessoasJuridica->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Responsavel') ?></th>
            <td><?= h($pessoasJuridica->responsavel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cpf Responsavel') ?></th>
            <td><?= h($pessoasJuridica->cpf_responsavel) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pessoasJuridica->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Cnpj') ?></th>
            <td><?= $this->Number->format($pessoasJuridica->cnpj) ?></td>
        </tr>
    </table>
</div>
