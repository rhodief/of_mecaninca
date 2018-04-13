<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peca $peca
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $peca->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $peca->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Pecas'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Itens De Paca'), ['controller' => 'ItensDePaca', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Itens De Paca'), ['controller' => 'ItensDePaca', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pecas form large-9 medium-8 columns content">
    <?= $this->Form->create($peca) ?>
    <fieldset>
        <legend><?= __('Edit Peca') ?></legend>
        <?php
            echo $this->Form->control('descricao');
            echo $this->Form->control('marca');
            echo $this->Form->control('valor');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
