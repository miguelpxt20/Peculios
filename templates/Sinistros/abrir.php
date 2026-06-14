<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sinistro $sinistro
 * @var \App\Model\Entity\ContratosPeculio $contrato
 * @var string $observacao
 */
?>
<div class="sinistros form content">
    <h3>Abertura de Sinistro</h3>

    <div style="background:#f8f9fa; padding:15px; border-radius:5px; margin-bottom:20px;">
        <h4>Dados do Contrato</h4>
        <p><strong>Número:</strong> <?= h($contrato->numero_contrato) ?></p>
        <p><strong>Plano:</strong> <?= h($contrato->planos_peculio->nome) ?></p>
        <p><strong>Valor de Cobertura:</strong> R$ <?= number_format($contrato->planos_peculio->valor_cobertura, 2, ',', '.') ?></p>
        <p><strong>Carência:</strong> <?= $contrato->planos_peculio->carencia_meses ?> meses</p>
    </div>

    <?php if (!empty($observacao)): ?>
    <div style="background:#fff3cd; border:1px solid #ffc107; padding:15px; border-radius:5px; margin-bottom:20px;">
        <strong>⚠️ Atenção:</strong> <?= h($observacao) ?>
    </div>
    <?php endif; ?>

    <?= $this->Form->create($sinistro, ['url' => ['action' => 'abrir', $contrato->id]]) ?>
    <fieldset>
        <?= $this->Form->control('tipo_evento', [
            'label' => 'Tipo de Evento',
            'type' => 'select',
            'options' => [
                'obito'                  => 'Óbito',
                'invalidez'              => 'Invalidez',
                'desligamento_voluntario' => 'Desligamento Voluntário',
            ],
            'empty' => 'Selecione o tipo de evento',
        ]) ?>
        <?= $this->Form->control('data_evento', [
            'label' => 'Data do Evento',
            'type' => 'date',
        ]) ?>
    </fieldset>
    <div>
        <?= $this->Form->button('Abrir Sinistro', ['class' => 'button']) ?>
        <?= $this->Html->link('Cancelar', ['controller' => 'ContratosPeculio', 'action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>