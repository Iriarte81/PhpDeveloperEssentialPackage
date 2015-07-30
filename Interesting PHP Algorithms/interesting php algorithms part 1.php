<?php
// obtain each of the digits of a three digit
// integer by obtaining the remaiders (modulus)
// then reverse it multiplying each of the digits
// to put them in a different position

  echo "Enter a three-digit integer: ";
  $number = trim(fgets(STDIN));
  
  $digit3 = $number % 10;		//This is the rightmost digit
  $r = intval($number / 10);

  $digit2 = $r % 10;		//This is the digit in the middle
  $digit1 = intval($r / 10);  	//This is the leftmost digit
   
  $reversed = $digit3 * 100 + $digit2 * 10 + $digit1;
  echo $reversed;
?>

<?php
// obtain the exact number of days, hours, minutes,
// and seconds by dividing by each unit of time
// and obtaining the reminder (moudulus) for the
// next unit of time
  echo "Enter a period of time in seconds: ";
  $number = trim(fgets(STDIN));
   
  $days = intval($number / 86400);	// 60 * 60 * 24 = 86400
  $r = $number % 86400;
  
  $hours = intval($r / 3600);		// 60 * 60 = 3600
  $r = $r % 3600;
  
  $minutes = intval($r / 60);
  $seconds = $r % 60;
  
  echo $days, " days ", $hours, " hours ";
  echo $minutes, " minutes and ", $seconds, " seconds";
?>

<?php

// Deterimne even or odd numbers by using modulus equals
  echo "Enter a number: ";
  $x = trim(fgets(STDIN));
  
  if ($x % 2 == 0) {
    echo "Even";
  }
  else {
    echo "Odd";
  }
?>

<?php
// determine greatest value by using conditional
// and comparison
  $a = trim(fgets(STDIN));
  $b = trim(fgets(STDIN));
  
  $max = $a;
  if ($b > $a) {
    $max = $b;
  }
  
  echo "Greatest value: ", $max;
?>

<?php
// the order of conditional elseifs matters
// here determine the number of digits of a
// number
  echo "Enter a number (0 - 999): ";
  $x = trim(fgets(STDIN));
  
  if ($x <= 9) {
    $count = 1;
  }
  elseif ($x <= 99) {
    $count = 2;
  }
  else {
    $count = 3;
  }

  echo "You entered a ", $count, "-digit number";
?>

<?php

// an example using nested if statements
// for conversion from one unit to another
// by use of a coefficient constant
// 
  define ("COEFFICIENT", 3.785);
  
  echo "1: Gallons to liters\n";
  echo "2: Liters to gallons\n";
  echo "Enter choice: ";
  $choice = trim(fgets(STDIN));
    
  echo "Enter quantity: ";
  $quantity = trim(fgets(STDIN));
  
  if ($choice < 1 || $choice > 2) {
    echo "Wrong choice!";
  }
  elseif (is_numeric($quantity) != true) {
    echo "Invalid quantity!";
  }
  else {
    if ($choice == 1) {
      $result = $quantity * COEFFICIENT;
      echo $quantity, " gallons equal to ", $result, " liters";
    }
    else {
      $result = $quantity / COEFFICIENT;
      echo $quantity, " liters equal to ", $result, " gallons";
    }
  }
?>

<?php
// Implementation of a simple calculator program
  echo "Enter 1st number: ";
  $a = trim(fgets(STDIN));
  echo "Enter type of operation: ";
  $op = trim(fgets(STDIN));
  echo "Enter 2nd number: ";
  $b = trim(fgets(STDIN));
  
  switch ($op) {
    case "+":
      echo $a + $b;
      break;
    case "-":
      echo $a - $b;
      break;
    case "*":
      echo $a * $b;
      break;
    case "/":
      if ($b == 0) {
        echo "Error: Division by zero";
      }
      else {
        echo $a / $b;
      }
      break;
  }
?> 

<?php
// script to determine the heaviest person

  echo "Enter the weight of the first person: ";
  $w1 = trim(fgets(STDIN));

  echo "Enter the name of the first person: ";
  $n1 = trim(fgets(STDIN));

  echo "Enter the weight of the second person: ";
  $w2 = trim(fgets(STDIN));

  echo "Enter the name of the second person: ";
  $n2 = trim(fgets(STDIN));  

  echo "Enter the weight of the third person: "; 
  $w3 = trim(fgets(STDIN));

  echo "Enter the name of the third person: "; 
  $n3 = trim(fgets(STDIN));
  
  $max = $w1;
  $m_name = $n1;		//This variable holds the name of the heaviest person

  if ($w2 > $max) {
    $max = $w2;
    $m_name = $n2;		//Someone else is heavier. Keep his or her name.
  }

  if ($w3 > $max) {
    $max = $w3;
    $m_name = $n3;              //Someone else is heavier. Keep his or her name.   
  }

  echo "The heaviest person is ", $m_name;
  echo "\nHis or her weight is ", $max;
?>

<?php

// script to determine the lowest of four numbers
  echo "Enter the weight of four men:";

  $w1 = trim(fgets(STDIN));
  $w2 = trim(fgets(STDIN));
  $w3 = trim(fgets(STDIN));
  $w4 = trim(fgets(STDIN));

  //memorize the weight of the first person
  $min = $w1;

  //if second one is lighter, forget
  //everything and memorize this weight
  if ($w2 < $min) {
    $min = $w2;
  }

  //if third one is lighter, forget
  //everything and memorize this weight
  if ($w3 < $min) {
    $min = $w3;
  }

  //if fourth one is lighter, forget
  //everything and memorize this weight
  if ($w4 < $min) {
    $min = $w4;
  }

  echo $min;

?>

<?php

// determine surcharge based on number of text messages
// sent or items consumed etc...
// 
  echo "Enter number of text messages sent: ";
  $count = trim(fgets(STDIN));
  
  if ($count <= 50) {
    $extra = 0;
  }
  elseif ($count <= 150) {
    $extra = ($count - 50) * 0.05;
  }
  else {
    $extra = 100 * 0.05 + ($count - 150) * 0.10;
  }

  $total_without_tax = 8 + $extra;
  $tax = $total_without_tax * 10 / 100;
  $total = $total_without_tax + $tax;
  
  echo "Total amount to pay: ", $total;
?>

<?php
// determine if number is a palindrome

  $x = trim(fgets(STDIN));
  
  if (is_numeric($x) != true) {
    echo "You entered non-numeric characters";
  }
  elseif ($x < 10000) {
    echo "You entered less than five digits";
  }
  elseif ($x > 99999) {
    echo "You entered more than five digits";
  }
  else {
    $digit1 = intval($x / 10000);
    $r = $x % 10000;
    $digit2 = intval($r / 1000);
    $r = $r % 1000;
    $digit3 = intval($r / 100);
    $r = $r % 100;
    $digit4 = intval($r / 10);
    $digit5 = $r % 10;

    if ($digit1 == $digit5 && $digit2 == $digit4) {
      echo "Palindrome";
    }
    else {
      echo "Not Palindrome";
    }
  }
?>


<?php

// determine if year is leap year or not
  echo "Enter a year: ";
  $y = trim(fgets(STDIN));
  
  if (is_numeric($y) == true) {
    if ($y % 4 == 0 && $y % 100 != 0 || $y % 400 == 0) {
      echo "Leap year!";
    }
    else {
      echo "Not a leap year";
    }
  }
  else {
    echo "Invalid Number";
  }
?>