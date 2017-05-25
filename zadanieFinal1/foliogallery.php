<!--
	folioGallery v2.0 - 2015-01-30
	(c) 2014 Harry Ghazanian - foliopages.com/php-jquery-ajax-photo-gallery-no-database
	This content is released under the http://www.opensource.org/licenses/mit-license.php MIT License.
-->
<script type="application/javascript">
$(document).ready(function() { // load colorbox settings
	$('.folioGallery').each(function() {
		var targetDiv = (this.id); // id of div to load albums	
		$('#'+targetDiv+' .albumpix').colorbox({rel:targetDiv, maxWidth:'96%', maxHeight:'96%', slideshow:true, slideshowSpeed:3500, slideshowAuto:false});
		$('#'+targetDiv+' .vid').colorbox({rel:targetDiv, iframe:true, width:"80%", height:"96%"});
	});
});
</script>
<?php
/***** gallery settings *****/
$mainFolder          = 'albums'; // main folder that holds albums - this folder resides on root directory of your domain
$album_page_url      = $_SERVER['PHP_SELF']; // url of page where gallery/albums are located 
$no_thumb            = 'foliogallery/noimg.png';  // show this when no thumbnail exists 
$extensions          = array("jpg","png","gif","JPG","PNG","GIF"); // allowed extensions in photo gallery 
$itemsPerPage        = '12';    // number of images per page if not already specified in ajax mode 
$thumb_width         = '150';   // width of thumbnails in pixels
$sort_albums_by_date = TRUE;    // TRUE will sort albums by creation date (most recent first), FALSE will sort albums by name 
$sort_images_by_date = TRUE;    // TRUE will sort thumbs by creation date (most recent first), FALSE will sort images by name 
$random_thumbs       = TRUE;    // TRUE will display random thumbnails, FALSE will display the first image from thumbs folders
$show_captions       = TRUE;    // TRUE will display file names as captions on thumbs inside albums, FALSE will display no captions
$num_captions_chars  = '100';    // number of characters displayed in album and thumb captions
/***** end gallery settings *****/

$numPerPage = (!empty($_REQUEST['numperpage']) ? (int)$_REQUEST['numperpage'] : $itemsPerPage);
$fullAlbum  = (!empty($_REQUEST['fullalbum']) ? 1 : 0);
 
// sanitize string
function sanitize($string)
{
	$string = htmlspecialchars(trim($string), ENT_QUOTES, 'UTF-8');
	return $string;
}

// encode string to
function encodeto($string)
{
	$string = mb_convert_encoding(trim($string), 'UTF-8', 'HTML-ENTITIES');
	return $string;
} 
 
// function to create thumbnails from images
function make_thumb($folder,$file,$dest,$thumb_width) {

	$ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
	
	switch($ext)
	{
		case "jpg":
		$source_image = imagecreatefromjpeg($folder.'/'.$file);
		break;
		
		case "jpeg":
		$source_image = imagecreatefromjpeg($folder.'/'.$file);
		break;
		
		case "png":
		$source_image = imagecreatefrompng($folder.'/'.$file);
		break;
		
		case "gif":
		$source_image = imagecreatefromgif($folder.'/'.$file);
		break;
	}	
	
	$width = imagesx($source_image);
	$height = imagesy($source_image);
	
	if($width < $thumb_width) // if original image is smaller don't resize it
	{
		$thumb_width = $width;
		$thumb_height = $height;
	}
	else
	{
		$thumb_height = floor($height*($thumb_width/$width));
	}
	
	$virtual_image = imagecreatetruecolor($thumb_width,$thumb_height);
	
	if($ext == "gif" or $ext == "png") // preserve transparency
	{
		imagecolortransparent($virtual_image, imagecolorallocatealpha($virtual_image, 0, 0, 0, 127));
		imagealphablending($virtual_image, false);
		imagesavealpha($virtual_image, true);
    }
	
	imagecopyresampled($virtual_image,$source_image,0,0,0,0,$thumb_width,$thumb_height,$width,$height);
	
	switch($ext)
	{
	    case 'jpg': imagejpeg($virtual_image, $dest,80); break;
		case 'jpeg': imagejpeg($virtual_image, $dest,80); break;
		case 'gif': imagegif($virtual_image, $dest); break;
		case 'png': imagepng($virtual_image, $dest); break;
    }

	imagedestroy($virtual_image); 
	imagedestroy($source_image);
	
}

// return array sorted by date or name
function sort_array(&$array,$dir,$sort_by_date) { // array argument must be passed as reference
	
	if($sort_by_date)
	{
		foreach ($array as $key=>$item) 
		{
			$stat_items = stat($dir .'/'. $item);
			$item_time[$key] = $stat_items['ctime'];
		}
		return array_multisort($item_time, SORT_DESC, $array); 
	}	
	else
	{
		return usort($array, 'strnatcasecmp');
	}	

}

