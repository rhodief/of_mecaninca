<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensDePeca $itensDePeca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itensDePeca->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itensDePeca->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Itens De Peca'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pecas'), ['controller' => 'Pecas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Peca'), ['controller' => 'Pecas', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itensDePeca form large-9 medium-8 columns content">
    <?= $this->Form->create($itensDePeca) ?>
    <fieldset>
        <legend><?= __('Edit Itens De Peca') ?></legend>
        <?php
            echo $this->Form->control('ordem_servico_id');
            echo $this->Form->control('peca_id', ['options' => $pecas]);
            echo $this->Form->control('quatidade');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
