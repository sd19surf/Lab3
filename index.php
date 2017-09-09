<!DOCTYPE html>

<head>
    <title> Discussion 3 </title>
    <meta charset="UTF-8">
    <meta name="description" content="Discussion 3 example of a nested loop with html tables">
    <meta name="keywords" content="HTML,PHP">
    <meta name="author" content="John Delaney">
    <meta name="subject" content="9/4/2017 FALL 2017 SDEV300">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>
<!-- a little css to pretty things up -->
<style>
#main {
   margin: 10%;
   display: inline-block;
   vertical-align: top;
}
#table1 {
   display: inline-block;
   vertical-align: top;
   background-color: gray;
   text-align: center;
   width: 100%;
}
table {
    align: center;
    width: 100%;
}
#table3 {
    align: center;
    width: 30%
}

</style>
<div id="main">
<body>
<h1>Lab 3 with 3 Tables</h1>
<h2> Three tables one with Calculations for geometric figures. One with a quote that has some adjustments. The last one is the arangement of numbers using loops.</h2>
<!-- First set everything that will show me all the variables displayed-->
<?php

// variables set for future use
$radius = 2.65; //meters
$rectangleLength = 4.2; //meters
$rectangleWidth = 5.6; //meters
$triangleBase = 10.2; //meters
$triangleHeight = 5.4; //meters
$squareLength = 5.3; //meters

// Constants
// M_PI is used in PHP 5, PHP 6, and PHP 7 as a constant

//circle information
$circleArea = round((M_PI * $radius * $radius),2);  // pi * radius * radius
$circleCircumference = round((2 * M_PI * $radius),2); // 2 * pi * radius

//rectangle information
$rectangleArea = round(($rectangleLength * $rectangleWidth),2);// length * width
$rectanglePerimeter = round((2*$rectangleLength)+(2*$rectangleWidth),2); // 2*length + 2 * width

// right triangle information
$triangleArea = round(($triangleHeight * $triangleBase / 2),2); //area = (h * b) / 2
//some trickster didn't give me all the info lucky there's a method for that
$triangleHyp = round(hypot($triangleHeight,$triangleBase),2); // a^2 + b^2 = c^2
$trianglePerimeter = $triangleBase + $triangleHeight + $triangleHyp; //perimeter = a + b + c

// Square information
$squareArea = round(pow($squareLength,2),2); // length * length
$squarePerimeter = round(($squareLength * 4),2); // length * 4


// Second Table information variable set up

$originalQuote = "This is our world now... the world of the electron and the switch, the beauty of the baud. We make use of a service already existing without paying for what could be dirt-cheap if it wasn't run by profiteering gluttons, and you call us criminals. We explore... and you call us criminals. We seek after knowledge... and you call us criminals. We exist without skin color, without nationality, without religious bias... and you call us criminals. You build atomic bombs, you wage wars, you murder, cheat, and lie to us and try to make us believe it's for our own good, yet we're the criminals. Yes, I am a criminal. My crime is that of curiosity. My crime is that of judging people by what they say and think, not what they look like. My crime is that of outsmarting you, something that you will never forgive me for.";
$replaceWords = array("we","We","WE");
$replacedQuote = str_replace($replaceWords,"Me",$originalQuote);
$positionQuote[] = array();
$positionQuote = getAllPositions("t",$originalQuote); //array of all the positions
?>

<div id="table1">
<table border="1" padding=".5">
  <tr>
	<td align="center"><strong>Circle</strong><br>
		<img src="img/circle.jpg">
	       <p> Area = <?php print $circleArea; ?> square meters</p>
	       <p> Circumference = <?php print $circleCircumference; ?> meters</p> 
	</td>
	<td align="center"><strong>Rectangle</strong><br>
   		<img src="img/rectangle.jpg">
	       <p> Area = <?php print $rectangleArea; ?> square meters</p>
	       <p> Perimeter = <?php print $rectanglePerimeter; ?> meters</p> 
	</td>
   </tr>
   <tr>
	<td align="center"><strong>Right Triangle</strong><br>
		<img src="img/triangle.jpg">
	       <p> Area = <?php print $triangleArea; ?> square meters</p>
	       <p> Perimeter = <?php print $trianglePerimeter; ?> meters</p> 
	</td>
	<td align="center"><strong>Square</strong><br>
		<img src="img/square.jpg">
	       <p> Area = <?php print $squareArea; ?> square meters</p>
	       <p> Perimeter = <?php print $squarePerimeter; ?> meters</p> 
	</td>
    </tr>
</table>
</div>
<!-- table number 2 quotes and changes -->
<br>
<div id="table2">
<table border="1" padding="0.5">
 <tr>
   <td><center><strong>Original</strong></center><?php print $originalQuote;?></td>
   <td><center><strong>Replaced "we" with "me"</strong></center><?php print $replacedQuote;?></td>
 </tr>
 <tr>
   <td><center><strong>The position of 't'</strong></center><?php foreach($positionQuote as $value){
	 echo "The letter 't' was found at position: $value <br>";
	}
       ?>
   </td>
   <td><center><strong>Upper Case Original</strong></center><?php echo strtoupper($originalQuote);?></td>
 </tr>
</table>
</div>
<div id="table3">
<table>
   <tr>
     <td><strong>Increasing from the left</strong><br>
	<?php 
	   $str="";
	   for($i=1;$i<9;$i++){
             $str = $str.$i."  ";
		echo "$str <br>";
	    }?>
     </td>
     <td align="left"><br><strong>Reducing from the left</strong><br>
	<?php 	   
	   $x = 9;
	   $y = 9;
	     for ($i=0;$i<$x;$i++){
	         for ($j=1;$j<$y;$j++){
                   echo $j."  ";		  
		  }
		 $y--;
		echo "<br>";
		}
	    ?>
     </td>
   </tr>
   <tr>
     <td align="right"><strong>Increasing from the right</strong><br>
	<?php 
	   $str="";
	   for($i=1;$i<9;$i++){
             $str = "  ".$i.$str;
		echo "$str <br>";
	    }?>
     </td>
     <td align="right"><br><strong>Reducing from the right</strong><br>
	<?php 	   
	   $x = 9;
	   $y = 9;
	     for ($i=0;$i<$x;$i++){
	         for ($j=1;$j<$y;$j++){
                   echo $j."  ";		  
		  }
		 $y--;
		echo "<br>";
		}
	    ?>
     </td>
   </tr>
</table>
</div>
</div>



</body>
</html>
<?php
  function getAllPositions($findString,$quote) {
    $offset = 0; 
    $pos = 0;
    $positions = array();
	while (($pos = stripos($quote,$findString,$pos))!== FALSE) {
		$positions[] = $pos;
		$pos = $pos + strlen($findString);
	}
	return $positions;
  }
?>