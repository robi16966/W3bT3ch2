<?php
$media = array();

// najnovsie davaj ako prve
// treba nastavit 'download_file' => xxx  inac nebude fungovat stahovanie
$media[] = array(
    'name' => 'Prvý slovenský elektrický skúter (od 7:50 min)',
    'description' => 'Podľahnite vynálezom a technickým výdobytkom budúcnosti v magazíne VAT s Gregorom Marešom. Predstavíme najnovších robotov – spoločníkov v domácnosti.',
    'link' => 'https://www.rtvs.sk/televizia/archiv/11767/117377',
    'date' => '2017-01-19',
    'image' => 'mechatronika.jpg',
    'download_file' => 'imgMedia/mechatronika.jpg',
    'publisher' => array(
        'name' => 'VAT RTVS',
        'link' => 'https://www.rtvs.sk/televizia/archiv/',
    ),
);

$media[] = array(
    'name' => 'Automobilová mechatronika (od 6:35 min)',
    'description' => 'Podľahnite vynálezom a technickým výdobytkom budúcnosti v magazíne VAT s Gregorom Marešom. Predstavíme najnovších robotov – spoločníkov v domácnosti',
    'link' => 'https://www.rtvs.sk/televizia/archiv/11767/115433',
    'date' => '2017-01-12',
    'image' => 'mechatronika.jpg',
    'download_file' => 'imgMedia/mechatronika.jpg',
    'publisher' => array(
        'name' => 'VAT RTVS',
        'link' => 'https://www.rtvs.sk/televizia/archiv/',
    ),
);

$media[] = array(
    'name' => 'Vďaka biomechatronikom z STU sa už akupunktúrne body neskryjú',
    'description' => 'Čoraz viac ľudí vyhľadáva alternatívne liečebné postupy, medzi ktoré patrí aj akupunktúra.',
    'link' => 'http://science.dennikn.sk/clanky-a-rozhovory/neziva-priroda/technika/6196-vdaka-slovenskym-biomechatronikom-sa-uz-akupunkturne-body-neskryju',
    'date' => '2016-03-11',
    'image' => 'biomechatronika.jpg',
    'download_file' => 'pdfMedia/science20162903.pdf',
    'publisher' => array(
        'name' => 'Denník N',
        'link' => 'http://science.dennikn.sk/clankyarozhovory/',
    ),
);

$media[] = array(
    'name' => 'Mladí vedci navrhli snímač akupunktúrnych bodov',
    'description' => 'Nie všetci uznávajú tzv. alternatívnu medicínu.',
    'link' => 'http://reginazapad.rtvs.sk/clanky/deti/98134/mladi-vedci-navrhli-snimac-akupunkturnych-bodov',
    'date' => '2016-01-19',
    'image' => 'akupunktura.jpg',
    'download_file' => 'imgMedia/akupunktura.jpg',
    'publisher' => array(
        'name' => 'Rádio Regina',
        'link' => 'http://reginazapad.rtvs.sk/',
    ),
);

$media[] = array(
    'name' => 'Podkryl tajomstvo',
    'description' => 'V detstve som sa ocitol na prahu smrti a ovplyvnilo to aj moju vedeckú kariéru.',
    'link' => 'http://147.175.98.157/media/pdfMedia/sarm201546.pdf',
	'date' => '2015-11-10',
    'image' => 'tajomstvo.jpg',
    'download_file' => 'pdfMedia/sarm201546.pdf',
    'publisher' => array(
        'name' => 'Šarm',
        'link' => 'http://www.pluska.sk/zena/sarm/',
    ),
);

$media[] = array(
    'name' => 'Prvá elektrická motokára na Slovensku vznikla v škole',
    'description' => 'Výsledkom je vozidlo, ktoré svojimi technickými riešeniami môže inšpirovať aj veľké svetové automobilky.',
    'link' => 'https://spravy.pravda.sk/ekonomika/clanok/333718-prva-elektricka-motokara-na-slovensku-vznikla-v-skole/',
    'date' => '2014-10-20',
    'image' => 'motokara2.jpg',
    'download_file' => 'imgMedia/motokara2.jpg',
    'publisher' => array(
        'name' => 'Pravda',
        'link' => 'https://spravy.pravda.sk/',
    ),
);

$media[] = array(
    'name' => 'Študenti z Bratislavy vyvinuli u nás prvú elektrickú motokáru',
    'description' => 'Vyvinúť a postaviť motokáru s čisto elektrickým energetickým systémom, ktorý by zásoboval energiou elektrický systém pohonu.',
    'link' => 'http://dennik.hnonline.sk/ekonomika-a-firmy/591621-studenti-z-bratislavy-vyvinuli-u-nas-prvu-elektricku-motokaru#.VETnmBjntpk.facebook',
    'date' => '2014-10-14',
    'image' => 'motokara.jpg',
    'download_file' => 'imgMedia/motokara.jpg',
    'publisher' => array(
        'name' => 'Hospodárske noviny',
        'link' => 'http://dennik.hnonline.sk/',
    ),
);

function skDate($mySqlDate) {
    return date('d. m. Y', strToTime($mySqlDate));
}
?>

<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_MEDIA'];?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
.container {
    margin-top: 100px;
    margin-bottom: 100px;
}
.col-sm-4{
        /*z-index: -1;*/
    }
}
</style>
</head>
<body>

<?php

include_once ('header/header.php');
include_once ('menu/menu.php');

?>
<h1> <?php echo $lang['MENU_MEDIA'];?> </h1>

<div class="container">
    <div class="row">
        <?php $index = 1; ?>
        <?php foreach($media as $item) { ?>
            <div class="col-sm-4">
                <div class="thumbnail">
                    <img src="imgMedia/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                    <div class="caption" align="left">
                        <h3><?php echo $item['name']; ?></h3>
                        <small>
                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <a href="<?php echo $item['publisher']['link']; ?>" target="_blank"><?php echo $item['publisher']['name']; ?></a>
                            <span> | </span>
                            <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo skDate($item['date']); ?>
                        </small>
                        <br /><br />
                        <p><?php echo $item['description']; ?></p>
                        <p>
                            <a href="<?php echo $item['link']; ?>" target="_blank" class="btn btn-primary" role="button">Viac</a>
                            <?php if(!empty($item['download_file'])) { ?><a href="<?php echo $item['download_file']; ?>" target="_blank" class="btn btn-default" role="button">Stiahnuť</a><?php } ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php if($index % 3 == 0) { ?><div class="clearfix"></div><?php } ?>
            <?php $index++; ?>
        <?php } ?>
    </div>
</div>


<?php include_once 'footer/footer.php';?>
</body>
</html>

