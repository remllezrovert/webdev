<?php 
//add your php code here to receive user inputted height and weight
//add your php code to calculate BMI
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">	
    <title>BMI Calculation</title>
    <link rel="stylesheet" href="bmi_style.css">
</head>
<body>
	<main>
		<h1>Body Mass Index Calculation Application</h1>
		     
		<div id='heightInput'>Your height (in inches): 
<?php
    // get the data from the form,  

$filter_options = array( 
    'options' => array( 'min_range' => 0) 
);
$height = $_GET['height'];
if( filter_var( $height, FILTER_VALIDATE_INT, $filter_options ) !== FALSE) {
            echo $height; 
} else {
    echo 'Error invalid input';
    $height = -1;
}

            ?>
        </div>
	
		<div id='weightInput' name="weight">Your weight (in pounds):  
            <?php 



            $weight = $_GET['weight']; 
if( filter_var( $weight, FILTER_VALIDATE_INT, $filter_options ) !== FALSE) {
    echo $weight; 
} else {
    echo 'Error invalid input';
    $weight = -1;
}
            
            //add your php code here to display user's weight input 
            ?> 
        </div>
		
		<div id='bmi'> Your BMI:  
            <?php //add your php code here to display BMI (with one decimal place)
            if ($width == -1 || $height == -1){
                echo 'Invalid input';
            } else {
            $bmi = ($weight * 703) / $height ** 2;
            echo round($bmi, 1);
            }

            ?> 
        </div>


      

      	</main>

  

</body>



</html>
