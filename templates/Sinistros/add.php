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
            <?= $this->Html->link(__('List Sinistros'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="sinistros form content">
            <?= $this->Form->create($sinistro) ?>
            <fieldset>
                <legend><?= __('Add Sinistro') ?></legend>
                <?php
                    echo $this->Form->control('contrato_id');
                    echo $this->Form->control('tipo_evento');
                    echo $this->Form->control('data_evento');
                    echo $this->Form->control('data_abertura');
                    echo $this->Form->control('status');
                    echo $this->Form->control('valor_calculado');
                    echo $this->Form->control('observacao');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
