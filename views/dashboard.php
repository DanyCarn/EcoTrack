<?php
/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 15.05.2025
 * Description: Page de tableau de bord de l'utilisateur.
 */
?>
<div class="flex md:hidden justify-center mt-3 mb-4">
    <p class="text-3xl font-semibold">Tableau de bord</p>
</div>

<div class="flex flex-wrap justify-center">

    <div class="flex flex-col border-1 rounded-lg md:m-2 w-7/10 md:w-auto">
        <div class="flex flex-col md:flex-row justify-around mt-3 h-fit">
            <p class="text-2xl font-bold ml-3 md:ml-0">Lausanne</p>
            <p class="border-1 rounded-lg bg-[#E9D92C] text-xl w-fit md:w-auto h-fit p-1 ml-2 md:ml-0">IQA: 60 (Modéré)</p>
        </div>
        <div class="flex flex-col md:grid md:grid-cols-2">
            <div class="grid grid-cols-2 grid-rows-2">
                <?php for ($i = 0; $i < 4; $i++) : ?>
                <div class="flex flex-col items-center m-3">
                    <p class="text-lg font-semibold">PM 2.5</p>
                    <div class="flex flex-col items-center justify-center bg-[#E9D92C] size-20 rounded-full">
                        <p class="text-lg">24.6</p>
                        <p class="text-lg">µg/m3</p>
                    </div>
                </div>
                <?php endfor;?>
            </div>
            <div class="grid grid-rows-2 grid-cols-3 md:grid-rows-3 md:grid-cols-2 md:h-fit md:gap-4 md:self-center mt-3 md:mt-0">
                <div class="col-1 row-1 md:col-auto md:row-auto h-fit w-fit justify-self-center md:justify-self-end">
                    <img class="w-auto h-[32px] md:h-[35px] justify-self-center" src="../public/images/Temperature.png" alt="température">
                </div>
                <p class="col-1 row-2 md:col-auto md:row-auto justify-self-center md:justify-self-start text-lg h-fit">20 °C</p>

                <div class="col-2 row-1 md:col-auto md:row-auto h-fit w-fit justify-self-center md:justify-self-end">
                    <img class="w-auto h-[32px] md:h-[35px] justify-self-center" src="../public/images/Wind.png" alt="vitesse du vent">
                </div>
                <p class="col-2 row-2 md:col-auto md:row-auto justify-self-center md:justify-self-start text-lg h-fit">2 km/h</p>

                <div class="col-3 row-1 md:col-auto md:row-auto h-fit w-fit justify-self-center md:justify-self-end">
                    <img class="w-auto h-[32px] md:h-[35px] justify-self-center" src="../public/images/Rain.png" alt="précipitations">
                </div>
                <p class="col-3 row-2 md:col-auto md:row-auto justify-self-center md:justify-self-start text-lg h-fit">0.00 mm</p>

            </div>
        </div>

        <a href="" class="bg-[#F94130] hover:bg-[#D5382A] border-1 rounded-lg w-fit text-xl self-end mr-5 mb-1 p-1">Supprimer</a>
    </div>

    <div class="flex items-center">
        <a href="/addCityForm" class="border-1 rounded-lg bg-[#69A33D] hover:bg-[#587D3C] text-3xl p-5 h-fit justify-self-center mt-3 md:mt-0">Ajouter ville</a>
    </div>
</div>