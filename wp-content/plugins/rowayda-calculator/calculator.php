<?php
/*
  Plugin Name: Rowayda Calculator
  Plugin URI: https://github.com/Rowayda-Khayri/calculator
  Description: Make calculations 
  Version: 1.0
  Author: Rowayda Khayri
  Author URI: https://github.com/Rowayda-Khayri
  License: -
  Text Domain: -
*/


add_action('admin_menu','addMenu');


function addMenu() {
    
    //calculator
    add_menu_page('pageTitleCalculator', 'Calculator', 'read', 'Slugcalculator', 'calculate');
    //calculations results
    add_menu_page('Calculations', 'Calculations', 'read', 'Calculations', 'showCalculations');
    
}

function calculate() {
    
    global $wpdb;
    
    echo 'Hi Calculator :)';
    
    ?>

    <div class="container" style="margin-top: 50px">

        <?php

            // If the submit button has been pressed
            if ( isset( $_POST[ 'submit' ] ) ) {
                // Check number values
                if(is_numeric($_POST['number1']) && is_numeric($_POST['number2']))
                {
                    // Calculate total
                    if($_POST['operation'] == 'plus')
                    {
                        $total = $_POST['number1'] + $_POST['number2'];	
                    }
                    if($_POST['operation'] == 'minus')
                    {
                        $total = $_POST['number1'] - $_POST['number2'];	
                    }
                    if($_POST['operation'] == 'times')
                    {
                        $total = $_POST['number1'] * $_POST['number2'];	
                    }
                    if($_POST['operation'] == 'divided by')
                    {
                        $total = $_POST['number1'] / $_POST['number2'];	
                    }

                    // Print total to the browser
                    echo "<h1>{$_POST['number1']} {$_POST['operation']} {$_POST['number2']} equals $total</h1>";
                    
                    //save operation to db
                    add_user_meta( get_current_user_id(), 'num1', $_POST['number1'] );
                    add_user_meta( get_current_user_id(), 'num2', $_POST['number2'] );
                    add_user_meta( get_current_user_id(), 'operation', $_POST['operation'] );
                    add_user_meta( get_current_user_id(), 'result', $total );
                    
                } else {

                    // Print error message to the browser
                    echo 'Numeric values are required';

                }
            }

        ?>

        <!-- Calculator form -->
        <form method="post">
            <input name="number1" type="text" class="form-control" style="width: 150px; display: inline" />
            <select name="operation">
                <option value="plus">Plus</option>
                <option value="minus">Minus</option>
                <option value="times">Times</option>
                <option value="divided by">Divided By</option>
            </select>
            <input name="number2" type="text" class="form-control" style="width: 150px; display: inline" />
            <input name="submit" type="submit" value="Calculate" class="btn btn-primary" />
        </form>

    </div>
	

<?php
}

function showCalculations() {
    
    $user_meta = get_user_meta(get_current_user_id());
//    $user_meta = get_user_meta(get_current_user_id(), 'meta_key', 'nickname');
    
    
    print_r($user_meta); 
//    var_dump($user_meta); 
//    var_dump($user_meta[0]['meta_key'][0]); 
//    foreach ($user_meta as $meta) {
//        echo $meta['meta_key'][0] ;
//        echo $meta->meta_key . "|" . $meta->meta_value ;
//    }
    
    
    
}