// get album and image descriptions
function itemDescription($album, $file='')
{
	if(file_exists($album.'/descriptions.txt'))
	{
		$lines_array = file($album.'/descriptions.txt', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES); 
		if($lines_array)
		{
			if($file == '')
			{
				$album_line = explode(';', $lines_array[0]); 
				return (!empty($album_line[0]) && $album_line[0] == 'album' ? $album_line[1] : '');
			}
			else
			{
				foreach($lines_array as $img_line)
				{	
					if(!empty($img_line)) {
						$img_desc = explode(';', $img_line);	
						if($img_desc[0] == $file) { return $img_desc[1]; }
					}
				}
			}	
		}
		else
		{
			return '';
		}
	}	
}


// display pagination
function paginate_array($numPages,$urlVars,$alb,$currentPage) {
        
   $html = '';
   
   if ($numPages > 1) 
   {
   
       if ($currentPage > 1)
	   {
	       $prevPage = $currentPage - 1;
	       $html .= '<a class="pag prev" rel="'.$alb.'" rev="'.$prevPage.'" href="?'.$urlVars.'p='.$prevPage.'"></a> ';
	   }	   
	   
	   for( $i=0; $i < $numPages; $i++ )
	   {
           $p = $i + 1;
		   $class = ($p==$currentPage ? 'current-paginate' : 'paginate'); 
		   $html .= '<a rel="'.$alb.'" rev="'.$p.'" class="'.$class.' pag" href="?'.$urlVars.'p='.$p.'"></a>';	  
	   }
	   
	   if ($currentPage != $numPages)
	   {
           $nextPage = $currentPage + 1;	
		   $html .= ' <a class="pag next" rel="'.$alb.'" rev="'.$nextPage.'" href="?'.$urlVars.'p='.$nextPage.'"></a>';
	   }	  	 
   
   }
   
   return $html;

}
?>

<div class="fg">

