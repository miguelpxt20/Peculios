<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PlanosPeculio $planosPeculio
 */
?>
<div class="planos-peculio form content">
    <h3>Editar Plano</h3>
    <?= $this->Form->create($planosPeculio) ?>
    <fieldset>
        <?= $this->Form->control('codigo', ['label' => 'Código']) ?>
        <?= $this->Form->control('nome', ['label' => 'Nome']) ?>
        <?= $this->Form->control('descricao', ['label' => 'Descrição']) ?>
        <?= $this->Form->control('tipo', [
            'label' => 'Tipo',
            'type' => 'select',
            'options' => [
                'individual' => 'Individual',
                'familiar'   => 'Familiar',
            ]
        ]) ?>
        <?= $this->Form->control('valor_cobertura', ['label' => 'Valor de Cobertura']) ?>
        <?= $this->Form->control('percentual_contribuicao', ['label' => '% Contribuição (ex: 0.0250)']) ?>
        <?= $this->Form->control('carencia_meses', ['label' => 'Carência (meses)']) ?>
        <?= $this->Form->control('ativo', ['label' => 'Ativo', 'type' => 'checkbox']) ?>
    </fieldset>
    <div>
        <?= $this->Form->button('Salvar', ['class' => 'button']) ?>
        <?= $this->Html->link('Cancelar', ['action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>