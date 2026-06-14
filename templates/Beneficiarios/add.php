<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiario $beneficiario
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Beneficiarios'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="beneficiarios form content">
            <?= $this->Form->create($beneficiario) ?>
            <fieldset>
                <legend><?= __('Add Beneficiario') ?></legend>
                <?php
                    echo $this->Form->control('contrato_id');
                    echo $this->Form->control('nome');
                    echo $this->Form->control('cpf');
                    echo $this->Form->control('parentesco');
                    echo $this->Form->control('percentual');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
