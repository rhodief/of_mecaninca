<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensDePeca $itensDePeca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Itens De Peca'), ['action' => 'edit', $itensDePeca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Itens De Peca'), ['action' => 'delete', $itensDePeca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensDePeca->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Itens De Peca'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Itens De Peca'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Pecas'), ['controller' => 'Pecas', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Peca'), ['controller' => 'Pecas', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itensDePeca view large-9 medium-8 columns content">
    <h3><?= h($itensDePeca->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Peca') ?></th>
            <td><?= $itensDePeca->has('peca') ? $this->Html->link($itensDePeca->peca->id, ['controller' => 'Pecas', 'action' => 'view', $itensDePeca->peca->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itensDePeca->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ordem Servico Id') ?></th>
            <td><?= $this->Number->format($itensDePeca->ordem_servico_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quatidade') ?></th>
            <td><?= $this->Number->format($itensDePeca->quatidade) ?></td>
        </tr>
    </table>
</div>
