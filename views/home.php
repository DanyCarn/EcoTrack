<?php include_once("../views/header.php");
include("../controllers/LocalisationController.php")?>

<div class="flex flex-col items-center">

    <h2 class="text-2xl md:text-3xl p-4">Qualité de l'air à Lausanne</h2>

    <div class="w-9/10 md:w-auto border rounded-lg p-6">
        <p class="bg-[#E9D92C] rounded-lg p-1 text-xl w-fit justify-self-center">IQA : 60 (Modéré)</p>

        <div class="grid grid-cols-2 grid-rows-2 md:flex mt-5 place-items-center">

            <?php for ($i = 0; $i < 4; $i++) : ?>

            <div class="size-25 md:size-35 bg-[#E9D92C] rounded-full m-2">
                <p class="text-center pt-4 text-lg md:text-2xl font-semibold">PM 2.5</p>
                <p class="text-center md:pt-4 text-lg md:text-2xl">24.6µg/m3</p>
            </div>

            <?php endfor;   ?>


            <div class="grid grid-cols-3 grid-rows-2 gap-3 md:gap-0 md:grid-rows-4 md:grid-cols-2 md:border md:rounded-lg p-4 col-span-2">
                <p class="hidden md:block justify-self-center text-xl pb-4 col-span-2">Météo</p>
                
                    <img class="w-auto h-[30px] mr-3 justify-self-center col-1 row-1 md:col-1 md:row-2" src="../images/Temperature.png" alt="Image de thermostat">
                    <p class="text-xl col-1 row-2 md:col-2 md:row-2">16.5 C°</p>

                    <img class="w-auto h-[30px] mr-3 justify-self-center col-2 row-1 md:col-1 md:row-3" src="../images/Rain.png" alt="Image de thermostat">
                    <p class="text-xl col-2 row-2 md:col-2 md:row-3">0.00 mm</p>

                    <img class="w-auto h-[30px] mr-3 justify-self-center col-3 row-1 md:col-1 md:row-4" src="../images/Wind.png" alt="Image de thermostat">
                    <p class="text-xl col-3 row-2 md:col-2 md:row-4">8 Km/h</p>
            </div>
        </div>
    </div>
    <p class="text-xl md:text-3xl m-8">Connectez-vous afin d'avoir des informations sur d'autres villes</p>

    <a href="" class="md:hidden text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C]">Créer un compte</a>
    <a href="" class="md:hidden text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C] mt-7">Se connecter</a>
</div>

<?php include_once("../views/footer.php")?>