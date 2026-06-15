<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ContratosPeculio $contrato
 */
?>
<div class="contratos-peculio form content">
    <h3>Editar Contrato</h3>
    <?= $this->Form->create($contrato) ?>
    <fieldset>
        <?= $this->Form->control('associado_id', [
            'label' => 'Associado',
            'options' => $associados,
            'empty' => 'Selecione um associado',
        ]) ?>
        <?= $this->Form->control('plano_id', [
            'label' => 'Plano de Pecúlio',
            'options' => $planos,
            'empty' => 'Selecione um plano',
        ]) ?>
        <?= $this->Form->control('numero_contrato', ['label' => 'Número do Contrato']) ?>
        <?= $this->Form->control('data_inicio', ['label' => 'Data de Início', 'type' => 'date']) ?>
        <?= $this->Form->control('data_fim', ['label' => 'Data de Fim (opcional)', 'type' => 'date', 'required' => false]) ?>
        <?= $this->Form->control('status', [
            'label' => 'Status',
            'type' => 'select',
            'options' => [
                'vigente'    => 'Vigente',
                'suspenso'   => 'Suspenso',
                'encerrado'  => 'Encerrado',
                'sinistrado' => 'Sinistrado',
            ]
        ]) ?>
    </fieldset>
    <div>
        <?= $this->Form->button('Salvar', ['class' => 'button']) ?>
        <?= $this->Html->link('Cancelar', ['action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>