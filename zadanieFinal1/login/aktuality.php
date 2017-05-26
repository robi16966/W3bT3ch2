<?php
session_start();
include_once ('../config.php');


if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
	}

$strana = @$_GET['strana'] ?: 1;
$cat = @$_GET['kategoria'] ?: 0;
$stare = @$_GET['stare'] ?: 0;
$zobrazitNaStranu = 6;
$limitStart = ($strana - 1) * $zobrazitNaStranu;

$selectors = array();
if($stare != 1) $selectors[] = "aktivnado >= NOW()";
if($cat != 0) $selectors[] = "kategoria = '{$cat}'";
$selectors = count($selectors) > 0 ? (' WHERE ' . implode($selectors, ' AND ')) : '';

$articles_total_qr = mysqli_query($conn, "SELECT COUNT(Id) AS total FROM Aktuality{$selectors}");
$articles_total = mysqli_fetch_array($articles_total_qr);
$max_pages = ceil(@$articles_total['total'] / $zobrazitNaStranu);
$articles_qr = mysqli_query($conn, "SELECT * FROM Aktuality{$selectors} ORDER BY Datum LIMIT {$limitStart}, {$zobrazitNaStranu}");
$kategorie = array(
    0 => 'Všetky',
    1 => 'Propagácia',
    2 => 'Oznamy',
    3 => 'Zo života ústavu',
);

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
    <title>Aktuality</title>
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

<?php if(@$_GET['pridat'] == 'ano' && (@$_SESSION['reporter'] || @$_SESSION['admin'])) { // Reporterska cast ?>
    <?php
    if(!empty($_POST)) {
        mysqli_query($conn, 'INSERT INTO Aktuality(Nazov, Nazov_en, `Text`, Text_en, kategoria, Datum, aktivnado) VALUES(
            "' . $_POST['nazov'] . '",
            "' . $_POST['nazov_en'] . '",
            "' . $_POST['text'] . '",
            "' . $_POST['text'] . '",
            "' . $_POST['kategoria'] . '",
            "' . $_POST['datum'] . '",
            "' . $_POST['aktivnado'] . '"
        )');
    }
    ?>
    <form action="aktuality.php?pridat=ano" method="post">
        <div class="container">
            <div class="row">
                <div class="col-sm-12" align="left">
                    <a href="aktuality.php" class="btn btn-primary" role="button">Späť na články</a>
                    <br /><br />
                    <div>
                        Nazov:
                        <input type="text" name="nazov" class="form-control" required /><br />
                    </div>
                    <div>
                        Nazov EN:
                        <input type="text" name="nazov_en" class="form-control" required /><br />
                    </div>
                    <div>
                        Kategoria:
                        <select name="kategoria" class="form-control">
                            <?php foreach($kategorie as $id => $data) { ?>
                                <?php if($id != 0) { ?>
                                    <option value="<?php echo $id; ?>"><?php echo $data; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select><br />
                    </div>
                    <div>
                        Text:
                        <textarea name="text" class="form-control" required></textarea><br />
                    </div>
                    <div>
                        Text EN:
                        <textarea name="text_en" class="form-control" required></textarea><br />
                    </div>
                    <div>
                        Datum:
                        <input type="date" name="datum" class="form-control" value="<?php echo date('Y-m-d'); ?>" required /><br />
                    </div>
                    <div>
                        Aktivny do:
                        <input type="date" name="aktivnado" class="form-control" required /><br />
                    </div>
                    <input type="submit" class="btn btn-success" value="Vytvorit" />
                </div>
            </div>
        </div>
    </form>
<?php } else { // Front-end cast ?>
    <?php if(empty($_GET['clanok'])) { // Zoznam clankov ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12" align="left">
                    <?php if(@$_SESSION['reporter'] || @$_SESSION['admin']) { ?>
                        <a href="aktuality.php?pridat=ano" class="btn btn-success" role="button">Pridať článok</a><br /><br />
                    <?php } ?>
                    <?php if($stare == 1) { ?>
                        <a href="aktuality.php?strana=<?php echo $strana; ?>&kategoria=<?php echo $cat; ?>&stare=0" class="btn btn-warning" role="button">
                            Skryt stare prispevky
                        </a><br /><br />
                    <?php } else { ?>
                        <a href="aktuality.php?strana=<?php echo $strana; ?>&kategoria=<?php echo $cat; ?>&stare=1" class="btn btn-warning" role="button">
                            Zobrazit aj stare prispevky
                        </a><br /><br />
                    <?php } ?>
                    <?php foreach($kategorie as $id => $data) { ?>
                        <a href="aktuality.php?strana=<?php echo $strana; ?>&kategoria=<?php echo $id; ?>&stare=<?php echo $stare; ?>"><?php echo $data; ?></a>
                        <?php if($id != (count($kategorie) - 1)) { ?> | <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <br /><br />

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
                                <a href="aktuality.php?strana=<?php echo $i; ?>&kategoria=<?php echo $cat; ?>&stare=<?php echo $stare; ?>"><?php echo $i; ?></a>
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
<?php } ?>


<?php include_once 'footer/footer.php';?>
</body>
</html>
