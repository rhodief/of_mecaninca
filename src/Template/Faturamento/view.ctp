<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faturamento $faturamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Faturamento'), ['action' => 'edit', $faturamento->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Faturamento'), ['action' => 'delete', $faturamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $faturamento->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Faturamento'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Faturamento'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ordem De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="faturamento view large-9 medium-8 columns content">
    <h3><?= h($faturamento->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ordens De Servico') ?></th>
            <td><?= $faturamento->has('ordens_de_servico') ? $this->Html->link($faturamento->ordens_de_servico->placa, ['controller' => 'OrdensDeServico', 'action' => 'view', $faturamento->ordens_de_servico->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status') ?></th>
            <td><?= h($faturamento->status) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Forma Pagamento') ?></th>
            <td><?= h($faturamento->forma_pagamento) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($faturamento->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Desconto') ?></th>
            <td><?= $this->Number->format($faturamento->desconto) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Data Pagamento') ?></th>
            <td><?= h($faturamento->data_pagamento) ?></td>
        </tr>
    </table>
</div>
