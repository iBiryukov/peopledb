<?php
require_once 'vendor/autoload.php';

$faker = Faker\Factory::create();

$fp = fopen('./people.csv', 'w');
fputcsv($fp, array(
    'First Name', 'Last Name', 'Date of Birth (Y-m-d)',
    'State', 'Sex', 'Height (cm)', 'Weight (KG)',
));

$sex = array('male', 'female');

for ($i = 0; $i < 50000; $i++) {
	$firstName = $faker->firstName;
	$lastName = $faker->lastName;
	$dob = $faker->dateTimeBetween('-50 years', '-20 years')->format('Y-m-d'); 
	$state = $faker->state;
	$height = rand(150, 200);
	$weight = rand(50, 160);
    
    fputcsv($fp, array(
        $firstName,
        $lastName,
        $dob,
        $state,
        $sex[rand(0, 1)],
        $height,
        $weight,
    ));
}

fclose($fp);
