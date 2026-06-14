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
            <?= $this->Html->link(__('List Contribuicoes'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="contribuicoes form content">
            <?= $this->Form->create($contribuico) ?>
            <fieldset>
                <legend><?= __('Add Contribuico') ?></legend>
                <?php
                    echo $this->Form->control('contrato_id');
                    echo $this->Form->control('competencia');
                    echo $this->Form->control('valor');
                    echo $this->Form->control('status');
                    echo $this->Form->control('data_pagamento', ['empty' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
