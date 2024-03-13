<?php require 'template/inc.top.html.php'; ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1><?= $stagiaire['prénom'] ?> <?= $stagiaire['nom'] ?></h1>
            <p><?= $stagiaire['pointure'] ?>cm</p>
            <p><?= $stagiaire['taille'] ?>cm</p>
        </div>
    </div>
</div>
<?php require 'template/inc.bottom.html.php'; ?>