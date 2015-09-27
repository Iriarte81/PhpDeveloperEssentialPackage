<?php
/*
x = 1 => when i = 100, will echo 100, when i= 110, will echo 110, when i= 111, will echo 111, when i= 102, will echo 102 
x = 2 => when i = 200, will echo 200
x = 3 => when i = 300, will echo 300

No sure will have to run the script to see
 */


  echo "Enter a digit 0 - 9: ";
  $x = trim(fgets(STDIN));
  
  for ($i = 100; $i <= 999; $i++) {
    $digit3 = intval($i / 100);
    $r = $i % 100;

    $digit2 = intval($r / 10);
    $digit1 = $r % 10;
    
    if ($digit3 == $x || $digit2 == $x || $digit1 == $x) {
      echo $i, "\n";
    }
  }
?>



<?php
/*
Runs all digits from 100 to 999 in the form of the loop
then checks if x = to any of the digits, it prints
for example if i=120 will print if x=1 or x=2
for example if i=555 will not print if x=1
what will it print?
the actual number of the iteration
for example if x = 2
it will print when iteration reaches 200, 220, 202 and 222
 */
  echo "Enter a digit 0 - 9: ";
  $x = trim(fgets(STDIN));
	
  for ($digit3 = 1; $digit3 <= 9; $digit3++) {
    for ($digit2 = 0; $digit2 <= 9; $digit2++) {
      for ($digit1 = 0; $digit1 <= 9; $digit1++) {
        if ($digit3 == $x || $digit2 == $x || $digit1 == $x) {
          echo $digit3 * 100 + $digit2 * 10 + $digit1, "\n";
        }
      }
    }
  }
?>