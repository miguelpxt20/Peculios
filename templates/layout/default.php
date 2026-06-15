<?php
/**
 * @var \App\View\AppView $this
 */
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Pecúlios — <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>
    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <nav class="top-nav" style="display:flex; justify-content:space-between; align-items:center; padding:10px 20px;">
    <div class="top-nav-title">
        <a href="<?= $this->Url->build('/') ?>" style="font-weight:bold; font-size:18px;">Pecúlios Militares</a>
    </div>
    <div class="top-nav-links" style="display:flex; gap:20px;">
        <a href="/associados">Associados</a>
        <a href="/contratos-peculio">Contratos</a>
        <a href="/sinistros">Sinistros</a>
        <a href="/contribuicoes/lancar-lote">Contribuições</a>
        <a href="/planos-peculio">Planos</a>
    </div>
</nav>
    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <footer>
    </footer>
</body>
</html>