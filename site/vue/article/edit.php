<?php

require 'entete.php';
?>



<div>
</div>



<div>
    <div class="my-5 p-5">
        <div class="flex justify-between items-center mx-auto">
            <div>
                <h1 class="text-primary font-bold text-xl">Modifier un article</h1>
            </div>
        </div>
       
        <div class="border border-gray-200 shadow-xl p-5 mt-2 min-h-96">
            <!-- la vue pour l'édition d'un article un article a un ttire, categorie et un content -->
            <form action="/archi/site/article/update" method="POST" class="flex flex-col">
                <!-- input hidden pour l'id -->
                <input type="hidden" name="id" value="<?= $article->getId() ?>">
                <div class="flex justify-around flex-wrap">
                    <div class="flex w-96 flex-col">
                        <label for="titre" class="text-primary font-bold">titre</label>
                        <input type="text" name="titre" id="titre" class="border border-gray-200 rounded p-2" value="<?= $article->getTitre() ?>">
                    </div>
                    <div class="flex w-96 flex-col">
                        <label for="categorie" class="text-primary font-bold">Categorie</label>
                        <select name="categorie" id="categorie" class="border border-gray-200 rounded p-2">
                            <?php foreach($categories as $categorie): ?>
                                <option value="<?=$categorie->getId()?>"><?=$categorie->getLibelle()?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="flex flex-col">
                    <label for="contenu" class="text-primary font-bold">Contenu</label>
                    <textarea rows="10" name="contenu" id="contenu" class="border border-gray-200 rounded p-2"><?= $article->getContenu() ?></textarea>
                </div>

                <div class="flex justify-end gap-2 mt-5">
                    <!-- bouton pour annuler -->
                    <a href="/archi/site/article/<?= $article->getId() ?>/show" class="btn btn-red-500 bg-slate-200 hover:red-700 text-primary py-1 px-5 rounded my-3 hover:shadow-xl">Annuler</a>
                    <button type="submit" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-5 rounded my-3 hover:shadow-xl">Modifier</button>
                </div>
            </form>
        
        </div>
    </div>


</div>



<?php
require 'footer.php';