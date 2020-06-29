<?php
/**
* This script is built for purpose of creating the clone of a php array unique function.
* Three examples are also presented, in certain manner of a test run.
* I will try to make an elegant as possible script that can be used as a form of tutorial/ test case.
* Just to note that camel case was used as a function naming convention, and also the function will have a rule to have only one
* return statement, and that each variable is initialized in appropriate scope before being used/ assigned a value.
* 
* @author Milan R. Cvetkovic
* @version v1.0
*/

// Turn on error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(-1);
error_reporting(E_ALL);

// Some basic inline css rule
$color_blue   = 'style="color: blue;"';
$color_orange = 'style="color: orange;"';
$color_green  = 'style="color: green;"';

// $a = [1,2,3,3,3,4,4,10,13,15,15,17]; 					// Example 1 - Integers only - Two of the same elements are side by side
$a = [1,2,3,3,1,3,3,4,4,10,13,3,3,15,15,17]; 				// Example 1 - Integers only - Two of the same elements are side by side, 
															// 							   and there are duplicates latter in array
$b = [1,2,'A','A','A',4,4,10,13,'a','a',17]; 				// Example 2 - Mixed values
$c = ['B','C','A','A','A','d','d','E','f','a','a','G']; 	// Example 3 - Letters only

echo "<h1>Horisen Test - Task 1</h1>";
echo "<hr/>";
echo "<b>Duplicates a (<span {$color_orange}>Integers only</span>):</b><br/>";
var_dump($a);
echo "---<br/><br/>";

$d = removeDuplicates($a);

echo "<b {$color_blue}>Unique a:</b><br/>";
var_dump($d);
echo "<hr/>";
echo "<hr/>";
echo "<b>Duplicates b (<span {$color_orange}>Mixed values</span>):</b><br/>";
var_dump($b);
echo "---<br/><br/>";

$e = removeDuplicates($b);

echo "<b {$color_blue}>Unique b:</b><br/>";
var_dump($e);
echo "<hr/>";
echo "<hr/>";
echo "<b>Duplicates c (<span {$color_orange}>Letters only</span>):</b><br/>";
var_dump($c);
echo "---<br/><br/>";

$f = removeDuplicates($c);

echo "<b {$color_blue}>Unique: c</b><br/>";
var_dump($f);
echo "<hr/>";

// ****** EOF SCRIPTS RUN-TIME PART ****** //

/**
* Function removeDuplicates
*
* This function accepts an array of non-unique elements as an entry parameter.
* Then, it process it the old fashion way, without built PHP functions or any external library.
* Basically it should mimmic php array_unique function.
* 
* Upgrade: Possiblity to sort the unique array of values before it is returned.
* 
* (W) But, basic functionality is achieved.
* 
* @param 	$mixed 	boolean | array 	This should be an array with non-unique elements. 
* 										By default it's boolean false.
* @return 	$unique boolean | array 	Returns boolean false on failure and array of unique values on success.
* 										We could go for solution to return empty array and be consistent about the return value type, 
* 										but that would require extra check on the end where this function is called. 
* 										This way we only need simple IF statement to do the checking.
*/
function removeDuplicates($mixed = false)
{
	$unique = false;
	if ($mixed)
	{
		$previous_element = false;
		$current_element  = false;
		$unique2          = false;

		foreach ($mixed as $key => $value) 
		{
			$current_element = $value;
			
			if ($current_element != $previous_element)
			{
				if ($unique2)
				{
					$c = 0;
					
					foreach ($unique2 as $key2 => $uvalue) 
					{
						if ($uvalue == $current_element)
						{
							$c++;
						}
					}

					if ($c == 0)
					{
						$unique2[] = $current_element;
						$unique    = $unique2;
					}
				}
				else
				{
					$unique2[] = $current_element;
					$unique    = $unique2;
				}
			}
			$previous_element = $current_element;
		}
	}
	return $unique;
}
?>