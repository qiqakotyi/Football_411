

<?php 
// error_reporting(E_ALL);
// ini_set('display_errors', '1');
?> 

<pre>
<?php

$opts = array
(
 'http'=>array
 (
  'method'=>"GET",
  'header'=>"Accept-language: en\r\n" .
  "Cookie: foo=bar\r\n" .
  "User-Agent: Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.13 (KHTML, like Gecko) Chrome/9.0.597.107 Safari/534.13\r\n"
 )
);

	echo "----------------------------------------------------------------------------------<br />\n";
	echo "Data Scraped and inserted to the Database Refresh the web page for updates :)<br />\n";
	echo "----------------------------------------------------------------------------------<br />\n";
$cont = stream_context_create($opts);

require ('config.class.php');

//create an object 
$db = new database('localhost','root','root','soccerladuma');

//exec('echo -e "`crontab -l`\n30 9 * * * http://www.soccerladuma.co.za/" | crontab -');

/////////////////////////////////////////////////////////////////////////////////////////

// 									Insert Urls to the leagues table

/////////////////////////////////////////////////////////////////////////////////////////

//     $leagues = "http://www.soccerladuma.co.za/leagues/tables";

// 	$contents = file_get_contents($leagues, false, $cont);

// 	$doc = new DOMDocument();
// 	$doc ->loadHTML($contents);

// 	// discard white space
// 	$doc->preserveWhiteSpace = false;

// 	//Displaying league_list
// 	$league_list = $doc->getElementById('league_list');
// 	$league_list = $league_list->getElementsByTagName('option');


// 	// $league_names = array("");

// 	// echo "<pre>\n";
// 	// echo "----------------------<br />\n";
// 	// echo "Displaying league_list<br />\n";
// 	// echo "----------------------<br />\n";
// 	foreach ($league_list as $index => $value)
// 			$league_names[] = $value->nodeValue;
// 	//       echo "$index : $value->nodeValue<br/>\n";
// 	// print_r($league_names);



// // foreach ($fixtureUrls as $index => $value)	
// //         echo "$index : $value<br />\n";


//  foreach ($fixtureUrls as $index=>$value)
//  {
//  	$fixtureUrls[$index]= mysql_real_escape_string($fixtureUrls[$index]);

//  	$db->insertQuery("leagues",array("league_name"=>"{$league_names[$index]}",
//  									 "fixtures_url"=>"{$fixtureUrls[$index]}",
//  									 "results_url"=>"{$resultsUrls[$index]}",
//  									 "teams_url"=>"{$standingsUrls[$index]}"));
 
//  }

//   echo "The leagues have been added to the leagues table<br />\n";


/////////////////////////////////////////////////////////////////////////////////////////

// 				END*****	Insert Urls to the leagues table

/////////////////////////////////////////////////////////////////////////////////////////




//*************************************************************************************//
// Retrieve results url and league_id
//*************************************************************************************//
//*************************************************************************************//

// $db->query("SELECT `league_id`,`results_url` from leagues");

// $results_url_list =array();
// $leagues_id_list =array();

// if($db->numRows()==0)
// {
// 	echo "Records Not found";
// }
// else
// {
// 	foreach ($db->rows() as $results) {
// 		// print_r($results);
// 		 $results_url_list[] = $results['results_url'];
// 		 $leagues_id_list[] = $results['league_id'];
// 	}
// }
// //=======================================================================================//
// // END+++   Retrieve results url and league_id
// //***************************************************************************************//
// //=======================================================================================//

// // print_r($leagues_id_list);
// // print_r($results_url_list);

// //=======================================================================================//
// // Scrape Results
// //
// //=======================================================================================//

// $soccer_results = array
// (
//  $date  = array(),
//  $time  = array(),
//  $home  = array(),
//  $score = array(),
//  $away  = array(),
//  $league_id = array()
// );



// foreach ($results_url_list as $index_urls => $value_url) {
	
// $contents = file_get_contents($value_url, false, $cont);

// $dom = new DOMDocument();

// $dom ->loadHTML($contents);

// $divRes = $dom ->getElementById('table-results');
// $divRes = $divRes-> getElementsByTagName('td');



// foreach ($divRes as $index => $value)
// {
//  $soccer_results[$index % 5][] = $value->nodeValue;
//  if ($index % 5 == 0)
//    $soccer_results[5][] = $leagues_id_list[$index_urls];
//  //echo "$index : $value->nodeValue<br />";
// }
// }

// // print_r($soccer_results);

//  //==================== Insert Results===================//

// for ($date_index = 0; $date_index < count($soccer_results[0]); $date_index++){

// $db->insertQuery("results",array("league_id"=> "{$soccer_results[5][$date_index]}",
//  	 						 	 "date"=> 	  " {$soccer_results[0][$date_index]}",
//  	 						 	 "time"=>     " {$soccer_results[1][$date_index]}",
//  	 						 	 "home"=>     " {$soccer_results[2][$date_index]}",
//  	 						 	 "score"=>    " {$soccer_results[3][$date_index]}",
//  	 						 	 "away"=>     " {$soccer_results[4][$date_index]}" 
//  	 						)); 

