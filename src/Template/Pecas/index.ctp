<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Peca[]|\Cake\Collection\CollectionInterface $pecas
 */
?>

<div class="d-flex">
  <div class="mr-auto p-2"><h1>Peças</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'pecas', 'action'=>"add"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cadastrar Peças</a></div>
</div>


    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('marca') ?></th>
                <th scope="col"><?= $this->Paginator->sort('valor') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pecas as $peca): ?>
            <tr>
                <td><?= $this->Number->format($peca->id) ?></td>
                <td><?= h($peca->marca) ?></td>
                <td><?= h($peca->valor) ?></td>
                <td><?= h($peca->created) ?></td>
                <td><?= h($peca->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $peca->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $peca->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $peca->id], ['confirm' => __('Are you sure you want to delete # {0}?', $peca->id)]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Página {{page}} of {{pages}}, mostrando {{current}} registro(s) de um total de {{count}}')]) ?></p>
    </div>

