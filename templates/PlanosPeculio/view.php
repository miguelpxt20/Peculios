<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosPeculio $planosPeculioEntity
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Planos Peculio'), ['action' => 'edit', $planosPeculioEntity->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Planos Peculio'), ['action' => 'delete', $planosPeculioEntity->id], ['confirm' => __('Are you sure you want to delete # {0}?', $planosPeculioEntity->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Planos Peculio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Planos Peculio'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="planosPeculio view content">
            <h3><?= h($planosPeculioEntity->codigo) ?></h3>
            <table>
                <tr>
                    <th><?= __('Codigo') ?></th>
                    <td><?= h($planosPeculioEntity->codigo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nome') ?></th>
                    <td><?= h($planosPeculioEntity->nome) ?></td>
                </tr>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($planosPeculioEntity->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($planosPeculioEntity->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Valor Cobertura') ?></th>
                    <td><?= $this->Number->format($planosPeculioEntity->valor_cobertura) ?></td>
                </tr>
                <tr>
                    <th><?= __('Percentual Contribuicao') ?></th>
                    <td><?= $this->Number->format($planosPeculioEntity->percentual_contribuicao) ?></td>
                </tr>
                <tr>
                    <th><?= __('Carencia Meses') ?></th>
                    <td><?= $this->Number->format($planosPeculioEntity->carencia_meses) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($planosPeculioEntity->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($planosPeculioEntity->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ativo') ?></th>
                    <td><?= $planosPeculioEntity->ativo ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Descricao') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($planosPeculioEntity->descricao)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>