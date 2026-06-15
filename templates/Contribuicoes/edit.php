<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contribuico $contribuicao
 */
?>
<div class="contribuicoes form content">
    <h3>Editar Contribuição</h3>
    <?= $this->Form->create($contribuicao) ?>
    <fieldset>
        <?= $this->Form->control('status', [
            'label' => 'Status',
            'type' => 'select',
            'options' => [
                'pendente'  => 'Pendente',
                'paga'      => 'Paga',
                'atrasada'  => 'Atrasada',
                'cancelada' => 'Cancelada',
            ]
        ]) ?>
        <?= $this->Form->control('data_pagamento', [
            'label' => 'Data de Pagamento (opcional)',
            'type' => 'date',
            'required' => false,
        ]) ?>
        <?= $this->Form->control('valor', ['label' => 'Valor']) ?>
    </fieldset>
    <div>
        <?= $this->Form->button('Salvar', ['class' => 'button']) ?>
        <?= $this->Html->link('Cancelar', ['action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>