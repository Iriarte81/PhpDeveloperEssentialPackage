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

