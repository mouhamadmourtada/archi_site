<?php
// require './base.php';
require "entete.php";

?>
<div>
  
    <div class="my-5 p-10">
        <div class="flex justify-between items-center mx-auto">
            <div>
                <h1 class="text-primary font-bold text-xl">Liste des categories</h1>
            </div>
            <div class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">
                <a href="/archi/site/category/create" >Ajouter une categorie</a>
            </div>
        
        </div>

        <div class="w-full scroll mx-auto ">
        
            <?php if ( count($categories) == 0) { ?>
                <div class="text-center text-primary">Aucune categorie trouvée</div>
            <?php }else { ?>
        
            <table class="table mx-auto rounded w-full">
                <tr class="px-2 bg-slate-200 rounded">
                    <th class="px-2 py-2 rounded" >ID</th>
                    <th class="px-2 py-2 rounded" >Libelle</th>
                   
                    <th class="px-2 py-2 w-32 noWrap"></th>
                </tr>
                <?php foreach($categories as $categorie): ?>
                <tr class="article border border-gray-200">
                    <td class="px-2 py-2 border border-gray-200"><?= $categorie->getId() ?></td>
                    <td class="px-2 py-2 border border-gray-200"><?= $categorie->getLibelle() ?? " -" ?></td>
                   
                    <td class="py-2 px-2 border border-gray-200 w-32">
                        <div class="flex justify-around text-sm">
                            
                            <div class="btn btn-primary bg-gray-200 hover:bg-gray-300 py-1 px-3 mx-1 rounded my-3 hover:shadow">
                                <a href="/archi/site/category/<?= $categorie->getId() ?>/edit" >Modifier</a>
                            </div>
                            <div class="btn btn-primary bg-red-500 hover:bg-red-700 text-white px-3 py-1 rounded mx-1 rounded my-3 hover:shadow">
                                <a href="/archi/site/category/<?= $categorie->getId() ?>/delete" >Supprimer</a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </table>
            <?php } ?>
        </div>
        </div>
</div>

<?php
require "footer.php";

