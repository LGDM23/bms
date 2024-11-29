<?php
header('Content-Type: application/json');
include('./database.php');

$sqlGender = "SELECT gender, COUNT(*) as count FROM users GROUP BY gender";
$resultGender = $con->query($sqlGender);

$genderCounts = [];
if ($resultGender->num_rows > 0) {
    while ($row = $resultGender->fetch_assoc()) {
        $genderCounts[$row['gender']] = (int)$row['count'];
    }
}

$maleCount = isset($genderCounts['Male']) ? $genderCounts['Male'] : 0;
$femaleCount = isset($genderCounts['Female']) ? $genderCounts['Female'] : 0;

$currentYear = date("Y");
$ageBrackets = [
    '0-18' => 0,
    '19-35' => 0,
    '36-50' => 0,
    '51-65' => 0,
    '66+' => 0,
];

$sqlAge = "SELECT YEAR(CURDATE()) - YEAR(birthday) AS age FROM users";
$resultAge = $con->query($sqlAge);

if ($resultAge->num_rows > 0) {
    while ($row = $resultAge->fetch_assoc()) {
        $age = (int)$row['age'];
        if ($age <= 18) {
            $ageBrackets['0-18']++;
        } elseif ($age <= 35) {
            $ageBrackets['19-35']++;
        } elseif ($age <= 50) {
            $ageBrackets['36-50']++;
        } elseif ($age <= 65) {
            $ageBrackets['51-65']++;
        } else {
            $ageBrackets['66+']++;
        }
    }
}

$response = [
    'gender' => [
        'male' => $maleCount,
        'female' => $femaleCount
    ],
    'age' => $ageBrackets
];

echo json_encode($response);

$con->close();
?>