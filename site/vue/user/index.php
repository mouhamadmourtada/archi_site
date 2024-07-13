<?php

require 'entete.php';
?>



<div>
</div>


<div class="my-5 p-10">
    <div class="flex justify-between items-center mx-auto">
        <div>
            <h1 class="text-primary font-bold text-xl">Liste des utuilisateur</h1>
        </div>
        <div class="btn btn-primary bg-slate-200 hover:slate-300 text-primary py-1 px-3 rounded my-3 hover:shadow">
            <a href="/archi/site/site/user/create" >nouveau</a>
        </div>
    
    </div>


    <div class="w-full scroll mx-auto ">
    
        <?php if ( count($users) == 0) { ?>
            <div class="text-center text-primary">Aucun utilisateur trouvé</div>
        <?php }else { ?>
    
            <section class="container px-4 mx-auto">
                <div class="flex flex-col">
                    <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                            <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                    <thead class="bg-gray-50 dark:bg-gray-800">
                                        <tr>
                                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center gap-x-3">
                                                    <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700">
                                                    <button class="flex items-center gap-x-2">
                                                        <span>User ID</span>
                                                    </button>
                                                </div>
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Name
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Email
                                            </th>

                                            <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                                Role
                                            </th>

                                            <th scope="col" class="relative py-3.5 px-4">
                                                <span class="sr-only">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                        
                                        <!-- il faut boucler sur $users -->
                                    <?php
                                    foreach($users as $user){
                                    ?>
                                       
                                       <tr>
                                           <td class="px-4 py-4 text-sm font-medium text-gray-700 dark:text-gray-200 whitespace-nowrap">
                                               <div class="inline-flex items-center gap-x-3">
                                                   <input type="checkbox" class="text-blue-500 border-gray-300 rounded dark:bg-gray-900 dark:ring-offset-gray-900 dark:border-gray-700">
                                                   <span>
                                                    <?=$user->getId()?>
                                                   </span>
                                               </div>
                                           </td>
                                           <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            <?= $user->getNom() ?>
                                           </td>
                                           <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap"><?= $user->getEmail()?></td>
                                           <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                                <?= $user->getRole() ?>
                                           </td>
                                           <td class="px-4 py-4 text-sm whitespace-nowrap w-48">
                                               <div class="flex items-center gap-x-6">
                                                    <button class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                        <a href= <?="/archi/site/user/".$user->getId()."/show"?>>
                                                            detail 
                                                        </a>
                                                   </button>
                                                   <button class="text-gray-500 transition-colors duration-200 dark:hover:text-indigo-500 dark:text-gray-300 hover:text-indigo-500 focus:outline-none">
                                                        <a href= <?="/archi/site/user/".$user->getId()."/edit"?>>
                                                            Edit 
                                                        </a>
                                                   </button>
                                                   <button class="text-red-500 transition-colors duration-200 hover:text-red-600 focus:outline-none">
                                                        <a href= <?="/archi/site/user/".$user->getId()."/delete"?>>
                                                            delete
                                                        </a>

                                                   </button>
                                               </div>
                                           </td>
                                       </tr>

                                    <?php } ?>



                                        <!-- Add more rows as needed -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

    
        <?php } ?>
    
    
    </div>

</div>


<?php
require 'footer.php';

