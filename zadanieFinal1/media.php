<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $lang['MENU_MEDIA']; ?></title>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="css/styly.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
.thumbnail{
    z-index: -2;
	}
    .col-sm-4{
        z-index: -2;
    }
    .container {
    margin-top: 100px;
    margin-bottom: 100px;
}
</style>

</head>
<body>
<?php include_once ('header/header.php');
include_once ('menu/menu.php');
?>
<?php
$media = array();

// najnovsie davaj ako prve
// treba nastavit 'download_file' => xxx  inac nebude fungovat stahovanie
$media[] = array(
    'name' => 'Študenti z Bratislavy vyvinuli u nás prvú elektrickú motokáru',
    'description' => 'Vyvinúť a postaviť motokáru s čisto elektrickým energetickým systémom, ktorý by zásoboval energiou elektrický systém pohonu.',
    'link' => 'http://uamt.fei.stuba.sk/web/?q=sk/content/študenti-z-bratislavy-vyvinuli-u-nás-prvú-elektrickú-motokáru',
    'date' => '2016-10-21',
    'image' => 'motokara.jpg',
    'download_file' => 'imgMedia/motorka.jpg',
    'publisher' => array(
        'name' => 'FEI STUBA',
        'link' => 'http://uamt.fei.stuba.sk/web/',
    ),
);

$media[] = array(
    'name' => 'Začína sa éra elektromobilov, aj na Slovensku',
    'description' => 'Elektromobily boli na cestách skôr ako automobily so spaľovacím motorom.',
    'link' => 'http://uamt.fei.stuba.sk/web/?q=sk/content/začína-sa-éra-elektromobilov-aj-na-slovensku',
    'date' => '2016-06-01',
    'image' => 'eurovea.jpg',
    'download_file' => 'imgMedia/eurovea.jpg',
    'publisher' => array(
        'name' => 'FEI STUBA',
        'link' => 'http://uamt.fei.stuba.sk/web/',
    ),
);

$media[] = array(
    'name' => 'Nemecký dokument o elektromobiloch',
    'description' => 'Odborníci z praxe nás upozornili na kvalitný dokument o elektromobiloch.',
    'link' => 'http://uamt.fei.stuba.sk/web/?q=sk/content/nemecký-dokument-o-elektromobiloch',
    'date' => '2016-04-28',
    'image' => 'zapcha.jpg',
    'download_file' => 'imgMedia/zapcha.jpg',
    'publisher' => array(
        'name' => 'FEI STUBA',
        'link' => 'http://uamt.fei.stuba.sk/web/',
    ),
);

$media[] = array(
    'name' => 'STU chce intenzívnejšie spolupracovať s Volkswagenom',
    'description' => 'Študenti budú môcť zrejme už čoskoro na Slovenskej technickej univerzite (STU) v Bratislave študovať aj program Automobilová mechatronika. ',
    'link' => 'http://uamt.fei.stuba.sk/web/?q=sk/content/stu-chce-intenzívnejšie-spolupracovať-s-volkswagenom',
    'date' => '2015-08-26',
    'image' => 'volkswagen.jpg',
    'download_file' => 'imgMedia/volkswagen.jpg',
    'publisher' => array(
        'name' => 'FEI STUBA',
        'link' => 'http://uamt.fei.stuba.sk/web/',
    ),
);

function skDate($mySqlDate) {
    return date('d. m. Y', strToTime($mySqlDate));
}
?>




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

<br><br><br><br>
<?php include_once 'footer/footer.php';?>
</body>
</html>
