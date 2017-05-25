<header>
<img src="header/logo.png" align="left"> 
<h3 class="aumt">&emsp;<?php echo $lang['HEADER_AUMT']; ?></h3>

<div id="lang">
<?php
if(strpos($_SERVER['REQUEST_URI'], '?' ) !== false ){
    echo '<a href="'.$_SERVER['REQUEST_URI'] .'&lang=en"><img src="header/english.png"></a>';
    echo '<a href="'.$_SERVER['REQUEST_URI'] .'&lang=sk"><img src="header/slovakia-flag.gif"></a>';
}
else{
        echo '<a href="'.$_SERVER['REQUEST_URI'] .'?lang=en"><img src="header/english.png"></a>';
    echo '<a href="'.$_SERVER['REQUEST_URI'] .'?lang=sk"><img src="header/slovakia-flag.gif"></a>';
}
?>
</div>
</header>
