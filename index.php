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

<body>
<h1>Lab 3 with 3 Tables</h1>
<h2> I believe I took a couple of varibles used to make the loops and added them together at the time of the cell printed</h2>
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

$originalQuote = "
        From childhood's hour I have not been
        As others were; I have not seen
        As others saw; I could not bring
        My passions from a common spring.
        From the same source I have not taken
        My sorrow; I could not awaken
        My heart to joy at the same tone;
        And all I loved, I loved alone.
        Then- in my childhood, in the dawn
        Of a most stormy life- was drawn
        From every depth of good and ill
        The mystery which binds me still:
        From the torrent, or the fountain,
        From the red cliff of the mountain,
        From the sun that round me rolled
        In its autumn tint of gold,
        From the lightning in the sky
        As it passed me flying by,
        From the thunder and the storm,
        And the cloud that took the form
        (When the rest of Heaven was blue)
        Of a demon in my view.";
$replacedQuote = str_replace("we","me",$originalQuote);
$positionQuote[] = array();
$positionQuote = getAllPositions("m",$originalQuote); //array of all the positions
?>

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
<!-- table number 2 quotes and changes -->
<br>
<table border="1" padding="0.5">
 <tr>
   <td><center><strong>Original</strong></center><?php print $originalQuote;?></td>
   <td><center><strong>Replaced "we" with "me"</strong></center><?php print $replacedQuote;?></td>
 </tr>
 <tr>
   <td><center><strong>The position of 'm'</strong></center><?php foreach($positionQuote as $value){
	 echo "The letter 'm' was found at position: $value <br>";
	}
       ?>
   </td>
   <td><center><strong>Upper Case Original</strong></center><?php echo strtoupper($originalQuote);?></td>
 </tr>
</table>
<table>
   <tr>
     <td><strong>Number Increasing</strong><br>
	<?php 
	   $str="";
	   for($i=1;$i<9;$i++){
             $str = $str.$i."  ";
		echo "$str <br>";
	    }?>
     </td>
     <td align="left"><br><strong>Number Reduction</strong><br>
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
     <td align="right"><strong>Number Increasing</strong><br>
	<?php 
	   $str="";
	   for($i=1;$i<9;$i++){
             $str = $str.$i."  ";
		echo "$str <br>";
	    }?>
     </td>
     <td align="right"><br><strong>Number Reduction</strong><br>
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