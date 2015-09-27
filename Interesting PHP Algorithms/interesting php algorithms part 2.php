<?php
  /*
  Algorithm that runs 20 times.
  On each run it requests the user to enter a number
  if the number if odd it adds that number to 0 the first time
  and to the previous number the user entered on subsequent times
  if the number is even it moves to the next iteration (of the 20)
  requesting a new number.
  At the end of the run it outputs the total sum of all odd numbers entered
   */

  $sum = 0;
  
  $i = 1;
  while ($i <= 20) {
    $a = trim(fgets(STDIN));
    if ($a % 2 != 0) { 
      $sum = $sum + $a;
    }
    $i++;
  }
  echo $sum;
?>


<?php

/*
  Algorithm requests a number then requests a second number,
  it multiplies the second number by p=1 and increments i=1 by 1
  Running as many times as the first number the user entered
  it requests each time a number which it then multiplies
  by the result of the previous multiplication of p with the second
  number
 */

  $n = trim(fgets(STDIN));
  
  $p = 1;

  $i = 1;
  do {
    $a = trim(fgets(STDIN));
    $p = $p * $a;

    $i++;
  } while ($i <= $n);
  
  echo $p;
?>



<?php

/*
  Algorithm: user enters the number of iterations
  he wants the algorithm to run, then algorithm requests
  for each iteration that the user enter a value, that
  value is added to 0 on the first iteration and to the
  sum of all previous values entered on subsequent iterations.
  At the end of all iterations the algorithm echoes out the
  average value by dividing the total sum by the number of iterations
  if the user entered 0 as the number of iterations in the begining
  the script returns an error message
 */

  echo "Enter quantity of numbers to enter: ";
  $n = trim(fgets(STDIN));

  $sum = 0;
  for ($i = 1; $i <= $n; $i++) {
    echo "Enter number #", $i, ": ";
    $a = trim(fgets(STDIN)); 
    $sum = $sum + $a;
  }
  
  if ($n > 0) {
    $average = $sum / $n;
    echo "The average value is: ", $average;
  }
  else {
    echo "You didn’t enter any number!";
  }
?>

<?php
/*
The Algorithm displays a table
1 1
1 2
1 3
2 1
2 2
2 3
3 1
3 2
3 3
 */

  for ($i = 1; $i <= 2; $i++) {
    for ($j = 1; $j <= 3; $j++) {
      echo $i, " ", $j, "\n";
    }
  }
?>

<?php
/*
Algorithm for searching letters within a string:
define a string and enter the letter to search.
The algorithm iterates on as many letters as the string
has and while the letter is not found.
on each iteration we move through different positions in
the string and check whether there's a match with the letter
if there is a match variable $found is set to true and the loop
stops.
Finally the script outputs a message saying that the letter
has been found.
 */

  $s = "I have a dream";
  
  echo "Enter a letter to search: ";
  $letter = trim(fgets(STDIN));
  
  $found = false;
  $i = 0;
  while ($i <= strlen($s) - 1 && $found == false) {
    if ($s[$i] == $letter) { 
      $found = true;
    }
    $i++;
  }
  if ($found == true) {
    echo "Letter ", $letter, " found!";
  }
?>


<?php 
/*
  Algorithm runs a loop eight times each time outputting
  X squared where x is equal to the previous run value of
  X squared, starting with 2 squared. So
  4, 16, and so on... it only prints the final value of
  squaring squares eight times
 */
  $x = 2;

  $i = -4;
  while ($i <= 4) {
    $x = pow($x, 2);
    $i++;
  }

  echo $x;
?>

<?php

/*
Alorightm that runs 5 times each time
taking 1, 3, 5, and 7 to the power of 2 and saving it to variable $s
$s is defined as that previous operation plus the new powered value
 */
  $s = 0;
  for ($i = 1; $i <= 9; $i += 2) {
    $s = $s + pow($i, 2);
  }
  echo $s;
?>

<?php

/*
Algorithm asks to enter two numbers, adds 2 to a and sets new value to a, and prints a+2:b, then adds 5 to b.
While b is less or equal to a continues to do this.
 */
  $a = trim(fgets(STDIN));
  $b = trim(fgets(STDIN));
  
  $a += 2;
  echo $a, ":", $b;
  $b = $b + 5; 

  while ($b <= $a) {
    $a += 2; 
    echo $a, ":", $b;
    $b = $b + 5;
  } 
?>