// }
// // echo "results have been added to the results table<br />";

// //========================================================================================//
// // END--------     Scrape Results  
// //
// //========================================================================================//






// //----------------------------------------------------------------------------------------//
// // Retrieve Fixtures urls and league_ids
// //----------------------------------------------------------------------------------------//
// //----------------------------------------------------------------------------------------//
// $db->query("SELECT `league_id`,`fixtures_url` from leagues");

// $fixtures_url_list = array();
// $league_ids =array();

// if($db->numRows()==0)
// {
// 	echo "Records Not found";
// }
// else
// {
// 	foreach ($db->rows() as $res) {
		
// 		 $fixtures_url_list[] = $res['fixtures_url'];
// 		 $league_ids[] = $res['league_id'];
// 	}
// }
// // print_r($league_ids);
// // print_r($fixtures_url_list);



// //----------------------------------------------------------------------------------------//
// // END+++  Retrieve Fixtures urls and league_ids
// //----------------------------------------------------------------------------------------//
// //----------------------------------------------------------------------------------------//



// //----------------------------------------------------------------------------------------//
// // Scrape Fixtures
// //----------------------------------------------------------------------------------------//
// //----------------------------------------------------------------------------------------//
	
// $soccer_fixtures = array
// (
//  $date  = array(),
//  $time  = array(),
//  $home  = array(),
//  $away  = array(),
//  $league_id = array()
// );



// foreach ($fixtures_url_list as $index_urls => $value_url) {
	
// $contents = file_get_contents($value_url, false, $cont);

// $dom = new DOMDocument();

// $dom ->loadHTML($contents);

// $divFix = $dom ->getElementById('table-fixtures');
// $divFix = $divFix-> getElementsByTagName('td');



// foreach ($divFix as $index => $value)
// {
//  $soccer_fixtures[$index % 4][] = $value->nodeValue;
//  if ($index % 4 == 0)
//    $soccer_fixtures[4][] = $league_ids[$index_urls];
//  //echo "$index : $value->nodeValue<br />";
// }
// }



// // print_r($soccer_fixtures);

// //==================== Insert Fixtures===================//


// for ($date_index = 0; $date_index < count($soccer_fixtures[0]); $date_index++){

// $db->insertQuery("fixtures",array("league_id"=> "{$soccer_fixtures[4][$date_index]}",
//  	 						 	 "date"=> 	  " {$soccer_fixtures[0][$date_index]}",
//  	 						 	 "time"=>     " {$soccer_fixtures[1][$date_index]}",
//  	 						 	 "home"=>     " {$soccer_fixtures[2][$date_index]}", 	 						 	 
//  	 						 	 "away"=>     " {$soccer_fixtures[3][$date_index]}" 
//  	 						)); 

// }
// //echo "Fixtures have been added to the fixtures table<br />";



// //----------------------------------------------------------------------------------------//
// // Scrape Live Scores
// //----------------------------------------------------------------------------------------//
// //----------------------------------------------------------------------------------------//
	
	

// $url = "http://www.soccerladuma.co.za/leagues/live_scores";
// $contents = file_get_contents($url, false, $cont);
                                                           
// $dom = new DOMDocument();
// $dom->loadHTML($contents);

// $heading = $dom->getElementsByTagName('h2');
// $divLiveScores = $dom->getElementById('table-live-scores');
// $divLiveScores = $divLiveScores->getElementsByTagName('td');

// // print_r($heading);
// // print_r($divLiveScores);

// $live_score_fields = array
// (
//  $time      = array(),
//  $home      = array(),
//  $score     = array(),
//  $away      = array(),
//  $game_time = array(),
//  $status    = array(),
//  $header    = array()
// );
// foreach ($heading as $index => $value)
// {
//  $live_score_fields[6][] = ltrim($value->nodeValue);
//  //echo "$index : $value->nodeValue<br/>";
// }

// $index_counter = 0;
// foreach ($divLiveScores as $index => $value)
// {
//  if ($index_counter > 5)
//      $index_counter = 0;

//  $live_score_fields[$index_counter][] = ltrim($value->nodeValue);
//  $index_counter++;
//  //echo "$index : $value->nodeValue<br/>";
// }

// for ($index = 0; $index < count($live_score_fields[4]); $index++)
// {
//  $live_score_fields[4][$index] = str_replace("'", "", $live_score_fields[4][$index]);
// }

// // echo "Number of characters in: " . strlen($live_score_fields[4][0]) . "<br />\n";
// for ($index = 0; $index < strlen($live_score_fields[4][0]); $index++)
//    // echo "Index: $index, ord val: " . ord($live_score_fields[4][0][$index]) . "<br />\n";

// $live_score_fields[4][0] = ltrim($live_score_fields[4][0]);
// // echo $live_score_fields[4][0] . "<br />\n";
// $live_score_fields[4][0];
// $live_score_fields[4][0][8]; 
// // echo $live_score_fields[4][0][8] . "<br />\n";
// // print_r($live_score_fields);


