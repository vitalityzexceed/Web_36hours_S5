<section class="scroll-section">
    <div class="container scstyle-1 sc-overflow">
        <article>
            <div class="row">
                <div class="col">
                    <?php
                        foreach ($listecategories as $listecategorie) { ?>
                            <h3 class="mb-2"><?= ucfirst($listecategorie["nom"]);?></h3>
                        <?php }
                    ?>
                </div>
            </div>
        </article>
    </div>
    <form method="post" action="<?= site_url("controlleur_user/traitement_insertion_categorie");?>" class="mb-3 mx-auto col-6">
        <label for="formFileMultiple" class="form-label">Ajouter une nouvelle catégorie :</label>
        <input name="nom" class="form-control" type="text" id="formFileMultiple">
        <div class="mb-3"><button class="btn d-block w-100" type="submit">Ajouter</button></div>
    </form>
</section>
