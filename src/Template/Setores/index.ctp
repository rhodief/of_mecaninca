<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Setor[]|\Cake\Collection\CollectionInterface $setores
 */
?>
<div class="d-flex">
  <div class="mr-auto p-2"><h1>Setores</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'setores', 'action'=>"add"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cadastrar Setor</a></div>
</div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('nome') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor_hora') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($setores as $setor): ?>
            <tr>
                <td><?= $this->Number->format($setor->id) ?></td>
                <td><?= h($setor->nome) ?></td>
                <td><?= $this->Number->format($setor->valor_hora) ?></td>
                <td><?= h($setor->created) ?></td>
                <td><?= h($setor->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $setor->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $setor->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $setor->id], ['confirm' => __('Are you sure you want to delete # {0}?', $setor->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('Primeira')) ?>
            <?= $this->Paginator->prev('< ' . __('Anterior')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('Próxima') . ' >') ?>
            <?= $this->Paginator->last(__('Última') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, mostrando {{current}} registro(s) de um total {{count}}')]) ?></p>
    </div>

