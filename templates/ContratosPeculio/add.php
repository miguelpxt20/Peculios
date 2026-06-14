<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContratosPeculio $contratosPeculioEntity
 * @var \Cake\Collection\CollectionInterface|string[] $associados
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Contratos Peculio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contratosPeculio form content">
            <?= $this->Form->create($contratosPeculioEntity) ?>
            <fieldset>
                <legend><?= __('Add Contratos Peculio') ?></legend>
                <?php
                    echo $this->Form->control('associado_id', ['options' => $associados]);
                    echo $this->Form->control('plano_id');
                    echo $this->Form->control('numero_contrato');
                    echo $this->Form->control('data_inicio');
                    echo $this->Form->control('data_fim', ['empty' => true]);
                    echo $this->Form->control('status');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
