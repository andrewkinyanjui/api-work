<?php
function changer($x,$sep,$num_sep){
  //e.g if it is called as changer("Engineer-Wairuri-Kamau|20.00,15,6","|",",")
  // initial processing to split name from numbers
  // e.g [Engineer-Wairuri-Kamau,20.00,15,6]
  $x_array=explode($sep,$x);
  // $ x_numbers contains the unprocessed numbers
  // e.g "20.00,15,6"
  $x_numbers=$x_array[1];
  //$x_name contains the unprocessed name
  // e.g. "Engineer-Wairuri-Kamau"
  $x_name=$x_array[0];
  // remove all special characters and replace them with commas
  // e.g "Engineer,Wairuri,Kamau"
  $r_name=preg_replace("/[^A-Za-z0-9 ]/", ',', $x_name);
  //remove all numbers from the name
  // e.g "Engineer,Wairuri,Kamau"
  $r_name=preg_replace("/[0-9 ]/", '', $r_name);
  //convert the name to an array
  // e.g [Engineer,Wairuri,Kamau]
  $r_name_array=explode(',',$r_name);
  // get the first name which is the title from the array
  // e.g "Engineer"
  $r_name_title=$r_name_array[0];
  // convert name to array
  // e.g ['E','n','g','i','n','e','e','r']
  $r_name_title=str_split($r_name_title);
  // get first and last letter
  // e.g "Er"
  $r_name_honorif=$r_name_title[0].end($r_name_title);
  // create the full name from the process done
  // remember to convert names to sentence case
  // e.g Kamau,Wairuri(Er.)
  $fin_name=ucfirst($r_name_array[2]). ",". ucfirst($r_name_array[1]). "(". ucfirst($r_name_honorif) .'.)';
  //now start working on the x_numbers
  //convert $x_numbers to an array using the separator given
  // e.g[20.00,15,6]
  $x_numbers_array=explode($num_sep,$x_numbers);
  //get a sun of the numbers and store the result
  $x_total=array_sum($x_numbers_array);
  // create an empty array to store the numners in int format
  $fin_numbers_array=[];
  //loop through your array of numbers
  foreach ($x_numbers_array as $x_num) {
    // convert the numbers to int type and push them to your array
        $fin_numbers_array[]=(int)$x_num;
  }
  //display the values in the proper formatting
  echo '<table style=" border:1px solid black;border-collapse: collapse;" >';
    echo '<tr style=" border:1px solid black;">';
          echo '<td style=" border:1px solid black;">';
                  echo $fin_name.' ';
          echo '</td>';
          // end of first cell
          echo '<td style=" border:1px solid black;">';
                  echo implode(',',$fin_numbers_array).' ';
          echo '</td>';
          // end of second cell
          echo '<td style=" border:1px solid black;">';
                  echo $x_total.' ';
          echo '</td>';
    echo '</tr>';
echo '</table>';
// end of table
}
// function trial
changer("Engineer-Wairuri-Kamau|20.00,15,6","|",",");
?>
