<?php

require 'entete.php';
?>



<div>
</div>

<?php 
    require_once 'partials/liste-categorie.php';
?>

<div class="my-5 p-10">
    <div class="flex justify-between items-center mx-auto">
        <div>
            <h1 class="text-primary font-bold text-xl">Liste des articles</h1>
        </div>
        <div class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">
            <a href="/archi/site/article/create" >Ajouter un article</a>
        </div>
    
    </div>


    <div class="w-full scroll mx-auto ">
    
        <?php if ( count($articles) == 0) { ?>
            <div class="text-center text-primary">Aucun article trouvé</div>
        <?php }else { ?>
    
        <table class="table mx-auto rounded w-full">
            <tr class="px-2 bg-slate-200 rounded">
                <th class="px-2 py-2 rounded" >Titre</th>
                <th class="px-2 py-2 max-w-2xl" >Contenu</th>
                <th class="px-2 py-2 noWrap" >Date de création</th>
                <th class="px-2 py-2 noWrap" >Date de modification</th>
                <th class="px-2 py-2 noWrap"></th>
            </tr>
            <?php foreach($articles as $article): ?>
            <tr class="article border border-gray-200">
                <td class="px-2 py-2 border border-gray-200"><?= $article->getTitre() ?></td>
                <td class="py-2 px-2 border border-gray-200 max-w-2xl " ><?= $article->getContenu() ?></td>
                <td class="py-2 px-2 border border-gray-200"><?= $article->getDateCreation() ?></td>
                <td class="py-2 px-2 border border-gray-200"><?= $article->getDateModification() ?></td>
                <td class="py-2 px-2 border border-gray-200">
                    <div class="flex justify-around text-sm">
                        <div class="btn btn-primary mx-1 rounded my-3 hover:shadow">
                            <a href="/archi/site/article/<?= $article->getId() ?>/show" >voir</a>
                        </div>
                        <div class="btn btn-primary mx-1 rounded my-3 hover:shadow">
                            <a href="/archi/site/article/<?= $article->getId() ?>/edit" >Modifier</a>
                        </div>
                        <div class="btn btn-primary mx-1 rounded my-3 hover:shadow">
                            <a href="/archi/site/article/<?= $article->getId() ?>/delete" >Supprimer</a>
                        </div>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    
        <?php } 
        ?>
       <div class="pagination mt-5 flex justify-end">
            <?php if ($page > 1): ?>
                <a  href="/archi/site/article?page=<?= ($page - 1) ?>&size=<?= $size ?>" class="btn btn-primary bg-slate-200 hover:bg-slate-300 py-1 px-3 rounded mx-2 ">Précédent</a>
            <?php endif; ?>

            <?php if (($page - 1) * $size + count($articles) < $count): ?>
                <a href="/archi/site/article?page=<?= ($page + 1) ?>&size=<?= $size ?>" class="btn btn-primary bg-slate-200 hover:bg-slate-300 py-1 px-3 rounded mx-2">Suivant</a>
            <?php endif; ?>
        </div>



    
    
    </div>

</div>


<?php
require 'footer.php';

