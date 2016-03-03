<?php
	
	Class Model_parser {

		protected $registr;
		function __construct($registr){
			$this->registr = $registr;
		}	

			
		public function get_data(){
			$curl = curl_init();
			curl_setopt( $curl, CURLOPT_URL,  'https://www.gismeteo.ua/weather-zaporizhzhya-5093/hourly/' );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYPEER, 0 );
			curl_setopt( $curl, CURLOPT_SSL_VERIFYHOST, 0 );
			curl_setopt( $curl, CURLOPT_RETURNTRANSFER, 1 );
			$result = curl_exec( $curl );
			curl_close( $curl );
			return $result;
		}	

		public function bolting_tags() {
			$begin = strstr( self::get_data(), '<tbody id="tbwdaily1">' , false );
			$end = strstr( $begin, '</tbody>' , true );
			$tags = strip_tags($end, '<img>, <dt>');
			echo '<div style="overflow: flex; width : 100%: height: 200px">';
			$temp_f = array();
			for($i = -50; $i <= +230; $i++ ):
				if( $i >= 1 ):
					$i = '+' . $i;
				endif;
				// echo ' i = ' . $i  . '<br>';
				$temp_f[] .= '"/' . $i . '/"';

				
			
			endfor;
			$pattern = $temp_f;
			echo '</div>';
			$replace = '';
			$tags = preg_replace($pattern, $replace, $tags);
			echo $tags;
			
			$pattern = array(
				'/00:00/',
				'/0:00/',
				'/02:00/',
				'/2:00/',
				'/03:00/',
				'/3:00/',
				'/05:00/',
				'/06:00/',
				'/6:00/',
				'/8:00/',
				'/9:00/',
				'/5:00/',
				'/09:00/',
				'/11:00/',
				'/12:00/',
				'/14:00/',
				'/15:00/',
				'/17:00/',
				'/18:00/',
				'/20:00/',
				'/21:00/',
				'/23:00/',
				'/"/',
				'/class/',
				'/title/',
				'/width=55/',
				'/height=55/',
				'/=/',
				'/>/',
				'/alt/',
				'/wicon/',
				
			);
			$replace = '';
			$tags = preg_replace($pattern, $replace, $tags);
			echo $tags . '</br>';
			$tags_arr = strtok( $tags, " \n\t" );
			$tags_bolt = array();
			while( $tags_arr ):
				$tags_arr = strtok( " \n\t" );
				$tags_bolt[] = $tags_arr;
			endwhile;
			
			echo 'array tags: {' .count($tags_bolt) . '}</br>';
			return $tags_bolt;
		}

		public function bolting_one(){
			$begin = strstr( self::get_data(), '<tbody id="tbwdaily1">' , false );
			$end = strstr( $begin, '</tbody>' , true );
			$current_day = date("Ymd");
			$current_days = date("Y");
			$current_days .= date("m")-01;
			$current_days .= date("d")-01;
			
			$str = $end;
			
			$pattern = array(
				"/ c'>/",
				"/style='display:none'>/",
				'/</',
				'/>/',
				'/tr/',
				'/td/',
				'/span/',
				'/inch/',
				'/m_press/',
				'/tr/',
				'/td/',
				
				'/dd/',
				'/dl/',
				'/dt/',
				'/class/',
				'/wint/',
				'/wicon/',
				'/temp/',
				'/m_/',
				
				'/width="55"/',
				'/height="55"/',
				'/"/',
				"/f'/",
				"/'/",
				'/th/',
				'/=/',
				'/value/',
				'/title/',
				'/mih/',
				'/kmh/',
				'/id/',
				'/UTC/',
				'/Local/',
				'/wrow/',
				'/clicon/',
				'/alt/',
				'/hpa/',
				'/cltext/',
				'/torr/',
				'/.png/',
				'/forecast/',
				'/s2.gismeteo.ua/',
				'/static/',
				'/images/',
				'/icons/',
				'/new/',
				'/img/',
				// '/wind/',
				'/s1.gismeteo.ua/',
				'/src/',
				'/wih55/',
				'/00:00/',
				'/0:00/',
				'/02:00/',
				'/2:00/',
				'/03:00/',
				'/3:00/',
				'/05:00/',
				'/06:00/',
				'/6:00/',
				'/8:00/',
				'/9:00/',
				'/5:00/',
				'/09:00/',
				'/11:00/',
				'/12:00/',
				'/14:00/',
				'/15:00/',
				'/17:00/',
				'/18:00/',
				'/20:00/',
				'/21:00/',
				'/23:00/',
				'/tbody/',
				'/ tbwdaily1/',

				//'/,/',
				'</>',
				'/А/', '/а/', '/Б/', '/б/', '/В/', '/в/', '/Г/', '/г/', '/Д/', '/д/', '/Е/', '/е/', '/Ё/', '/ё/',
			'/Ж/', '/ж/', '/З/', '/з/', '/И/', '/и/', '/Й/', '/й/', '/К/', '/к/', '/Л/', '/л/', '/М/', '/м/', '/Н/', '/н/', '/О/', '/о/', '/П/', '/п/', '/Р/', '/р/', '/С/', '/с/', '/Т/', '/т/', '/У/', '/у/', '/Ф/', '/ф/', '/Х/', '/х/', '/Ц/', '/ц/', '/Ч/', '/ч/', '/Ш/', '/ш/', '/Щ/', '/щ/', '/Ъ/', '/ъ/',
			'/Ы/', '/ы/', '/Ь/', '/ь/', '/Э/', '/э/', '/Ю/', '/ю/', '/Я/', '/я/', 
			'/:/',
			'/-/',
			'/'. $current_day .'02/', 
			'/'. $current_day .'05/', 
			'/'. $current_day .'08/', 
			'/'. $current_day .'11/', 
			'/'. $current_day .'14/', 
			'/'. $current_day .'17/', 
			'/'. $current_day .'20/', 
			'/'. $current_day .'23/', 
			'/'. $current_day .'/', 
			'/'. $current_days .'02/', 
			'/'. $current_days .'05/', 
			'/'. $current_days .'08/', 
			'/'. $current_days .'11/', 
			'/'. $current_days .'14/', 
			'/'. $current_days .'17/', 
			'/'. $current_days .'20/', 
			'/'. $current_days .'23/', 
			'/'. $current_days .'/', 
			);
			$replace = ''; 
			$output = preg_replace( $pattern, $replace, $str );
			return $output;
		}

		function bolting_two(){
			$output = strtok( self::bolting_one(), " \n\t" );
			$output_arr = array();
			while( $output ):
				$output = strtok( " \n\t" );
				$output_arr[] .= $output;
			endwhile;
			return $output_arr;
			// echo $output_arr;
		}

		public function find_images(){
			$day = array();
			for( $i = 0; $i <= 10; $i++ ):
				$day[$i] = 'd.sun.c' . $i;
				// echo $day[$i];
			endfor;
			$night = array();
			for( $i = 0; $i <= 10; $i++ ):
				$night[ $i ] = 'n.moon';
				// foreach( self::bolting() as $key => $value ):
				// 	if(  ):

				// 	endif;
				// endforeach;
			endfor;
			$img_arr = array();
			foreach( $day as $key => &$value ):
				// $img_arr[ 0 ] .=  $key =>  $value ;
			endforeach;

			foreach( $night as $key => $value ):
				$img_arr[1] .= '{' . $night[ $key ] . ' = ' . $day[ $value ] . '},';
			endforeach;
			return $night;
			// echo $img_arr;
		}

		// public function console_parse(){
		// 	$console = array();
		// 	$console[0] = htmlspecialchars($this->result);
		// 	$console[1] = $this->output;
		// 	$console[2] = $this->output_arr;
		// 	$console[3] = $this->url;
		// 	$console[4] = $this->img_arr;
		// 	return $console;
		// }



		public function image_weater(){

			// echo count( self::bolting_two() ) . '</br>';
			$bolts = count( self::bolting_two() );
			$bolt = self::bolting_two();
			$img = array( 'd.mist', 'n.moon', 'n.moon.c1', 'n.moon.c2', 'n.moon.c3', 'n.moon.c4', 'd.sun', 'd.sun.c1', 'd.sun.c2', 'd.sun.c3', 'd.sun.c4', 'd.sun.c2.r1',  'n.moon.c4.r2',  'd.sun.c4.r2' , 'd.sun.c4.r1' );
			// echo count( $img ) . '</br>';
				foreach($bolt as $key => $value ):
					for( $j = 0; $j <= count($img); $j++ ):
					
						if( $bolt[$key] === $img[$j]):
							$array_image[] = '<img src="//s2.gismeteo.ua/static/images/icons/new/' . $img[$j] . '.png" />' ;
						endif;
					endfor;
				endforeach;
		
			return $array_image;
		}

		function temp() {

			// echo count( self::bolting_two() ) . '</br>';
			// $bolts = count( self::bolting_two() );
			$bolt = self::bolting_two();
				foreach($bolt as $key => $value ):
					for($i = -50; $i <= +230; $i++ ):
						// echo $i . '</br>';
						if( $i >= 1 ):
							$i = '+' . $i;
						endif;
						if( $bolt[ $key ] === $i ):
							$array_temp[] = $key;
						// echo "\t".'bolt: {' .$bolt[$key] .'}' . "\n\t" . 'temp: {' . $i . '} '."\n\t" . 'key: {' . $key . '}'."\n" . '------------------------------' . "\n" ;
							// echo 'key: [' . $key . '] value: [' . $value . ']  i = ' . $i . '</br>' ;
							
						endif;
					endfor;
					if( $array_temp %4 == 0 ):
						echo $array_temp[$key];
					endif;
				endforeach;
				// echo count($array_temp);
			return $array_temp;
		}

		function find_temp() {
			$bolt = self::bolting_two();
			$temp = self::temp();
			// echo "\n";
			$num = '/0/4/8/12/16/20/24/28/';
			// echo '----------------' . "\n";
			foreach ($temp as $key => $value):
				if($temp[ $key ] == 0 & $temp[ $key ] == 4 & $temp[ $key ] == 8 & $temp[ $key ] == 12  ):
					// echo $temp[$key] . ' desc ' . $bolt[$value] . "\n";
				endif;
			endforeach;
			// echo '----------------' . "\n";
			$temp_c[0][0] = $bolt[$temp[0] ];
			$temp_c[0][1] = $bolt[$temp[4] ];
			$temp_c[0][2] = $bolt[$temp[8] ];
			$temp_c[0][3] = $bolt[$temp[12]] ;
			$temp_c[0][4] = $bolt[$temp[16]] ;
			$temp_c[0][5] = $bolt[$temp[20]] ;
			$temp_c[0][6] = $bolt[$temp[24]] ;
			$temp_c[0][7] = $bolt[$temp[28]] ;
			$temp_c[1][0] = $bolt[$temp[0] + 2];
			$temp_c[1][1] = $bolt[$temp[4] + 2];
			$temp_c[1][2] = $bolt[$temp[8] + 2];
			$temp_c[1][3] = $bolt[$temp[12] + 2] ;
			$temp_c[1][4] = $bolt[$temp[16] + 2] ;
			$temp_c[1][5] = $bolt[$temp[20] + 2] ;
			$temp_c[1][6] = $bolt[$temp[24] + 2] ;
			$temp_c[1][7] = $bolt[$temp[28] + 2] ;
			$temp_c[2][0] = $bolt[$temp[3] - 2];
			$temp_c[2][1] = $bolt[$temp[7] - 2];
			$temp_c[2][2] = $bolt[$temp[11] - 2];
			$temp_c[2][3] = $bolt[$temp[15] - 2] ;
			$temp_c[2][4] = $bolt[$temp[19] - 2] ;
			$temp_c[2][5] = $bolt[$temp[23] - 2] ;
			$temp_c[2][6] = $bolt[$temp[27] - 2] ;
			$temp_c[2][7] = $bolt[$temp[31] - 2] ;
			$temp_c[3][0] = $bolt[$temp[3] - 1];
			$temp_c[3][1] = $bolt[$temp[7] - 1];
			$temp_c[3][2] = $bolt[$temp[11] - 1];
			$temp_c[3][3] = $bolt[$temp[15] - 1] ;
			$temp_c[3][4] = $bolt[$temp[19] - 1] ;
			$temp_c[3][5] = $bolt[$temp[23] - 1] ;
			$temp_c[3][6] = $bolt[$temp[27] - 1] ;
			$temp_c[3][7] = $bolt[$temp[31] - 1] ;
			return $temp_c;
			
		}

		function wind() {
			$bolt = self::bolting_two();
			$wind = array( 'wind1', 'wind2', 'wind3', 'wind4', 'wind5', 'wind6', 'wind7', 'wind8', 'wind9', 'wind10' );
			foreach( $bolt as $key => $value ):
				for( $i = 0; $i <= count($wind); $i++ ):
					if( $bolt[ $key ] === $wind[$i] ):
						// echo '<dt class="wicon ' . $bolt[ $key ] . '"></dt>' . "\n";
						$array_wind[0][] = '<dt class="wicon ' . $bolt[ $key ] . '"></dt>';
						
					endif;
				endfor;
				for($j = 0; $j <= 200; $j++ ):
					if( $bolt[ $key ] === 'ms'. $j ):
						$array_wind[1][] = ' <span class="wind_position">' . $j . '</span>';  
					endif;
				endfor;
				
				
			endforeach;
			return $array_wind;
		}

		function destribute(){
			$img = self::image_weater();
			$temp = self::find_temp();
			$wind = self::wind();
			$time = array( '02:00', '05:00', '08:00', '11:00', '14:00', '17:00', '20:00', '23:00' );
			
			?>
				<p class="bg-primary">Weather as of today: <?php echo date( "d F Y" ) ?></p>
				<table class="table table-hover">
					<tr>
						<th></td>
						<th>Characteristics of weather, atmospheric conditions</th>
						<th>The air temperature</th>
						<th>Wind, m/s</th>
						<th>Atm. Pres., mm Hg. Art.</th>
						<th>Air humidity</th>
						<th>Feels</th>
						
					</tr>
					<?php for($i = 0; $i <= 7; $i++ ): 
					if( date( "H" ) >= $time[$i] && date( "H" ) <= $time[$i + 1]  ):
						echo '<tr class="info">';
					else:
						echo '<tr class="active">';
					endif;
					?>
						<td><?php echo $time[ $i ]; ?> </td>
						<td><?php echo $img[ $i ]; ?></td>
						<td><?php echo $temp[0][ $i ]; ?> °C</td>
						<td class="td_wind"><?php echo $wind[0][ $i ] . $wind[1][ $i ]; ?></td>
						<td><?php echo $temp[1][ $i ]; ?></td>
 						<td><?php echo $temp[2][ $i ]; ?> %</td>
						<td><?php echo $temp[3][ $i ]; ?> °C</td>
					</tr>
				<?php endfor; ?>
				</table>
			<?php
		}

	}

?>