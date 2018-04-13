<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peca $peca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Peca'), ['action' => 'edit', $peca->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Peca'), ['action' => 'delete', $peca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peca->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pecas'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Peca'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Itens De Paca'), ['controller' => 'ItensDePaca', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Itens De Paca'), ['controller' => 'ItensDePaca', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pecas view large-9 medium-8 columns content">
    <h3><?= h($peca->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Marca') ?></th>
            <td><?= h($peca->marca) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Valor') ?></th>
            <td><?= h($peca->valor) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($peca->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($peca->created) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Modified') ?></th>
            <td><?= h($peca->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Descricao') ?></h4>
        <?= $this->Text->autoParagraph(h($peca->descricao)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Itens De Paca') ?></h4>
        <?php if (!empty($peca->itens_de_paca)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Ordem Servico Id') ?></th>
                <th scope="col"><?= __('Peca Id') ?></th>
                <th scope="col"><?= __('Quatidade') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($peca->itens_de_paca as $itensDePaca): ?>
            <tr>
                <td><?= h($itensDePaca->id) ?></td>
                <td><?= h($itensDePaca->ordem_servico_id) ?></td>
                <td><?= h($itensDePaca->peca_id) ?></td>
                <td><?= h($itensDePaca->quatidade) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ItensDePaca', 'action' => 'view', $itensDePaca->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ItensDePaca', 'action' => 'edit', $itensDePaca->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ItensDePaca', 'action' => 'delete', $itensDePaca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itensDePaca->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
