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

$cont = stream_context_create($opts);
$url_list = array
(
/*
  1 => "http://www.soccerladuma.co.za/leagues/tables/premier-4",
  2 => "http://www.soccerladuma.co.za/leagues/tables/national-first-division-1",
  3 => "http://www.soccerladuma.co.za/leagues/tables/caf-champions-league-2",
 20 => "http://www.soccerladuma.co.za/leagues/tables/league-cup-16",
  4 => "http://www.soccerladuma.co.za/leagues/tables/mtn-8-cup-3",
  7 => "http://www.soccerladuma.co.za/leagues/tables/premier-league-2",
 15 => "http://www.soccerladuma.co.za/leagues/tables/uefa-champions-league-3",
 16 => "http://www.soccerladuma.co.za/leagues/tables/uefa-europa-league-3",
  9 => "http://www.soccerladuma.co.za/leagues/tables/bundesliga-3",
  8 => "http://www.soccerladuma.co.za/leagues/tables/primera-division-2",
 10 => "http://www.soccerladuma.co.za/leagues/tables/serie-a-2",
 11 => "http://www.soccerladuma.co.za/leagues/tables/eredivisie-3",
 12 => "http://www.soccerladuma.co.za/leagues/tables/ligue-1-2",
 18 => "http://www.soccerladuma.co.za/leagues/tables/portuguese-liga-2",
 19 => "http://www.soccerladuma.co.za/leagues/tables/league-cup-13",
  5 => "http://www.soccerladuma.co.za/leagues/tables/varsity-football-knockout-round",
  6 => "http://www.soccerladuma.co.za/leagues/tables/vasrity-football",
 13 => "http://www.soccerladuma.co.za/leagues/tables/world-cup-brazil-2014",
 14 => "http://www.soccerladuma.co.za/leagues/tables/friendly-international-2",
 17 => "http://www.soccerladuma.co.za/leagues/tables/caf-confederation-cup-2"
*/


"http://www.soccerladuma.co.za/leagues/tables/premier-4",
"http://www.soccerladuma.co.za/leagues/tables/national-first-division-1",
"http://www.soccerladuma.co.za/leagues/tables/caf-champions-league-2",
"http://www.soccerladuma.co.za/leagues/tables/league-cup-16",
"http://www.soccerladuma.co.za/leagues/tables/mtn-8-cup-3",
"http://www.soccerladuma.co.za/leagues/tables/premier-league-2",
"http://www.soccerladuma.co.za/leagues/tables/uefa-champions-league-3",
"http://www.soccerladuma.co.za/leagues/tables/uefa-europa-league-3",
"http://www.soccerladuma.co.za/leagues/tables/bundesliga-3",
"http://www.soccerladuma.co.za/leagues/tables/primera-division-2",
"http://www.soccerladuma.co.za/leagues/tables/serie-a-2",
"http://www.soccerladuma.co.za/leagues/tables/eredivisie-3",
"http://www.soccerladuma.co.za/leagues/tables/ligue-1-2",
"http://www.soccerladuma.co.za/leagues/tables/portuguese-liga-2",
"http://www.soccerladuma.co.za/leagues/tables/league-cup-13",
"http://www.soccerladuma.co.za/leagues/tables/varsity-football-knockout-round",
"http://www.soccerladuma.co.za/leagues/tables/vasrity-football",
"http://www.soccerladuma.co.za/leagues/tables/world-cup-brazil-2014",
"http://www.soccerladuma.co.za/leagues/tables/friendly-international-2",
"http://www.soccerladuma.co.za/leagues/tables/caf-confederation-cup-2"
);

//$url1 = "/Users/ashraf.allie/world-cup-brazil-2014.html";
//$url1 = "http://www.soccerladuma.co.za/leagues/tables/world-cup-brazil-2014";


$dom = new DOMDocument();

//$dom->preserveWhiteSpace = false;

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
 $header     = array(),
 $group_name = array()
);


foreach ($url_list as $url)
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
 
/*
  echo "Amount of Tables:<br />\n";
  print_r($tables);
  //print_r($A_Table);
  echo "<br />\nAmount of tr in table 3<br />\n";
  print_r($tr);
  echo "<br />\n-----------------------<br />\n";
*/
  
  
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
  
    $standings_data_array[9][]  = $table_header;
    $standings_data_array[10][] = $current_group_name;
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
  }
 }

 echo '$table_header == ' . $table_header;
}

print_r($standings_data_array);
?>
</pre>
