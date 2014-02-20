<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_whosonline
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
?>


<div id="cursuslocaties" class="uk-grid">
    <div class="uk-button-dropdown uk-width-1-1" data-uk-dropdown="{justify:'#<?php echo $connectID; ?>'}">
        <button class="uk-button uk-button-large uk-width-1-1">Kies uw locatie
			<i class="uk-icon-caret-down uk-margin-left"></i>
		</button>
        <div class="uk-dropdown">
			<div class="uk-scrollable-text">
				<ul class="uk-nav uk-nav-dropdown">
					<?php foreach ($locaties as $locatie) : 
						$link = $zoo->route->item($locatie);
					?>
					<li>
						<a href="<?php echo $link; ?>"><?php echo $locatie->name; ?></a>
					</li>
					<?php endforeach; ?>
				</ul>
			</div>
		</div>
    </div>
</div>