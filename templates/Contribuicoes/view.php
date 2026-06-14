<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contribuico $contribuico
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Contribuico'), ['action' => 'edit', $contribuico->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Contribuico'), ['action' => 'delete', $contribuico->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contribuico->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Contribuicoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Contribuico'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contribuicoes view content">
            <h3><?= h($contribuico->status) ?></h3>
            <table>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($contribuico->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($contribuico->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Contrato Id') ?></th>
                    <td><?= $this->Number->format($contribuico->contrato_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor') ?></th>
                    <td><?= $this->Number->format($contribuico->valor) ?></td>
                </tr>
                <tr>
                    <th><?= __('Competencia') ?></th>
                    <td><?= h($contribuico->competencia) ?></td>
                </tr>
                <tr>
                    <th><?= __('Data Pagamento') ?></th>
                    <td><?= h($contribuico->data_pagamento) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($contribuico->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($contribuico->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>