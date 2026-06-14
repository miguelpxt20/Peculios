<?php
/**
 * @var \App\View\AppView $this
 */
?>
<div class="contribuicoes form content">
    <h3>Lançamento de Contribuições em Lote</h3>
    <p>Selecione o mês de competência para gerar contribuições pendentes para todos os contratos vigentes.</p>

    <?= $this->Form->create(null, ['url' => ['action' => 'lancarLote']]) ?>
    <fieldset>
        <?= $this->Form->control('competencia', [
            'label' => 'Competência (Mês/Ano)',
            'type' => 'month',
            'required' => true,
        ]) ?>
    </fieldset>
    <div>
        <?= $this->Form->button('Lançar Contribuições', ['class' => 'button']) ?>
        <?= $this->Html->link('Cancelar', ['action' => 'index']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>