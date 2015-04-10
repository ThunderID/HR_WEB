<?php namespace ThunderID\Menu;

interface IMenu {
	/**
	 * Add menu item
	 * @param string $id unique menu item identifier 
	 * @param string $label menu item's label
	 * @param string $url menu item's url
	 * @param string $icon menu item's icon
	 * @param string $parent_id unique parent menu item identifier
	 * @return boolean
	 * @author 
	 **/
	function add($id, $label, $url, $icon = null, $parent_id = null);

	/**
	 * find particular menuItem
	 *
	 * @return MenuItem|null 
	 * @author 
	 **/
	function find($id);

	/**
	 * Render menu
	 * @return string
	 * @author 
	 **/
	function render();
}
