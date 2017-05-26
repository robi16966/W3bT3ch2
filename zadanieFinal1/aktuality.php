<?php

include_once ('config.php');
$strana = @$_GET['strana'] ?: 1;
$zobrazitNaStranu = 6;
$limitStart = ($strana - 1) * $zobrazitNaStranu;

$articles_total_qr = mysqli_query($conn, "SELECT COUNT(Id) AS total FROM Aktuality");
$articles_total = mysqli_fetch_array($articles_total_qr);
$max_pages = ceil(@$articles_total['total'] / $zobrazitNaStranu);
$articles_qr = mysqli_query($conn, "SELECT * FROM Aktuality ORDER BY Datum LIMIT {$limitStart}, {$zobrazitNaStranu}");

function skDate($mySqlDate) {
    return date('d. m. Y', strToTime($mySqlDate));
}
function perex($string, $maxLength = 10, $atEnd = '&hellip;') {
    $string = strip_tags($string);

    if(mb_strlen($string) > $maxLength) {
        return mb_substr($string, 0, $maxLength) . "{$atEnd}";
    }

    return $string;
}
function translate($item, $key) {
    global $lang;

    $defaultValue = @$item[$key];
    $languageValue = @$item["{$key}_{$lang}"];

    return !empty($languageValue) ? $languageValue : $defaultValue;
}
?>

<?php include_once 'lang/lang.php';?>
<!DOCTYPE HTML>
<html lang="sk">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title><?php echo $lang['MENU_NEWS']; ?></title>
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
</style>
</head>
<body>
<?php

include_once ('header/header.php');
include_once ('menu/menu.php');

?>

<?php if(empty($_GET['clanok'])) { // Zoznam clankov ?>
    <div class="container">
        <div class="row">
            <?php $index = 1; ?>
            <?php while($item = mysqli_fetch_array($articles_qr)) { ?>
                <div class="col-sm-4">
                    <div class="thumbnail">
                        <div class="caption" align="left">
                            <h3><?php echo translate($item, 'Nazov'); ?></h3>
                            <small>
                                <span class="glyphicon glyphicon-calendar" aria-hidden="true"></span> <?php echo skDate($item['Datum']); ?>
                            </small>
                            <br /><br />
                            <p><?php echo perex(translate($item, 'Text'), 150); ?></p>
                            <p>
                                <a href="aktuality.php?clanok=<?php echo $item['Id']; ?>" class="btn btn-primary" role="button">Viac</a>
                            </p>
                        </div>
                    </div>
                </div>
                <?php if($index % 3 == 0) { ?><div class="clearfix"></div><?php } ?>
                <?php $index++; ?>
            <?php } ?>

            <div class="col-sm-12">
                <ul class="pagination">
                    <?php for($i = 1; $i <= $max_pages; $i++) { ?>
                        <li<?php if($i == $strana) { ?> class="active"<?php } ?>>
                            <a href="aktuality.php?strana=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </div>
<?php } else { // Zobrazenie clanka ?>
    <div class="container">
        <div class="row">
            <?php
                $article_qr = mysqli_query($conn, "SELECT * FROM Aktuality WHERE Id = " . @$_GET['clanok']);
                $article = mysqli_fetch_array($article_qr);
            ?>
            <div class="col-sm-12" align="left">
                <a href="aktuality.php" class="btn btn-primary" role="button">Späť</a>
                <h1><?php echo translate($article, 'Nazov'); ?></h1>
                <p><?php echo translate($article, 'Text'); ?></p>
            </div>
        </div>
    </div>
<?php } ?>


<?php include_once 'footer/footer.php';?>
</body>
</html>
