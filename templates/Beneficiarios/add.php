<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Beneficiario $beneficiario
 */
?>
<div class="beneficiarios form content">
    <h3>Novo Beneficiário</h3>
    <?= $this->Form->create($beneficiario) ?>
    <fieldset>
        <?= $this->Form->control('contrato_id', [
            'label' => 'Contrato',
            'options' => $contratos,
            'empty' => 'Selecione um contrato',
        ]) ?>
        <?= $this->Form->control('nome', ['label' => 'Nome Completo']) ?>
        <?= $this->Form->control('cpf', ['label' => 'CPF (000.000.000-00)']) ?>
        <?= $this->Form->control('parentesco', ['label' => 'Parentesco']) ?>
        <?= $this->Form->control('percentual', ['label' => 'Percentual (%)']) ?>
    </fieldset>
    <div>
        <?= $this->Form->button('Salvar', ['class' => 'button']) ?>
        <?= $this->Html->link('Cancelar', ['action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>