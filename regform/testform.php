<?php
/*Test file for checking input receives during registration */

$firstname = $_POST['fname'].PHP_EOL;
$lastname = $_POST['lname'].PHP_EOL;
$email = $_POST['email'].PHP_EOL;
$password = $_POST['password'].PHP_EOL;
$day = $_POST['day'].PHP_EOL;
$month = $_POST['month'].PHP_EOL;
$year = $_POST['year'].PHP_EOL;
$country = $_POST['country'].PHP_EOL;
$city = $_POST['city'].PHP_EOL;
$postcode = $_POST['postcode'].PHP_EOL;
$address = $_POST['address'].PHP_EOL;
$motiv = $_POST['motivation'].PHP_EOL;
$admin = $_POST['admin'].PHP_EOL;
$anim = $_POST['animal'].PHP_EOL;
$arts = $_POST['arts'].PHP_EOL;
$caring = $_POST['caring'].PHP_EOL;
$child = $_POST['child'].PHP_EOL;
$cooking = $_POST['cooking'].PHP_EOL;
$mentoring = $_POST['mentoring'].PHP_EOL;
$env = $_POST['envir'].PHP_EOL;
$youth = $_POST['youths'].PHP_EOL;
$all = $_POST['all'].PHP_EOL;
$time = $_POST['time'].PHP_EOL;
$type = $_POST['type'].PHP_EOL;


$myFile = "form.txt";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, 'First name '.$firstname); 
fwrite($fh, 'Last name '.$lastname);
fwrite($fh, 'Email '.$email);
fwrite($fh, 'Password '.$password);
fwrite($fh, 'Day '.$day);
fwrite($fh, 'Month '.$month);
fwrite($fh, 'Year '.$year);
fwrite($fh, 'Country '.$country);
fwrite($fh, 'City '.$city);
fwrite($fh, 'Postcode '.$postcode);
fwrite($fh, 'Address '.$address);
fwrite($fh, 'Motivation '.$motiv);
fwrite($fh, 'Administration  '.$admin);
fwrite($fh, 'Animal  '.$anim);
fwrite($fh, 'Arts  '.$arts);
fwrite($fh, 'Caring  '.$caring);
fwrite($fh, 'Child  '.$child);
fwrite($fh, 'Cooking  '.$cooking);
fwrite($fh, 'Mentoring  '.$mentoring);
fwrite($fh, 'Env  '.$env);
fwrite($fh, 'Youths  '.$youth);
fwrite($fh, 'All  '.$all);
fwrite($fh, 'Time commitment  '.$time);
fwrite($fh, 'Type  '.$type);


fclose($fh);   

?>