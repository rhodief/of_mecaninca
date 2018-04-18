<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Servico[]|\Cake\Collection\CollectionInterface $servicos
 */
?>

<div class="d-flex">
  <div class="mr-auto p-2"><h1>Serviços</h1></div>
  <div class="p-2"><a href="<?= $this->Url->Build(['controller'=>'servicos', 'action'=>"add"]) ?>" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Cadastrar Serviço</a></div>
</div>


    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('descricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('setor_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('horas') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($servicos as $servico): ?>
            <tr>
                <td><?= $this->Number->format($servico->id) ?></td>
                <td><?= h($servico->descricao) ?></td>
                <td><?= $servico->has('setor') ? $this->Html->link($servico->setor->nome, ['controller' => 'Setores', 'action' => 'view', $servico->setor->id]) : '' ?></td>
                <td><?= $this->Number->format($servico->horas) ?></td>
                <td><?= h($servico->created) ?></td>
                <td><?= h($servico->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $servico->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $servico->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $servico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $servico->id)]) ?>
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
