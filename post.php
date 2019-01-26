<?php
require('DateCalculatorClass.php');

if(!empty($_POST['startDate']) && !empty($_POST['endDate'])){
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'];
}else{
    echo 'From date and To date fields are required!.';
    exit;
}
$dateObj = new DateCalculator($startDate,$endDate);
echo $dateObj->getNumberOfDaysBetweenTwoDates(). ' Days';

?>