<?php
/**
* @package   com_zoo
* @author    YOOtheme http://www.yootheme.com
* @copyright Copyright (C) YOOtheme GmbH
* @license   http://www.gnu.org/licenses/gpl.html GNU/GPL
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// register ElementOption class
App::getInstance('zoo')->loader->register('ElementOption', 'elements:option/option.php');

/*
	Class: ElementSelect
		The select element class
*/
class ElementSelectlocatie extends ElementOption {

	/*
	   Function: edit
	       Renders the edit form field.

	   Returns:
	       String - html
	*/
	public function edit(){

		// init vars
		$db = JFactory::getDbo();
		$db->setQuery($db->getQuery(true)
			->select("alias AS value, name AS text")
			->from("#__zoo_item")
			->where("type = 'cursus' AND state = 1")
			->order("name ASC")
		);
		$options_from_config = $db->loadObjectList();
		$multiple 			 = $this->config->get('multiple');
		$default			 = $this->config->get('default');
        $name   			 = $this->config->get('name');

		if (count($options_from_config)) {

			// set default, if item is new
			if ($default != '' && $this->_item != null && $this->_item->id == 0) {
				$this->set('option', $default);
			}

			$options = array();
            if (!$multiple) {
                $options[] = $this->app->html->_('select.option', '', '-' . JText::sprintf('Select %s', $name) . '-');
            }
            foreach ($options_from_config as $option) {
				$options[] = $this->app->html->_('select.option', $option->value, $option->text);
			}

			$style = $multiple ? 'multiple="multiple" size="5"' : '';

			$html[] = $this->app->html->_('select.genericlist', $options, $this->getControlName('option', true), $style, 'value', 'text', $this->get('option', array()));

			// workaround: if nothing is selected, the element is still being transfered
			$html[] = '<input type="hidden" name="'.$this->getControlName('select').'" value="1" />';

			return implode("\n", $html);
		}

		return JText::_("There are no options to choose from.");
	}

}