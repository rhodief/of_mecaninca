<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItensDeServico $itensDeServico
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $itensDeServico->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $itensDeServico->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Itens De Servico'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Servicos'), ['controller' => 'Servicos', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Servico'), ['controller' => 'Servicos', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itensDeServico form large-9 medium-8 columns content">
    <?= $this->Form->create($itensDeServico) ?>
    <fieldset>
        <legend><?= __('Edit Itens De Servico') ?></legend>
        <?php
            echo $this->Form->control('ordem_servico_id');
            echo $this->Form->control('servico_id', ['options' => $servicos]);
            echo $this->Form->control('quantidade');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
