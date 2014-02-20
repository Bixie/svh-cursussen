<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_whosonline
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

require_once(JPATH_ADMINISTRATOR.'/components/com_zoo/config.php');
$zoo = App::getInstance('zoo');

$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

$connectID = $params->get('connectID','cursuslocaties');

if ($application = $zoo->table->application->get($params->get('application', 1))) {

	$locaties = $zoo->table->item->getByType('cursus', 1, true, null, array('_itemname'), 0, 0);


	require JModuleHelper::getLayoutPath('mod_cursuslocatie', $params->get('layout', 'default'));
}
