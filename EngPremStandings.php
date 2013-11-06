<?php

echo "-------------------<br />\n";
echo "Displaying Team standings<br />\n";
echo "-------------------<br />\n";

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
// $url = "http://www.soccerladuma.co.za/leagues/tables/premier-league-2";
 $urlArr = array("http://www.soccerladuma.co.za/leagues/tables",
              "http://www.soccerladuma.co.za/leagues/tables/premier-league-2",
              "http://www.soccerladuma.co.za/leagues/tables/national-first-division-1",
           //   "http://www.soccerladuma.co.za/leagues/tables/caf-champions-league-2",
              "http://www.soccerladuma.co.za/leagues/tables/vasrity-football",
              "http://www.soccerladuma.co.za/leagues/tables/primera-division-2",
              "http://www.soccerladuma.co.za/leagues/tables/bundesliga-3",
              "http://www.soccerladuma.co.za/leagues/tables/serie-a-2",
              "http://www.soccerladuma.co.za/leagues/tables/eredivisie-3",
              "http://www.soccerladuma.co.za/leagues/tables/ligue-1-2",
              "http://www.soccerladuma.co.za/leagues/tables/world-cup-brazil-2014",
              "http://www.soccerladuma.co.za/leagues/tables/portuguese-liga-2"
            );
  $point = count($urlArr);
 for($i=0; $i<$point ; $i++){ 
    $cont = stream_context_create($opts);
      // header('content-type: text/plain');
    $contents = file_get_contents($urlArr[$i] , false, $cont);

    $dm = new DOMDocument();
    $dm ->loadHTML($contents);
    $xpath = new DOMXPath($dm);
    $count;

    $played  =array();
    foreach ($xpath->query('.//td[1]') as $td){                     
      $played[] = $td->nodeValue;
      $count++;
      if ($count%20 == 0){
        echo "<br />\n";
        break;
      } 
    }
   
  
  print_r('<pre>');
  print_r($played);
  print_r('</pre>');
  }001    
?>