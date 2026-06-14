<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sinistro $sinistro
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sinistro'), ['action' => 'edit', $sinistro->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sinistro'), ['action' => 'delete', $sinistro->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sinistro->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sinistros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sinistro'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sinistros view content">
            <h3><?= h($sinistro->tipo_evento) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo Evento') ?></th>
                    <td><?= h($sinistro->tipo_evento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($sinistro->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sinistro->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrato Id') ?></th>
                    <td><?= $this->Number->format($sinistro->contrato_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Calculado') ?></th>
                    <td><?= $sinistro->valor_calculado === null ? '' : $this->Number->format($sinistro->valor_calculado) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Evento') ?></th>
                    <td><?= h($sinistro->data_evento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Abertura') ?></th>
                    <td><?= h($sinistro->data_abertura) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sinistro->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sinistro->modified) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Observacao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($sinistro->observacao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>