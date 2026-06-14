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
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $planosPeculioEntity->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $planosPeculioEntity->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Planos Peculio'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="planosPeculio form content">
            <?= $this->Form->create($planosPeculioEntity) ?>
            <fieldset>
                <legend><?= __('Edit Planos Peculio') ?></legend>
                <?php
                    echo $this->Form->control('codigo');
                    echo $this->Form->control('nome');
                    echo $this->Form->control('descricao');
                    echo $this->Form->control('tipo');
                    echo $this->Form->control('valor_cobertura');
                    echo $this->Form->control('percentual_contribuicao');
                    echo $this->Form->control('carencia_meses');
                    echo $this->Form->control('ativo');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
