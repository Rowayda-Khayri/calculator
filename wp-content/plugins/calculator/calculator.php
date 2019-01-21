<?php
/*
  Plugin Name: Calculator
  Plugin URI: https://github.com/Rowayda-Khayri/calculator
  Description: Make calculations 
  Version: 1.0
  Author: Rowayda Khayri
  Author URI: https://github.com/Rowayda-Khayri
  License: -
  Text Domain: -
*/


add_action("admin_menu","addMenu");


function addMenu() {
    
    add_menu_page("Calculator", "Calculator",4, "calculator");
}


?>


