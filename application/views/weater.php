
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Weater</h3>
	</div>
	<div class="panel-content">
<?php echo '</hr><pre>';
	 print_r( Model_parser::image_weater() );
	 print_r( Model_parser::bolting_one() );
	 echo '</pre><hr><pre>';
	
	 print_r( Model_parser::bolting_two() );
	 echo '</hr>'; 
	//  echo 'Bolting tags begin<br>';
	// print_r( Model_parser::bolting_tags() );
	//  echo '</hr>'; 
	 echo 'Bolting temp<br> begin<br>';
	print_r( Model_parser::find_temp() );
	// print_r( Model_parser::temp() );
	 echo 'Bolting wind<br> begin<br>';
	print_r( Model_parser::wind() );
	 echo 'end</pre></hr>' ;
	 echo Model_parser::destribute();
	  ?>
<?php //echo Model_parser::bolting(); ?>
  	</div>
 </div>
