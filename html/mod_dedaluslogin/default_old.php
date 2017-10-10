<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_login
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
JHtml::_('behavior.keepalive'); 
$urllogin = $params->get('urllogin');
$urlsmartcard = $params->get('urlsmartcard');

$urlok = $params->get('urlok');
$urlko = $params->get('urlko');
$urlok = base64_encode($urlok);
$urlko = base64_encode($urlko);


$redirecturi = $params->get('redirecturi');

if ($redirecturi) {
	
	$questourl = JURI::root();
	$u =JURI::getInstance();
	//$questourl.="?".$u->getQuery();
	$questourl = JURI::current();
	
	$urlok = base64_encode($questourl);
}

$href_smartcard = JRoute::_($urlsmartcard."?urlko=".$urlko."&amp;urlok=".$urlok);
$href_cedolino = JRoute::_($urllogin."?urlko=".$urlko."&amp;urlok=".$urlok);



?>
<?php if ($type == 'logout') : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
<?php if ($params->get('greeting')) : ?>
	<div class="login-greeting">
	<?php if($params->get('name') == 0) : {
		echo ("Ciao ".JText::sprintf(htmlspecialchars($user->get('name'))));
	} else : {
		echo ("Ciao ".JText::sprintf(htmlspecialchars($user->get('name'))));
	} endif; ?>
	</div>
<?php endif; ?>
	<div class="logout-button">
		<input type="submit" name="Submit" class="button" value="<?php echo JText::_('JLOGOUT'); ?>" />
		<input type="hidden" name="option" value="com_users" />
		<input type="hidden" name="task" value="user.logout" />
		<input type="hidden" name="return" value="<?php echo $return; ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
	<div style="margin-top:10px;"/>
</form>
<?php else : ?>
<form action="<?php echo JRoute::_('index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form" >
	<?php if ($params->get('pretext')): ?>
		<div class="pretext"><p><?php echo $params->get('pretext'); ?></p></div>
	<?php endif; ?>
	<fieldset class="userdata">
		<p class="pretext">
			
			<a title="Accedi all'area riservata tramite Smartcard Carta Operatore" style="color:transparent;background-color:transparent;" href="<?php echo($href_smartcard);?>"><img alt="smartcard" style="color:white;" src="<?php echo JURI::base();?>modules/mod_dedaluslogin/images/entra_cert.png"/></a>
			
			<a title="Accedi all'area riservata tramite credenziali Cedolino Web" style="margin-left:20px;color:transparent;background-color:transparent;" href="<?php echo($href_cedolino);?>"><img alt="keyword" src="<?php echo JURI::base();?>modules/mod_dedaluslogin/images/entra_dedalus.png"/></a>
			<a title="Accesso speciale" style="margin-left:20px;color:transparent;background-color:transparent;" href="index.php?option=com_users"><img alt="speciale" src="<?php echo JURI::base();?>modules/mod_dedaluslogin/images/group_key.png"/></a>
		</p>
	<?php echo JHtml::_('form.token'); ?>
	</fieldset>
</form>
<?php endif; ?>