<?php
    require 'vue/layout/head.php';
?>    

<form action="http://localhost/archi/site/auth/loginProcess" method="post">

    <!-- fait un effort dans les styles et en plus tu as accès a tailwind -->
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="w-96 bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6">Connexion</h1>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Mot de passe</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
            </div>
            <button type="submit" class="w-full bg-indigo-500 text-white font-semibold p-2 rounded-md">Se connecter</button>
        </div>
    </div>
    
</form>

    


<?php
    require 'vue/layout/footer.php';