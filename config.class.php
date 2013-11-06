<?php
 // error_reporting(E_ALL);
 // ini_set('display_errors', '1');
?>

<?php


	class database{

				protected $link,$results,$numRows;

				public function __construct($server,$username,$password,$db)
				{
					// try{
					$this->link = mysql_connect($server,$username,$password);
					mysql_select_db($db,$this->link);

				// }catch(PDOException $e)
				// {
				// 	$e->getMessage();
				// }	
				}
				public function disconnect()
				{

					mysql_close();
				}
				public function query($sql)
				{
					$this->results = mysql_query($sql,$this->link) ;
					$this->numRows = mysql_num_rows($this->results);
				}
				public function insertQuery($table,$data)
				{
					$fields = array_keys($data);
					$values = array_map("mysql_real_escape_string",array_values($data));
					@mysql_query("INSERT  INTO  `".$table."` (`" .implode("`,`",$fields)."`) VALUES('".implode("','",$values)."'); ") or die("Cannot execute mysql query.");


				} 
				public function numRows()
				{
					return $this->numRows;
				}
				public function rows()
				{
					$rows =array();
					
					for($x=0;$x < $this->numRows();$x++){

						$rows[] = mysql_fetch_assoc($this->results);
					}	
					return $rows;
				}


 }

 

/********************************URLs********************************/


 $fixtureUrls = array
(

   "http://www.soccerladuma.co.za/leagues/fixtures/premier-4",
   "http://www.soccerladuma.co.za/leagues/fixtures/national-first-division-1",
   "http://www.soccerladuma.co.za/leagues/fixtures/caf-champions-league-2",
   "http://www.soccerladuma.co.za/leagues/fixtures/league-cup-16",
   "http://www.soccerladuma.co.za/leagues/fixtures/mtn-8-cup-3",
   "http://www.soccerladuma.co.za/leagues/fixtures/premier-league-2",
   "http://www.soccerladuma.co.za/leagues/fixtures/uefa-champions-league-3",
   "http://www.soccerladuma.co.za/leagues/fixtures/uefa-europa-league-3",
   "http://www.soccerladuma.co.za/leagues/fixtures/bundesliga-3",
   "http://www.soccerladuma.co.za/leagues/fixtures/primera-division-2",
   "http://www.soccerladuma.co.za/leagues/fixtures/serie-a-2",
   "http://www.soccerladuma.co.za/leagues/fixtures/eredivisie-3",
   "http://www.soccerladuma.co.za/leagues/fixtures/ligue-1-2",
   "http://www.soccerladuma.co.za/leagues/fixtures/portuguese-liga-2",
   "http://www.soccerladuma.co.za/leagues/fixtures/league-cup-13",
   "http://www.soccerladuma.co.za/leagues/fixtures/varsity-football-knockout-round",
   "http://www.soccerladuma.co.za/leagues/fixtures/vasrity-football",
   "http://www.soccerladuma.co.za/leagues/fixtures/world-cup-brazil-2014",
   "http://www.soccerladuma.co.za/leagues/fixtures/friendly-international-2",
   "http://www.soccerladuma.co.za/leagues/fixtures/caf-confederation-cup-2"

 //  1 => "http://www.soccerladuma.co.za/leagues/fixtures/premier-4",
 //  2 => "http://www.soccerladuma.co.za/leagues/fixtures/national-first-division-1",
 //  3 => "http://www.soccerladuma.co.za/leagues/fixtures/caf-champions-league-2",
 //  4 => "http://www.soccerladuma.co.za/leagues/fixtures/mtn-8-cup-3",
 //  5 => "http://www.soccerladuma.co.za/leagues/fixtures/varsity-football-knockout-round",
 //  6 => "http://www.soccerladuma.co.za/leagues/fixtures/vasrity-football",
 //  7 => "http://www.soccerladuma.co.za/leagues/fixtures/premier-league-2",
 //  8 => "http://www.soccerladuma.co.za/leagues/fixtures/primera-division-2",
 //  9 => "http://www.soccerladuma.co.za/leagues/fixtures/bundesliga-3",
 // 10 => "http://www.soccerladuma.co.za/leagues/fixtures/serie-a-2",
 // 11 => "http://www.soccerladuma.co.za/leagues/fixtures/eredivisie-3",
 // 12 => "http://www.soccerladuma.co.za/leagues/fixtures/ligue-1-2",
 // 13 => "http://www.soccerladuma.co.za/leagues/fixtures/world-cup-brazil-2014",
 // 14 => "http://www.soccerladuma.co.za/leagues/fixtures/friendly-international-2",
 // 15 => "http://www.soccerladuma.co.za/leagues/fixtures/uefa-champions-league-3",
 // 16 => "http://www.soccerladuma.co.za/leagues/fixtures/uefa-europa-league-3",
 // 17 => "http://www.soccerladuma.co.za/leagues/fixtures/caf-confederation-cup-2",
 // 18 => "http://www.soccerladuma.co.za/leagues/fixtures/portuguese-liga-2",
 // 19 => "http://www.soccerladuma.co.za/leagues/fixtures/league-cup-13",
 // 20 => "http://www.soccerladuma.co.za/leagues/fixtures/league-cup-16"
);
$resultsUrls = array
(

	 "http://www.soccerladuma.co.za/leagues/results/premier-4",
     "http://www.soccerladuma.co.za/leagues/results/national-first-division-1",
     "http://www.soccerladuma.co.za/leagues/results/caf-champions-league-2",
     "http://www.soccerladuma.co.za/leagues/results/league-cup-16",
     "http://www.soccerladuma.co.za/leagues/results/mtn-8-cup-3",
     "http://www.soccerladuma.co.za/leagues/results/premier-league-2",
     "http://www.soccerladuma.co.za/leagues/results/uefa-champions-league-3",
     "http://www.soccerladuma.co.za/leagues/results/uefa-europa-league-3",
     "http://www.soccerladuma.co.za/leagues/results/bundesliga-3",
     "http://www.soccerladuma.co.za/leagues/results/primera-division-2",
     "http://www.soccerladuma.co.za/leagues/results/serie-a-2",
     "http://www.soccerladuma.co.za/leagues/results/eredivisie-3",
     "http://www.soccerladuma.co.za/leagues/results/ligue-1-2",
     "http://www.soccerladuma.co.za/leagues/results/portuguese-liga-2",
     "http://www.soccerladuma.co.za/leagues/results/league-cup-13",
     "http://www.soccerladuma.co.za/leagues/results/varsity-football-knockout-round",
     "http://www.soccerladuma.co.za/leagues/results/vasrity-football",
     "http://www.soccerladuma.co.za/leagues/results/world-cup-brazil-2014",
     "http://www.soccerladuma.co.za/leagues/results/friendly-international-2",
     "http://www.soccerladuma.co.za/leagues/results/caf-confederation-cup-2"

 //  1 => "http://www.soccerladuma.co.za/leagues/results/premier-4",
 //  2 => "http://www.soccerladuma.co.za/leagues/results/national-first-division-1",
 //  3 => "http://www.soccerladuma.co.za/leagues/results/caf-champions-league-2",
 //  4 => "http://www.soccerladuma.co.za/leagues/results/mtn-8-cup-3",
 //  5 => "http://www.soccerladuma.co.za/leagues/results/varsity-football-knockout-round",
 //  6 => "http://www.soccerladuma.co.za/leagues/results/vasrity-football",
 //  7 => "http://www.soccerladuma.co.za/leagues/results/premier-league-2",
 //  8 => "http://www.soccerladuma.co.za/leagues/results/primera-division-2",
 //  9 => "http://www.soccerladuma.co.za/leagues/results/bundesliga-3",
 // 10 => "http://www.soccerladuma.co.za/leagues/results/serie-a-2",
 // 11 => "http://www.soccerladuma.co.za/leagues/results/eredivisie-3",
 // 12 => "http://www.soccerladuma.co.za/leagues/results/ligue-1-2",
 // 13 => "http://www.soccerladuma.co.za/leagues/results/world-cup-brazil-2014",
 // 14 => "http://www.soccerladuma.co.za/leagues/results/friendly-international-2",
 // 15 => "http://www.soccerladuma.co.za/leagues/results/uefa-champions-league-3",
 // 16 => "http://www.soccerladuma.co.za/leagues/results/uefa-europa-league-3",
 // 17 => "http://www.soccerladuma.co.za/leagues/results/caf-confederation-cup-2",
 // 18 => "http://www.soccerladuma.co.za/leagues/results/portuguese-liga-2",
 // 19 => "http://www.soccerladuma.co.za/leagues/results/league-cup-13",
 // 20 => "http://www.soccerladuma.co.za/leagues/results/league-cup-16"

);