<?php
/*
sets y to 1 and x to 0, then multiplies 0*2 and sets value to x, and 1+1 and sets value to y.
While y is less than 10 continues to do this echoing x. Zero will print as many times as the loop runs.
 */ 
  $y = 1;
  $x = 0;
  do {
    $x = $x * 2;
    $y = $y + 1;
  } while ($y < 10);
  echo $x;
?>

<?php 
/*
User determines how many times the loop will run, setting start and end values
 */
  $start = trim(fgets(STDIN));
  $end = trim(fgets(STDIN));
  $x = 5;

  for ($i = $start; $i <= $end; $i++) {
    $x = pow($x, 1.5);
  }
  echo $x;
?>

<?php 
/*
User determines how many times the loop will run, keeping the loop running so long the start
is less than the end with a do while loop as an alternative to the for loop in the example above.
 */
  $start = trim(fgets(STDIN));
  $end = trim(fgets(STDIN));
  $x = 5;

  $i = $start;
  if ($i <= $end) {
    do {
      $x = pow($x, 1.5);
      $i++;
    } while ($i <= $end);
  }
  echo $x;
?>

<?php 
/*
Runs a loop whose internal values and values determinining run time are calculated on the basis of both
data entered by the user and an internal formula
 */
  $s = 0;
  $a = trim(fgets(STDIN));
  $i = $a;
  $s = $s + $i; 
  $i = $i + 3;
  $s = $s + pow($i, 2);

  for ($i = $a + 3; $i <= 59; $i = $i + 3) {
    $s = $s + $i;

    $s = $s + pow($i + 3, 2); 
  }
  echo $s;
?>


<?php

/*
Prints 1 x 1 = 1, 1 x 2 = 2, 1 x 3 = 3 and so on until 9 x 9 = 81
 */
  for ($i = 1; $i <= 9; $i++) {
    for ($j = 1; $j <= 9; $j++) {
      echo $i, "x", $j, "=", $i * $j, "\t";
    }
    echo "\n";
  }
?>


<?php   
/*
Setting a maximum weight and checking if it is the maximum value set for that variable
 */
  $max = -1;

  for ($i = 1; $i <= 10; $i++) {
    echo "Enter a weight: ";
    $w = trim(fgets(STDIN));
    if ($w > $max) {
      $max = $w;
    }
  }
  echo $max;
?>

<?php

/*
Divide total sum by the count, get dynamic averages
 */

  $s = 0;
  $count = 0;
  for ($i = 1; $i <= 100; $i++) {
    $x = trim(fgets(STDIN));
    if ($x > 0) {
      $s = $s + $x;
      $count++;
    }
  }
  if ($count != 0) {
    echo $s / $count;
  }
  else {
    echo "No numbers entered!";
  }
?>


<?php
/*
Keep track of the score between two numbers, maybe two players competing against whose number is largest
 */
  $count_a = 0;
  $count_b = 0;
  
  for ($i = 1; $i <= 10; $i++) {
    echo "Enter number A: ";
    $a = trim(fgets(STDIN));
    echo "Enter number B: ";
    $b = trim(fgets(STDIN));
    
    if ($a > $b) {
      $count_a++;
    }
    elseif ($b > $a) {
      $count_b++;
    }
  }
  echo $count_a, $count_b;
?>


<?php
/*
Print the count of of times a number added to itself fits in 999, for example 100 fits 9 times
 */
  $count = 0;
  $sum = 0;     //Initialization of $sum
  do {
    $x = trim(fgets(STDIN));
    $count++;
    $sum += $x;     //Update/alteration of $sum
  } while ($sum < 1000);
  echo $count;
?>


<?php
/*
Keep track of the score between three types of numbers: single, double and triple digit numbers.
 */
  $count1 = 0;
  $count2 = 0;
  $count3 = 0;
  
  for ($i = 1; $i <= 20; $i++) {
    echo "Enter a number: ";
    $a = trim(fgets(STDIN));
    
    if ($a <= 9) {
      $count1++;
    }
    elseif ($a <= 99) {
      $count2++;
    }
    else {
      $count3++;
    }
  }
  echo $count1, $count2, $count3;
?>

<?php
/*
Perform a math operation and ask player if they want to repeat the operation.
 */
  do {
    echo "Enter two numbers: ";
    $a = trim(fgets(STDIN));
    $b = trim(fgets(STDIN));
    
    $result = pow($a, $b);
    echo "The result is: ", $result, "\n";
    
    echo "Would you like to repeat?";
    $answer = trim(fgets(STDIN));
  } while (strtoupper($answer) == "YES");