<?php
if (empty($_REQUEST['album'])) // if no album requested, show all albums
{		
	
	$albums = array_diff(scandir($mainFolder), array('..', '.'));
	$numAlbums = count($albums);
	 
	if($numAlbums == 0) 
	{ ?>
		
		<div class="titlebar"><p>No albums posted</p></div>
    
	<?php
	}
	else
	{
		sort_array($albums,$mainFolder,$sort_albums_by_date); // rearrange array either by date or name
		$numPages = ceil( $numAlbums / $numPerPage );
		
		if(isset($_REQUEST['p']))
		 {
		 	$currentPage = ((int)$_REQUEST['p'] > $numPages ? $numPages : (int)$_REQUEST['p']); 
         } 
		 else 
		 {
		 	$currentPage=1;
         }
		
		$start = ($currentPage * $numPerPage) - $numPerPage; ?>
	     
		<div class="p10-lr">
        	<span class="title">Photo Gallery</span> - <?php echo $numAlbums; ?> albums
        </div>
	  
        <div class="clear"></div>
	  	 
		<?php 			 
	    for( $i=$start; $i<$start + $numPerPage; $i++ )
		{
	  						
			if(isset($albums[$i])) 
			{  
				$thumb_pool = glob($mainFolder.'/'.$albums[$i].'/thumbs/*{.'.implode(",", $extensions).'}', GLOB_BRACE);
				
				if (count($thumb_pool) == 0)
				{ 
					$album_thumb = $no_thumb;
				}
				else
				{	
					$album_thumb = ($random_thumbs ? $thumb_pool[array_rand($thumb_pool)] : $thumb_pool[0]); // display a random thumb or the 1st thumb					
				} ?>
			 		 			 
				<div class="thumb-wrapper">
					<div class="thumb">
					   <a class="showAlb" rel="<?php echo $albums[$i]; ?>" href="<?php echo $_SERVER['PHP_SELF']; ?>?album=<?php echo urlencode($albums[$i]); ?>">
					     <img src="<?php echo $album_thumb; ?>" alt="<?php echo $albums[$i]; ?>" /> 
					   </a>	
					</div>
					<div class="caption">
                    <?php                         include ("config.php");
                        if(  $_SESSION['lang']=='en')
                            $sql = "SELECT titleEn FROM photoGalery where folder='".$albums[$i]."'";
                        else
                            $sql = "SELECT titleSk FROM photoGalery where folder='".$albums[$i]."'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            echo substr((reset($result->fetch_assoc())),0,$num_captions_chars);
                        }
                        else
                            echo substr($albums[$i],0,$num_captions_chars); ?>
                        </div>
				</div>
	
			<?php
			}
		
		}
		?>
	      
		 <div class="clear"></div>
  
         <div align="center" class="paginate-wrapper">
        	<?php
			$urlVars = "";
			$alb = "";
            echo paginate_array($numPages,$urlVars,$alb,$currentPage);
			?>
         </div>   
    <?php
	}

} 
else //display photos in album 
{

	$albums_in_maindir = scandir($mainFolder);	
	$requested_album = sanitize($_REQUEST['album']); // xss prevention
	
	// check requested album against directory traverse
	if (!in_array($requested_album, $albums_in_maindir)) { ?>
        <span class="title">Photo Gallery &raquo; <a href="<?php echo $album_page_url; ?>" class="refresh">Index</a></span>
		<p></p>
		<?php die('Invalid Request');
	}
	
	$album = $mainFolder.'/'.$requested_album;
	$scanned_album = scandir($album);
	
	$files = array_diff($scanned_album, array('..', '.','thumbs','descriptions.txt'));
	$numFiles = count($files); ?>
	 
	<div class="p10-lr">
		<?php if($fullAlbum==1) { ?>
			<span class="title"><a href="<?php echo $album_page_url; ?>" class="refresh">Index</a></span>
			<span class="title">&raquo;</span>
		<?php } ?>
		<span class="title"><?php echo $requested_album; ?></span> - <?php echo $numFiles; ?> images
	</div>  
	   
	<div class="clear"></div>
	
	<?php
	if($numFiles == 0)
	{ ?>
	    
		 <div class="p10-lr"><p>There are no images in this album.</p></div>
	
	<?php
	}
	else	
	{			
		sort_array($files,$album,$sort_images_by_date); // rearrange array either by date or name
		$numPages = ceil( $numFiles / $numPerPage );
		
		if(isset($_REQUEST['p']))
		{
			$currentPage = ((int)$_REQUEST['p'] > $numPages ? $numPages : (int)$_REQUEST['p']);
		} 
		 else
		{
		 	$currentPage=1;
		}
		 			 
		$start = ($currentPage * $numPerPage) - $numPerPage;
		
		if (!is_dir($album.'/thumbs')) 
		{
			mkdir($album.'/thumbs');
			chmod($album.'/thumbs', 0777);
			//chown($album.'/thumbs', 'apache'); 
		}	 	

		for( $i=0; $i <= $numFiles; $i++ )
		{   
			if(isset($files[$i]) && is_file($album .'/'. $files[$i]))
			{   		    
				$thumb_url_end = '</a>';
				$ext = strtolower(pathinfo($files[$i], PATHINFO_EXTENSION));
				$prefix = substr($files[$i], 0, -(strlen($ext)+1));
				$prefix_begin = mb_substr($prefix, 0, 6); // 1st 6 characters of caption			
			    $full_caption = (itemDescription($album, $files[$i]) ? itemDescription($album, $files[$i]) : $prefix); // image captions
				$num_chars = strlen($full_caption);
				$caption = ($num_chars > $num_captions_chars ? substr($full_caption,0,$num_captions_chars).'...' : $full_caption);
				$caption = encodeto($caption);
					
				switch($prefix_begin)
				{
					case "utube-":
					$video_id = explode('utube-', $prefix);
					$video_id = $video_id[1];
					$thumb_url_start = '<a href="http://www.youtube.com/embed/'.$video_id.'?rel=0&amp;wmode=transparent" title="'.$caption.'" class="albumpix vid">';
					break;
					
					case "vimeo-":
					$video_id = explode('vimeo-', $prefix);
					$video_id = $video_id[1];
					$thumb_url_start = '<a href="http://player.vimeo.com/video/'.$video_id.'" title="'.$caption.'" class="albumpix vid">';
					break;
					
					default:
					$thumb_url_start = '<a href="'.$album.'/'.$files[$i].'" title="'.$caption.'" class="albumpix">';
					break;
				}
									
				if(in_array($ext, $extensions)) 
				{  				  					   
					$thumb = $album.'/thumbs/'.$files[$i];
					if (!file_exists($thumb))
					{
						make_thumb($album,$files[$i],$thumb,$thumb_width); 
					}	   
				   
					if($i<$start || $i>=$start + $numPerPage) { ?><div style="display:none;"><?php } ?>
					<div class="thumb-wrapper">
						<div class="thumb">
							<?php echo $thumb_url_start; ?><img src="<?php echo $thumb; ?>" alt="<?php echo $files[$i]; ?>" /><?php echo $thumb_url_end; ?>
						</div> 
						<?php if($show_captions) { ?>
							<div class="caption">
								<?php if($num_chars > $num_captions_chars) { ?>
									<div class="tooltip-container"><?php echo $caption; ?><span class="tooltip"><?php echo $full_caption; ?></span></div>
								<?php } else { echo $caption; } ?>
							</div>
						<?php } ?> 
					</div>
					<?php if($i<$start || $i>=$start + $numPerPage) { ?></div><?php }
				}
			
			} 
			
		}
		
		?> 
	
		<div class="clear"></div>
		  
		<div align="center" class="paginate-wrapper">
			<?php	 
			$urlVars = "album=".urlencode($requested_album)."&amp;";
			echo paginate_array($numPages,$urlVars,$requested_album,$currentPage);
			?>
		</div>
		
		<?php echo (file_exists($album.'/descriptions.txt') ? '<div class="description-wrapper">'.encodeto(itemDescription($album)).'</div>' : ''); //display album description ?>
	 
	<?php	 
	} // end if numFiles not 0	 

}
?>
</div>