$standingsUrls = array
(
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














 //   1 => "http://www.soccerladuma.co.za/leagues/tables/premier-4",
 //  2 => "http://www.soccerladuma.co.za/leagues/tables/national-first-division-1",
 //  3 => "http://www.soccerladuma.co.za/leagues/tables/caf-champions-league-2",
 //  4 => "http://www.soccerladuma.co.za/leagues/tables/mtn-8-cup-3",
 //  5 => "http://www.soccerladuma.co.za/leagues/tables/varsity-football-knockout-round",
 //  6 => "http://www.soccerladuma.co.za/leagues/tables/vasrity-football",
 //  7 => "http://www.soccerladuma.co.za/leagues/tables/premier-league-2",
 //  8 => "http://www.soccerladuma.co.za/leagues/tables/primera-division-2",
 //  9 => "http://www.soccerladuma.co.za/leagues/tables/bundesliga-3",
 // 10 => "http://www.soccerladuma.co.za/leagues/tables/serie-a-2",
 // 11 => "http://www.soccerladuma.co.za/leagues/tables/eredivisie-3",
 // 12 => "http://www.soccerladuma.co.za/leagues/tables/ligue-1-2",
 // 13 => "http://www.soccerladuma.co.za/leagues/tables/world-cup-brazil-2014",
 // 14 => "http://www.soccerladuma.co.za/leagues/tables/friendly-international-2",
 // 15 => "http://www.soccerladuma.co.za/leagues/tables/uefa-champions-league-3",
 // 16 => "http://www.soccerladuma.co.za/leagues/tables/uefa-europa-league-3",
 // 17 => "http://www.soccerladuma.co.za/leagues/tables/caf-confederation-cup-2",
 // 18 => "http://www.soccerladuma.co.za/leagues/tables/portuguese-liga-2",
 // 19 => "http://www.soccerladuma.co.za/leagues/tables/league-cup-13",
 // 20 => "http://www.soccerladuma.co.za/leagues/tables/league-cup-16"
);
function URLIsValid($URL)
{
    $exists = true;
    $file_headers = @get_headers($URL);
    $InvalidHeaders = array('404', '403', '500');
    foreach($InvalidHeaders as $HeaderVal)
    {
            if(strstr($file_headers[0], $HeaderVal))
            {
                    $exists = false;

                    break;
            }
    }
    return $exists;
}

 
?>