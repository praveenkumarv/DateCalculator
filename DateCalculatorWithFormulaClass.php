<?php
/*
	Copyright 2018 Praveen Kumar Vishwanatha  (email : praveenk.vishwanatha@gmail.com)
	DateCalculator Class: you can get number dates between two given dates from user input
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation.
	Backup is distributed in the hope that it will be useful,
	See the	GNU General Public License for more details.
	You should have received a copy of the GNU General Public License
	along with this script. If not, see http://www.gnu.org/licenses/gpl.html.
*/
/**
 * DateCalculator class
 *
 * This class is meant to be get number of dates between two given dates from user input.
 */

class DateCalculator{
 
	private $from_date;
    private $to_date;
 
	function __construct( $from_date, $to_date ) {
		$this->from_date = $from_date;
		$this->to_date = $to_date;
	}
 
	public function getNumberOfDaysBetweenTwoDates() {
	    return str_replace("-","", $this->calculateNumberOfDays());
	}
 
    public function getNumberOfDaysGivenDate($date){
        $date_array = explode('-',$date);
        list($year, $month, $day) = $date_array;

        /**
        Since February is an especially short month, it is normally better to consider January and February the 13th and 14th months of the previous year. 
        So first, if the month is 1 or 2, then you add 12 to the month and subtract 1 from the year.
        */
        if ($month <=2){
            $month = $month+12;
            $year = $year-1;
        }

        /**
        Formula
        Number of Days = (1461∗Year)4+(153∗Month)5+Day
        */     
        $no_of_days = (146097*$year)/400 + (153*$month + 8)/5 + $day;
        
        return $no_of_days;
    }

    public function calculateNumberOfDays(){
        $from_date_days = $this->getNumberOfDaysGivenDate($this->from_date);
        $to_date_days = $this->getNumberOfDaysGivenDate($this->to_date);

        //After subtracting you will get the number of days between two dates
        $days = $from_date_days - $to_date_days;

        //Return the number of days between the two dates
        //use the floor of the result of any division
        return floor($days);
    }
 
}

?>