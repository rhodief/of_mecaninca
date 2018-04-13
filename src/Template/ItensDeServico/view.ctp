<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensDeServico $itensDeServico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Itens De Servico'), ['action' => 'edit', $itensDeServico->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Itens De Servico'), ['action' => 'delete', $itensDeServico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensDeServico->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Itens De Servico'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Itens De Servico'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Servicos'), ['controller' => 'Servicos', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Servico'), ['controller' => 'Servicos', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="itensDeServico view large-9 medium-8 columns content">
    <h3><?= h($itensDeServico->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Servico') ?></th>
            <td><?= $itensDeServico->has('servico') ? $this->Html->link($itensDeServico->servico->id, ['controller' => 'Servicos', 'action' => 'view', $itensDeServico->servico->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($itensDeServico->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Ordem Servico Id') ?></th>
            <td><?= $this->Number->format($itensDeServico->ordem_servico_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantidade') ?></th>
            <td><?= $this->Number->format($itensDeServico->quantidade) ?></td>
        </tr>
    </table>
</div>
