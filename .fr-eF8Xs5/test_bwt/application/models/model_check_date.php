<?php
	
	Class Model_check_date{

		function month(){
			$month = array(
				$month[1] = "Jan",
				$month[2] = "Febrory",
				$month[3] = "March",
				$month[4] = "April",
				$month[5] = "May",
				$month[6] = "June",
				$month[7] = "July",
				$month[8] = "August",
				$month[9] = "September",
				$month[10] = "October",
				$month[11] = "November",
				$month[12] = "December"
			);
			return $month;
		}

		function check_year() {
			$check_year = $_POST[ 'check_year' ];
			echo 'check_year: ' . $check_year;
			# Default empty arrays
			$years= array();
			$year= array();

			# Determine all the years between 1900
			for($j = 1; $j >= date("Y") - 1000; $j++):
				$year[] = $j;
			endfor;

			# Сycled define all the years since 1900 and are recorded in array
			for($i = 1900; $i <= date("Y"); $i++):				 
				if($i % 4 == 0):
					$years[] = $i;
					foreach ($years as $value):
						$years[$j] = $year[$i]	;
					endforeach;
				endif;
			endfor;

			# Determine the amount of days in each month and override the array
			$month_day_count = array();
			$month_day_count[01] = 31;
			$output = '{ leap_year :' ;
			if($years[$i] = $current_year):
				$month_day_count[02] = "29";
				$output .= 'true';
			else:
				$month_day_count[02] = "28";
				$output .= 'false';
			endif;
			json_encode($output);
			$month_day_count[03] = 31;
			$month_day_count[04] = 30;
			$month_day_count[05] = 31;
			$month_day_count[06] = 30;
			$month_day_count[07] = 31;
			$month_day_count[08] =  31;
			$month_day_count[09] = 30;
			$month_day_count[10] = 31;
			$month_day_count[11] = 30;
			$month_day_count[12] = 31;

		}


	}

?>