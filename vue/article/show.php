<?php
// require './base.php';
require "entete.php";

?>
<div>
    <!--detail pour article fait un effort -->
    <div class="my-5 p-10">
        <div class="flex justify-between items-center mx-auto">
            <div>
                <h1 class="text-primary font-bold text-xl">Détail de l'article</h1>
            </div>
            <div>
                <!-- bouton pour retour -->
                <button>
                    <a href="/archi/article" class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">Retour</a>
                </button>
            </div>
        </div>
        <div class="border border-gray-200 shadow-xl mt-2 min-h-96 p-5">
            <div class="flex flex-wrap justify-around w-full mb-10">
                <div class="flex w-96 flex-col">
                    <label for="titre" class="text-primary font-bold">Titre</label>
                    <input type="text" name="titre" id="titre" value="<?= $article->getTitre() ?>" class="border border-gray-200 rounded p-2" readonly>
                </div>
                <div class="flex w-96 flex-col">
                    <label for="categorie" class="text-primary font-bold">Categorie</label>
                    <input type="text" name="categorie" id="categorie" value="<?= $article->getCategorie()->getLibelle() ?>" class="border border-gray-200 rounded p-2" readonly>
                </div>
            </div>
            <div class="flex flex-col">
                <label for="contenu" class="text-primary font-bold">Contenu</label>
                <textarea rows="10" name="contenu" id="contenu" class="border border-gray-200 rounded p-2" readonly><?= $article->getContenu() ?></textarea>
            </div>
        </div>
    </div>
</div>

<?php
require "footer.php";