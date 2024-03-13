<?php require 'template/inc.top.html.php'; ?>

    <div class="container">

        <h1 class="mb-4">Stagiaires</h1>

        <?php if(isset($resultCount)): ?>
        <h2 class="mb-4"><?= $resultCount; ?> résultats correspondants à votre recherche "<?= $search ?>".</h2>
        <?php endif; ?>

        <div class="row">
            <?php foreach($stagiaires as $indice => $stagiaire): ?>
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card h-100" 
                    data-aos="fade-down" 
                    data-aos-delay="<?= ($indice + 1) * 100 ?>">
                    <div class="card-body">
                        <small>#<?= $stagiaire['id'] ?></small>
                        <h3><?= $stagiaire['nom'] ?> <?= $stagiaire['prénom'] ?></h3>
                        <p><?= $stagiaire['taille'] ?> cm</p>
                        <p><?= $stagiaire['pointure'] ?> cm</p>
                    </div>
                    <div class="card-footer">
                        <a href="/details.php?id=<?= $stagiaire['id'] ?>" class="btn btn-primary">Voir details</a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                                              <!-- Le ? signifie alors et le : signifie sinon (ternaire) -->
                <li class="page-item <?= $currentPage - 1 <= 0 ? 'disabled' : '' ?>">
                    <a class="page-link" href="<?= !empty($search) ? '/?search=' . $search . '&page=' . $currentPage - 1 : '/?page=' . $currentPage + 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>

                    <?php for($i=1;$i<=$nbPages;$i++) :?>
                    <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                        <a class="page-link" href="<?= !empty($search) ? '/?search=' . $search . '&page=' . $i : '/?page='.$i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>

                    <li class="page-item <?= $currentPage + 1 >= $nbPages ? 'disabled' : '' ?>">
                        <a class="page-link" href="<?= !empty($search) ? '/?search=' . $search . '&page=' . $currentPage + 1 : '/?page=' . $currentPage + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        

    </div>
<?php require 'template/inc.bottom.html.php'; ?>