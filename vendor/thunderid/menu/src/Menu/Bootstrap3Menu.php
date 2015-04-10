<?php namespace ThunderID\Menu;

class Bootstrap3Menu extends Menu implements IMenu {

	protected $ids = [];
	protected $options;

	function __construct($is_inverse_navbar = false, $brand_logo = null)
	{
		$this->options['is_inverse_navbar'] = ($is_inverse_navbar ? true : false);
		$this->options['brand_logo'] 		= ($brand_logo ? $brand_logo : 'Logo');

		$this->add('__left_nav', 'left_nav', '', '');
		$this->add('__right_nav', 'left_nav', '', '');
	}
	
	/**
	 * Render
	 * @return string
	 * @author 
	 **/
	function render()
	{
		$str = '
				<nav class="navbar '. ($this->options['is_inverse_navbar'] ? 'navbar-default' : 'navbar-inverse') .'" role="navigation">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">'.$this->options['brand_logo'].'</a>
					</div>
				
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse navbar-ex1-collapse">';

		if (array_key_exists('children', $this->ids['__left_nav']) && count($this->ids['__left_nav']['children']))
		{
			$str .= '<ul class="nav navbar-nav">';
			$str .= $this->_render($this->ids['__left_nav']);
			$str .= '</ul>';
		}

		if (array_key_exists('children', $this->ids['__right_nav']) && count($this->ids['__right_nav']['children']))
		{
			$str .= '<ul class="nav navbar-nav navbar-right">';
			$str .= $this->_render($this->ids['__right_nav']);
			$str .= '</ul>';
		}

		$str .= '	</div><!-- /.navbar-collapse -->
				</nav>';

		return $str;
	}

	protected function _render($parent_menu, $parent_id = null)
	{
		$str = '';
		if (count($parent_menu['children']))
		{
			foreach ($parent_menu['children'] as $child_menu)
			{
				$str .= '<li><a href="'.$child_menu['url'].'">' . ($child_menu['icon'] ? '<i class="'.$child_menu['icon'].'"></i> ' : '') . $child_menu['label'] . '</a>';
				if (array_key_exists('children', $child_menu) && count($child_menu['children']))
				{
					$str .= $this->_render($child_menu);
				}
				$str .= '</li>';
			}
		}

		return $str;
	}

}
