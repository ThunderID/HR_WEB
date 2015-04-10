<?php namespace ThunderID\Menu;

use Exception;

abstract class Menu implements IMenu {

	protected $ids = [];
	protected $options;

	/**
	 * Add menu item
	 * @param string $id unique menu item identifier 
	 * @param IMenuItem $menu_item menu item
	 * @param string $parent_id unique parent menu item identifier
	 * @return boolean
	 * @author 
	 **/
	function add($id, $label, $url, $icon = null, $parent_id = null)
	{
		$this->ids[$id] = ['label' => $label, 'url' => $url, 'icon' => $icon];
		if ($parent_id)
		{
			if (!array_key_exists($parent_id, $this->ids))
			{
				throw new Exception('$parent_id not found', 1);
			}
			else
			{
				$this->ids[$parent_id]['children'][] = &$this->ids[$id];
				$this->ids[$id]['parent'] = &$this->ids[$parent_id];
			}
		}
	}

	/**
	 * find particular menuItem
	 *
	 * @return MenuItem|null 
	 * @author 
	 **/
	function find($id)
	{
		if (!array_key_exists($id, $this->ids))
		{
			throw new Exception('$id not found', 1);
		}
	}


}
