<?php
/*
Plugin Name: ICF Actions
Plugin URI: http://innerchildfun.com
Description: Run an action from a widget
Author: Mark Deneen
Author URI: http://innerchildfun.com
*/

class ICFAction extends WP_Widget
{
	public function __construct() {
		parent::__construct("icf_action", "ICF Action Widget",
					array("description" => "A widget to call an action where the widget is included"));
	}
	public function form($instance) {
		$action = "";
		if(!empty($instance)) {
			$action = $instance["action"];
		}
		$tableId = $this->get_field_id("action");
		$tableName = $this->get_field_name("action");
		echo '<label for"' . $tableId . '">Action</label><br>';
		echo '<input id="' . $tableId . '" type="text" name="' . $tableName . '" value="' . $action . '"><br>';
	}
	public function update($newInstance, $oldInstance) {
		$values = array();
		$values["action"] = $newInstance["action"];
		return $values;
	}
	public function widget($args, $instance) {
		$action = $instance["action"];
		do_action($action);
	}
}

add_action("widgets_init", function() { register_widget("ICFAction"); });

?>