// $Heading_Column = 0;

// for ($Column = 0; $Column < count($live_score_fields[0]); $Column++)
// {
//  if ($Column == 3)
//    $Heading_Column++;

// $db->insertQuery("live_scores" , array( "time"=>"{$live_score_fields[0][$Column]}",
// 									    "home"=>"{$live_score_fields[1][$Column]}",
// 										"score"=>"{$live_score_fields[2][$Column]}",
// 										"away"=> "{$live_score_fields[3][$Column]}",
// 										"game_time"=>"{$live_score_fields[4][$Column]}",
// 										"status"=> "{$live_score_fields[5][$Column]}",
// 										"header"=>"{$live_score_fields[6][$Heading_Column]}" ));


// }
// echo "Live scores added Thank you!!!!!!!!!";

//////////////////////////////////////////////////////////////////////////////////////////////////
//								Standings

//////////////////////////////////////////////////////////////////////////////////////////////////

$db->query("SELECT `league_id`,`teams_url` from leagues");

$standings_url = array();
$leagues_idss =array();

if($db->numRows()==0)
{
	echo "Records Not found";
}
else
{
	foreach ($db->rows() as $result) {
		// print_r($results);
		 $leagues_idss[] = $result['league_id'];
		 $standings_url[] = $result['teams_url'];
		 
		 
}
}




$dom = new DOMDocument();

$dom->preserveWhiteSpace = false;

$standings_data_array = array
(
 $team       = array(),
 $P          = array(),
 $W          = array(),
 $D          = array(),
 $L          = array(),
 $GS         = array(),
 $GA         = array(),
 $GD         = array(),
 $PTS        = array(),
 $league_id  = array(),
 $header     = array(),
 $group_name = array(),

);


foreach ($standings_url as $url_index => $url)
{
 //echo $url . "<br />";
 $contents = file_get_contents($url, false, $cont);
 $dom->loadHTML($contents);

 $table_header = "";
 $current_group_name = "";
 
 $tables = $dom->getElementsByTagName('table');

 for ($table_index = 0; $table_index < $tables->length; $table_index++)
 {
  $A_Table = $tables->item($table_index);
  $tr = $A_Table->getElementsByTagName('tr');
 

  // echo "Amount of Tables:<br />\n";
  // print_r($tables);
  // //print_r($A_Table);
  // echo "<br />\nAmount of tr in table 3<br />\n";
  // print_r($tr);
  // echo "<br />\n-----------------------<br />\n";

  
  
  foreach ($tr as $tr_index => $tr_value)
  {
  /*
   print_r($tr_value);
   echo "<br />\n--------------<br />\n";
   echo "Table Row : $tr_index";
   echo "<br />\n--------------<br />\n";
  */
  
   $th = $tr_value->getElementsByTagName('th');
   $td = $tr_value->getElementsByTagName('td');
  
   //Get the table's header
   if (0 == $tr_index)
     $table_header = $th->item(0)->nodeValue;
  
   //If the table row is greater than 2 then start getting the group names
   if ($tr_index >= 2)
     if ($th->length == 1)
       $current_group_name = $th->item(0)->nodeValue;
   
   if ($td->length == 9)
   {
    foreach ($td as $td_index => $td_value)
           $standings_data_array[$td_index % 9][] = $td_value->nodeValue;
  	$standings_data_array[9][] = $leagues_idss[$url_index];
    $standings_data_array[10][]  = $table_header;
    $standings_data_array[11][] = $current_group_name;

   }

  
  /*
   echo "<br />\nth tag<br />\n";
   print_r($th);
   echo "<br />\ntd tag<br />\n";
   print_r($td);
  */
    
  /*
   foreach ($th as $th_index => $th_value)
          print_r($th_value);
  
   foreach ($td as $td_index => $td_value)
          print_r($td_value);
  */
//   }
//  }

 // echo '$table_header == ' . $table_header;
}
}
}

// print_r($standings_data_array);


for ($Column = 0; $Column < count($standings_data_array[0]); $Column++)
{
	$db->insertQuery("teams" , array( "team_name"=>"{$standings_data_array[0][$Column]}",
									    "P"=>"{$standings_data_array[1][$Column]}",
										"W"=>"{$standings_data_array[2][$Column]}",
										"D"=> "{$standings_data_array[3][$Column]}",
										"L"=>"{$standings_data_array[4][$Column]}",
										"GS"=> "{$standings_data_array[5][$Column]}",
										"GA"=>"{$standings_data_array[6][$Column]}",
										"GD"=>"{$standings_data_array[7][$Column]}",
										"PTS"=>"{$standings_data_array[8][$Column]}",
										"league_id" =>"{$standings_data_array[9][$Column]}",
										"header"=>"{$standings_data_array[10][$Column]}",
										"group_name"=>"{$standings_data_array[11][$Column]}"
                    ));


}

// echo "Standings added Thank you";



//////////////////////////////////////////////////////////////////////////////////////////////////
//								Standings

//////////////////////////////////////////////////////////////////////////////////////////////////

$db->disconnect();

?>
</pre>