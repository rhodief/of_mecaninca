<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Faturamento $faturamento
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $faturamento->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $faturamento->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Faturamento'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ordens De Servico'), ['controller' => 'OrdensDeServico', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="faturamento form large-9 medium-8 columns content">
    <?= $this->Form->create($faturamento) ?>
    <fieldset>
        <legend><?= __('Edit Faturamento') ?></legend>
        <?php
            echo $this->Form->control('ordem_de_servico_id', ['options' => $ordensDeServico]);
            echo $this->Form->control('status');
            echo $this->Form->control('data_pagamento');
            echo $this->Form->control('forma_pagamento');
            echo $this->Form->control('desconto');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
