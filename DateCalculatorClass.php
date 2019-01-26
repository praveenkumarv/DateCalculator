<?php
/**
 * DateCalculator class
 * Written by Praveen Kumar Vishwanatha
 * Email: praveenk.vishwanatha@gmail.com
 * This class is meant to be get number of days between two given dates from user input.
 */

class DateCalculator{
 
    private $startDate;
    private $endDate;

	function __construct( $startDate, $endDate ) {
		$this->startDate = $startDate;
		$this->endDate = $endDate;
    }
    
    //Get number of days between two given dates by user input
	public function getNumberOfDaysBetweenTwoDates() {
	    return str_replace("-","", $this->calculateNumberOfDays());
	}
 
    //Calculate number of days between two dates
    public function calculateNumberOfDays(){
        list($startYear,$startMonth,$startDay) = explode("-", $this->startDate);
        list($endYear,$endMonth,$endDay) = explode("-", $this->endDate);

        //calculate days in years
        $noOfYears = ($startYear-$endYear);
        $yYearsdays = $noOfYears * 365;

        //calculate days in months
        $noOfMonths= ($startMonth-$endMonth);
        $noOfMonths= str_replace("-","", $noOfMonths);
        $dMonthsDays = $noOfMonths * 30;

        //calculate days
        $noOfDays= $startDay-$endDay;
        $noOfDays= str_replace("-","", $noOfDays);

        //add additional days from all months
        $months = array(31,28,31,30,31,30,31,31,30,31,30,31);
        $additionalMonthDays=0;
        for($m=0; $m <= $noOfMonths; $m++){
            $additionalMonthDays += ($months[$m]-30);
        }

        //add days from leap years
        $addLeapDaysInYear = 0;
        for($y=0; $y <= $noOfYears; $y++){
            $findYear = ($startYear-$y);
            $addLeapDaysInYear += $this->findLeapYear($findYear);
        }
        
        //add all days
        $total_days = $yYearsdays + $dMonthsDays + $noOfDays + $additionalMonthDays + $addLeapDaysInYear;
        
        return floor($total_days);
    }

    //Find leap year
    public function findLeapYear($year) {
        if ((0 == $year % 4) && (0 != $year % 100) || (0 == $year % 400)) {
            return 1; 
        }else{
            return 0;
        }
    }
 
}

?>