<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$fp = fopen('./people.csv', 'w');
fputcsv($fp, array(
    'First Name', 'Last Name', 'Date of Birth (Y-m-d)',
));

for ($i = 0; $i < 50000; $i++) {
	$firstName = $faker->firstName;
	$lastName = $faker->lastName;
	$dob = $faker->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d'); 
    
    fputcsv($fp, array(
        $firstName,
        $lastName,
        $dob,
    ));
}

fclose($fp);
