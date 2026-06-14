<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Sinistro> $sinistros
 */
?>
<div class="sinistros index content">
    <?= $this->Html->link(__('New Sinistro'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Sinistros') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('contrato_id') ?></th>
                    <th><?= $this->Paginator->sort('tipo_evento') ?></th>
                    <th><?= $this->Paginator->sort('data_evento') ?></th>
                    <th><?= $this->Paginator->sort('data_abertura') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('valor_calculado') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sinistros as $sinistro): ?>
                <tr>
                    <td><?= $this->Number->format($sinistro->id) ?></td>
                    <td><?= $this->Number->format($sinistro->contrato_id) ?></td>
                    <td><?= h($sinistro->tipo_evento) ?></td>
                    <td><?= h($sinistro->data_evento) ?></td>
                    <td><?= h($sinistro->data_abertura) ?></td>
                    <td><?= h($sinistro->status) ?></td>
                    <td><?= $sinistro->valor_calculado === null ? '' : $this->Number->format($sinistro->valor_calculado) ?></td>
                    <td><?= h($sinistro->created) ?></td>
                    <td><?= h($sinistro->modified) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $sinistro->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sinistro->id]) ?>
                        <?= $this->Form->postLink(
                            __('Delete'),
                            ['action' => 'delete', $sinistro->id],
                            [
                                'method' => 'delete',
                                'confirm' => __('Are you sure you want to delete # {0}?', $sinistro->id),
                            ]
                        ) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>