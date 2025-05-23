<?php

/**
 * ETML
 * Auteur: Dany Carneiro Jeremias
 * Date: 12.05.2025
 * Description: Page d'accueil indiquant la météo et la qualité de l'air de la zone approximative récupérée grâce à l'adresse IP
 */

 if(isset($data[0])){
     $userCoordinates=$data[0];
     if(isset($data[1])){
         $info=$data[1];
     }
 }
?>

<div class="justify-self-center flex flex-col items-center">

    <?php if (isset($userCoordinates)) : ?>
        <h2 class="text-2xl md:text-4xl p-4">Qualité de l'air à <?=$userCoordinates['city']['name'] ?></h2>
    <?php else: ?>
        <h2 class="text-2xl md:text-4xl p-4">Zone géographique non disponible</h2>
    <?php endif;?>

    <div class="w-9/10 md:w-auto border rounded-lg p-6">
            <?php if (isset($info)) : ?>
                <?php if ($info['air']['european_aqi'] <= 50): ?>
                    <p class="bg-[#69A33D] border-1 rounded-lg p-1 text-xl w-fit justify-self-center">IQA : <?=$info['air']['european_aqi']?> (Bon)</p>
                <?php elseif ($info['air']['european_aqi'] <= 100): ?>
                    <p class="bg-[#E9D92C] border-1 rounded-lg p-1 text-xl w-fit justify-self-center">IQA : <?=$info['air']['european_aqi']?> (Modéré)</p>
                <?php elseif ($info['air']['european_aqi'] <= 150): ?>
                    <p class="bg-[#EA6C29] border-1 rounded-lg p-1 text-xl w-fit justify-self-center">IQA : <?=$info['air']['european_aqi']?> (Pas bon)</p>
                <?php elseif ($info['air']['european_aqi'] <= 200): ?>
                    <p class="bg-[#F01F1F] border-1 rounded-lg p-1 text-xl w-fit justify-self-center">IQA : <?=$info['air']['european_aqi']?> (Mauvais)</p>
                <?php elseif ($info['air']['european_aqi'] <= 300): ?>
                    <p class="bg-[#AA24CC] border-1 rounded-lg p-1 text-xl w-fit justify-self-center">IQA : <?=$info['air']['european_aqi']?> (Très mauvais)</p>
                <?php endif;?>
            <?php else : ?>
                <p class="rounded-lg p-1 text-xl w-fit justify-self-center">IQA : Donnée non disponible</p>
            <?php endif;?>


        <div class="grid grid-cols-2 grid-rows-2 md:flex mt-5 place-items-center">

            <?php if (isset($info)) : ?>
                <?php if ($info['air']['pm2_5'] <= 10) : ?>
                    <div class="size-25 md:size-35 bg-[#69A33D] rounded-full m-2">
                <?php elseif ($info['air']['pm2_5'] <= 25) : ?>
                    <div class="size-25 md:size-35 bg-[#E9D92C] rounded-full m-2">
                <?php elseif ($info['air']['pm2_5'] <= 50) : ?> 
                    <div class="size-25 md:size-35 bg-[#EA6C29] rounded-full m-2">
                <?php elseif ($info['air']['pm2_5'] <= 75) : ?> 
                    <div class="size-25 md:size-35 bg-[#F01F1F] rounded-full m-2">
                <?php elseif ($info['air']['pm2_5'] > 75) : ?> 
                    <div class="size-25 md:size-35 bg-[#AA24CC] rounded-full m-2">
                <?php endif ?>
                    <p class="text-center pt-4 text-lg md:text-2xl font-semibold">PM 2.5</p>
                    <p class="text-center md:pt-4 text-lg md:text-2xl"><?=$info['air']['pm2_5']?> µg/m3</p>
                </div>

                <?php if ($info['air']['pm10'] <= 20) : ?>
                    <div class="size-25 md:size-35 bg-[#69A33D] rounded-full m-2">
                <?php elseif ($info['air']['pm10'] <= 50) : ?>
                    <div class="size-25 md:size-35 bg-[#E9D92C] rounded-full m-2">
                <?php elseif ($info['air']['pm10'] <= 100) : ?> 
                    <div class="size-25 md:size-35 bg-[#EA6C29] rounded-full m-2">
                <?php elseif ($info['air']['pm10'] <= 200) : ?>
                    <div class="size-25 md:size-35 bg-[#F01F1F] rounded-full m-2">
                <?php elseif ($info['air']['pm10'] > 200) : ?> 
                    <div class="size-25 md:size-35 bg-[#AA24CC] rounded-full m-2">
                <?php endif ?>
                    <p class="text-center pt-4 text-lg md:text-2xl font-semibold">PM 10</p>
                    <p class="text-center md:pt-4 text-lg md:text-2xl"><?=$info['air']['pm10']?> µg/m3</p>
                </div>

                <?php if ($info['air']['nitrogen_dioxide'] <= 40) : ?>
                    <div class="size-25 md:size-35 bg-[#69A33D] rounded-full m-2">
                <?php elseif ($info['air']['nitrogen_dioxide'] <= 70) : ?>
                    <div class="size-25 md:size-35 bg-[#E9D92C] rounded-full m-2">
                <?php elseif ($info['air']['nitrogen_dioxide'] <= 150) : ?> 
                    <div class="size-25 md:size-35 bg-[#EA6C29] rounded-full m-2">
                <?php elseif ($info['air']['nitrogen_dioxide'] <= 200) : ?> 
                    <div class="size-25 md:size-35 bg-[#F01F1F] rounded-full m-2">
                <?php elseif ($info['air']['nitrogen_dioxide'] > 200) : ?> 
                    <div class="size-25 md:size-35 bg-[#AA24CC] rounded-full m-2">
                <?php endif ?>
                    <p class="text-center pt-4 text-lg md:text-2xl font-semibold">NO2</p>
                    <p class="text-center md:pt-4 text-lg md:text-2xl"><?=$info['air']['nitrogen_dioxide']?> µg/m3</p>
                </div>

                <?php if ($info['air']['ozone'] <= 60) : ?>
                    <div class="size-25 md:size-35 bg-[#69A33D] rounded-full m-2">
                <?php elseif ($info['air']['ozone'] <= 100) : ?>
                    <div class="size-25 md:size-35 bg-[#E9D92C] rounded-full m-2">
                <?php elseif ($info['air']['ozone'] <= 140) : ?> 
                    <div class="size-25 md:size-35 bg-[#EA6C29] rounded-full m-2">
                <?php elseif ($info['air']['ozone'] <= 180) : ?> 
                    <div class="size-25 md:size-35 bg-[#F01F1F] rounded-full m-2">
                <?php elseif ($info['air']['ozone'] > 180) : ?> 
                    <div class="size-25 md:size-35 bg-[#AA24CC] rounded-full m-2">
                <?php endif ?>
                    <p class="text-center pt-4 text-lg md:text-2xl font-semibold">O3</p>
                    <p class="text-center md:pt-4 text-lg md:text-2xl"><?=$info['air']['ozone']?> µg/m3</p>
                </div>


                <div class="grid grid-cols-3 grid-rows-2 gap-3 md:gap-0 md:grid-rows-4 md:grid-cols-2 md:border md:rounded-lg p-4 col-span-2">
                    <p class="hidden md:block justify-self-center text-xl pb-4 col-span-2">Météo</p>
                    
                        <img class="w-auto h-[30px] mr-3 justify-self-center self-end md:self-auto col-1 row-1 md:col-1 md:row-2 " src="../public/images/Temperature.png" alt="Image de thermostat">
                        <p class="text-lg md:text-xl col-1 row-2 md:col-2 md:row-2"><?=$info['weather']['temperature_2m']?> C°</p>

                        <img class="w-auto h-[30px] mr-3 justify-self-center self-end md:self-auto col-2 row-1 md:col-1 md:row-3" src="../public/images/Rain.png" alt="Image de thermostat">
                        <p class="text-lg md:text-xl col-2 row-2 md:col-2 md:row-3"><?=$info['weather']['precipitation']?> mm</p>

                        <img class="w-auto h-[30px] mr-3 justify-self-center self-end md:self-auto col-3 row-1 md:col-1 md:row-4" src="../public/images/Wind.png" alt="Image de thermostat">
                        <p class="text-lg md:text-xl col-3 row-2 md:col-2 md:row-4"><?=$info['weather']['wind_speed_10m']?> Km/h</p>
                </div>
                
            <?php else : ?>
                <p>Données non diponibles</p>
            <?php endif;?>
        </div>
    </div>
    <p class="text-xl md:text-3xl m-8">Connectez-vous afin d'avoir des informations sur d'autres villes</p>

    <div class="justify-self-start border-1 rounded-lg mt-5 mb-5 p-2">
        <p class="text-lg underline justify-self-center">Glossaire</p>
        <p>IQA : Indice de qualité de l'air</p>
        <p>PM 2.5 : Particules fines de moins de 2,5 µm</p>
        <p>PM 10 : Particules fines de moins de 10 µm</p>
        <p>NO2 : Dioxyde d'azote</p>
        <p>O3 : Ozone</p>
    </div>

    <a href="/addUserForm" class="md:hidden text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C]">Créer un compte</a>
    <a href="/connectForm" class="md:hidden text-xl border rounded-xl p-1 bg-[#69A33D] hover:bg-[#587D3C] mt-7">Se connecter</a>

    
</div>