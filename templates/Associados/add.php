<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Associado $associado
 */
?>
<div class="associados form content">
    <h3>Novo Associado</h3>
    <?= $this->Form->create($associado) ?>
    <fieldset>
        <?= $this->Form->control('matricula', ['label' => 'Matrícula']) ?>
        <?= $this->Form->control('nome', ['label' => 'Nome Completo']) ?>
        <?= $this->Form->control('cpf', ['label' => 'CPF (000.000.000-00)']) ?>
        <?= $this->Form->control('patente', ['label' => 'Patente']) ?>
        <?= $this->Form->control('situacao', [
            'label' => 'Situação',
            'type' => 'select',
            'options' => [
                'ativo' => 'Ativo',
                'inativo' => 'Inativo',
                'reserva' => 'Reserva',
                'reformado' => 'Reformado',
            ]
        ]) ?>
        <?= $this->Form->control('data_ingresso', ['label' => 'Data de Ingresso', 'type' => 'date']) ?>
        <?= $this->Form->control('data_nascimento', ['label' => 'Data de Nascimento', 'type' => 'date']) ?>
    </fieldset>
    <div>
        <?= $this->Form->button('Salvar', ['class' => 'button']) ?>
        <?= $this->Html->link('Cancelar', ['action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>