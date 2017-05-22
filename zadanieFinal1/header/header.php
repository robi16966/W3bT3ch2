<header>
<h2><?php echo $lang['PAGE_TITLE']; ?></h2>
<?php
if(strpos($_SERVER['REQUEST_URI'], '?' ) !== false ){
    echo '<a href="'.$_SERVER['REQUEST_URI'] .'&lang=en">English</a>';
    echo '<a href="'.$_SERVER['REQUEST_URI'] .'&lang=sk">Slovensky</a>';
}
else{
        echo '<a href="'.$_SERVER['REQUEST_URI'] .'?lang=en">English</a>';
    echo '<a href="'.$_SERVER['REQUEST_URI'] .'?lang=sk">Slovensky</a>';
}
?>
</header>
