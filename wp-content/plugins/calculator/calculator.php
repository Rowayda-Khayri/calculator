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


add_action('admin_menu','addMenu');


function addMenu() {
    
    add_menu_page('pageTitleCalculator', 'menuTitleCalculator', 4, 'Slugcalculator', 'calculate');
    
}

function calculate() {
    
    echo 'Hi Calculator :)';
    
    ?>
    <html>
	<head>
		<title>Calculator</title>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		
		<div class="container" style="margin-top: 50px">
		
			<?php
			
				// If the submit button has been pressed
				if(isset($_POST['submit']))
				{
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
//						echo "<h1>{$_POST['number1']} {$_POST['operation']} {$_POST['number2']} equals {$total}</h1>";
					
					} else {
						
						// Print error message to the browser
						echo 'Numeric values are required';
					
					}
				}
			
			?>
		    
		    <!-- Calculator form -->
		    <form method="post" action="calculator.php">
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
	
	</body>
</html>


<?php
}


?>


