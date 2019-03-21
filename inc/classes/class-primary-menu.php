<?php
/**
 * This is custom IU for primary menu.
 *
 * @package lifestyle
 */

/**
 * This is Primary walker class.
 */
class Primary_Menu extends Walker {

	/**
	 * Tell Walker where to inherit it's parent and id values.
	 *
	 * @var array This is array for parent value.
	 */
	public $db_fields = array(
		'parent' => 'menu_item_parent',
		'id'     => 'db_id',
	);

	/**
	 * At the start of each element, output a <li> and <a> tag structure.
	 *
	 * Note: Menu objects include url and title properties, so we will use those.
	 *
	 * @param Walker_Nav_Menu $output This is menu output.
	 * @param Object          $item $item This is object of Walker_Nav_Menu.
	 * @param int             $depth This is depth value.
	 * @param array           $args This attributes array.
	 * @param int             $id This may get id for menu item.
	 */
	public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$output .= sprintf(
			"\n<li class='menu-list__item text text--uppercase'><a href='%s'>%s</a></li>\n",
			$item->url,
			$item->title
		);
	}
}
