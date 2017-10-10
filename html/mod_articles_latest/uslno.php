<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>
<div style="float:left;"><h4>Notizie</h4></div><div style="float:right;"><a href="index.php/notizie">(elenco completo)</a></div>
<div style="clear:both;"/>
<ul class="latestnews<?php echo $moduleclass_sfx; ?>">
<?php foreach ($list as $item) :  ?>
	<li >
		
			<span >
			<strong>
				<?php 
				
				if (!empty($item->tags->itemTags[0]))
				echo($item->tags->itemTags[0]->title." - ");
				$date = new JDate($item->created);
				 echo $date->format('d M Y'); ?> </strong><br/>
				<?php echo JHtml::_('string.truncate', strip_tags($item->title), 80);
				echo ("<strong> <a href='".$item->link."' title='".$item->title."'>(leggi tutto)</a></strong>");
				//echo(var_dump ($item));
				?>
			</span>
		
	</li>
<?php endforeach; ?>
</ul>
