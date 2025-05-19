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


    <?php for($i=0;$i<count($data);$i++) : ?>

        <div class="flex flex-col border-1 rounded-lg md:m-2 w-7/10 md:w-auto">
            <div class="flex flex-col md:flex-row justify-around mt-3 h-fit">
                <p class="text-2xl font-bold ml-3 md:ml-0"><?php echo $data[$i]['name']?></p>
                <?php if ($data[$i]['air']['european_aqi'] <= 50): ?>
                    <p class="border-1 rounded-lg bg-[#69A33D] text-xl w-fit md:w-auto h-fit p-1 ml-2 md:ml-0">IQA : <?php echo $data[$i]['air']['european_aqi'] ?> (Bon)</p>
                <?php elseif ($data[$i]['air']['european_aqi'] <= 100): ?>
                    <p class="border-1 rounded-lg bg-[#E9D92C] text-xl w-fit md:w-auto h-fit p-1 ml-2 md:ml-0">IQA : <?php echo $data[$i]['air']['european_aqi'] ?> (Modéré)</p>
                <?php elseif ($data[$i]['air']['european_aqi'] <= 150): ?>
                    <p class="border-1 rounded-lg bg-[#EA6C29] text-xl w-fit md:w-auto h-fit p-1 ml-2 md:ml-0">IQA : <?php echo $data[$i]['air']['european_aqi'] ?> (Pas bon)</p>
                <?php elseif ($data[$i]['air']['european_aqi'] <= 200): ?>
                    <p class="border-1 rounded-lg bg-[#F01F1F] text-xl w-fit md:w-auto h-fit p-1 ml-2 md:ml-0">IQA : <?php echo $data[$i]['air']['european_aqi'] ?> (Mauvais)</p>
                <?php elseif ($data[$i]['air']['european_aqi'] <= 300): ?>
                    <p class="border-1 rounded-lg bg-[#AA24CC] text-xl w-fit md:w-auto h-fit p-1 ml-2 md:ml-0">IQA : <?php echo $data[$i]['air']['european_aqi'] ?> (Très mauvais)</p>
                <?php else : ?>
                    <p class="rounded-lg p-1 text-xl w-fit justify-self-center">Donnée non disponible</p>
                <?php endif;?>
            </div>

            <div class="flex flex-col md:grid md:grid-cols-2">
                <div class="grid grid-cols-2 grid-rows-2">
                    <div class="flex flex-col items-center m-3">
                        <p class="text-lg font-semibold">PM 2.5</p>
                        <?php if ($data[$i]['air']['pm2_5'] <= 10) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#69A33D] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm2_5'] <= 25) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#E9D92C] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm2_5'] <= 50) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#EA6C29] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm2_5'] <= 75) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#F01F1F] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm2_5'] > 75) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#AA24CC] size-20 rounded-full">
                        <?php endif ?>
                            <p class="text-lg"><?php echo $data[$i]['air']['pm2_5']?></p>
                            <p class="text-lg">µg/m3</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center m-3">
                        <p class="text-lg font-semibold">PM 10</p>
                        <?php if ($data[$i]['air']['pm10'] <= 20) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#69A33D] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm10'] <= 50) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#E9D92C] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm10'] <= 100) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#EA6C29] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm10'] <= 200) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#F01F1F] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['pm10'] > 200) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#AA24CC] size-20 rounded-full">
                        <?php endif ?>
                            <p class="text-lg"><?php echo $data[$i]['air']['pm10']?></p>
                            <p class="text-lg">µg/m3</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center m-3">
                        <p class="text-lg font-semibold">NO2</p>
                        <?php if ($data[$i]['air']['nitrogen_dioxide'] <= 40) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#69A33D] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['nitrogen_dioxide'] <= 70) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#E9D92C] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['nitrogen_dioxide'] <= 150) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#EA6C29] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['nitrogen_dioxide'] <= 200) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#F01F1F] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['nitrogen_dioxide'] > 200) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#AA24CC] size-20 rounded-full">
                        <?php endif ?>
                            <p class="text-lg"><?php echo $data[$i]['air']['nitrogen_dioxide']?></p>
                            <p class="text-lg">µg/m3</p>
                        </div>
                    </div>

                    <div class="flex flex-col items-center m-3">
                        <p class="text-lg font-semibold">O3</p>
                        <?php if ($data[$i]['air']['ozone'] <= 60) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#69A33D] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['ozone'] <= 100) : ?>
                            <div class="flex flex-col items-center justify-center bg-[#E9D92C] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['ozone'] <= 140) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#EA6C29] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['ozone'] <= 180) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#F01F1F] size-20 rounded-full">
                        <?php elseif ($data[$i]['air']['ozone'] > 180) : ?> 
                            <div class="flex flex-col items-center justify-center bg-[#AA24CC] size-20 rounded-full">
                        <?php endif ?>
                            <p class="text-lg"><?php echo $data[$i]['air']['ozone']?></p>
                            <p class="text-lg">µg/m3</p>
                        </div>
                    </div>
                </div>
                <div class="grid grid-rows-2 grid-cols-3 md:grid-rows-3 md:grid-cols-2 md:h-fit md:gap-4 md:self-center mt-3 md:mt-0">
                    <div class="col-1 row-1 md:col-auto md:row-auto h-fit w-fit justify-self-center md:justify-self-end">
                        <img class="w-auto h-[32px] md:h-[35px] justify-self-center" src="../public/images/Temperature.png" alt="température">
                    </div>
                    <p class="col-1 row-2 md:col-auto md:row-auto justify-self-center md:justify-self-start text-lg h-fit"><?php echo $data[$i]['weather']['temperature_2m']?> °C</p>

                    <div class="col-2 row-1 md:col-auto md:row-auto h-fit w-fit justify-self-center md:justify-self-end">
                        <img class="w-auto h-[32px] md:h-[35px] justify-self-center" src="../public/images/Wind.png" alt="vitesse du vent">
                    </div>
                    <p class="col-2 row-2 md:col-auto md:row-auto justify-self-center md:justify-self-start text-lg h-fit"><?=$data[$i]['weather']['wind_speed_10m']?> Km/h</p>

                    <div class="col-3 row-1 md:col-auto md:row-auto h-fit w-fit justify-self-center md:justify-self-end">
                        <img class="w-auto h-[32px] md:h-[35px] justify-self-center" src="../public/images/Rain.png" alt="précipitations">
                    </div>
                    <p class="col-3 row-2 md:col-auto md:row-auto justify-self-center md:justify-self-start text-lg h-fit"><?=$data[$i]['weather']['precipitation']?> mm</p>

                </div>
            </div>

            <a href="" class="bg-[#F94130] hover:bg-[#D5382A] border-1 rounded-lg w-fit text-xl self-end mr-5 mb-1 p-1">Supprimer</a>
        </div>
    <?php endfor;?>

    <div class="flex items-center">
        <a href="/addCityForm" class="border-1 rounded-lg bg-[#69A33D] hover:bg-[#587D3C] text-3xl p-5 h-fit justify-self-center mt-3 md:mt-0">Ajouter ville</a>
    </div>
</div>