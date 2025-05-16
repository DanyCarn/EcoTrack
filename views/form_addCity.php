<?php 
/**
 * Auteur: Dany Carneiro Jeremias
 * Date: 16.05.2025
 * Description: Formulaire d'ajout de ville
 */

 $error = $data['error'];
?>

<div class="flex flex-col items-center">
    <form action="/addCity" method="POST" class="flex flex-col items-center">
        <div class="mt-5">
            <label for="city" class="text-xl align-self-center">Ville</label><br>
            <input type="text" name="city" required class="border-1 rounded-lg w-60">
        </div>

        <div class="mt-5">
            <label for="country" class="text-xl">Pays</label><br>
            <input type="text" name="country" required class="border-1 rounded-lg w-60">
        </div>

        <input type="submit" value="Ajouter ville" class="border-1 rounded-lg m-6 w-40 p-2 bg-[#69A33D] hover:bg-[#587D3C] hover:cursor-pointer text-xl">
    </form>

    <?php if ($error) :?>
        <p class="text-red-500 text-lg">La ville que vous souhaitez ajouter n'a pas été trouvée.</p>
    <?php endif;?>
</div>