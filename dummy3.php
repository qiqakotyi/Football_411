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
/*
$array_of_urls = array( //1 => "http://www.soccerladuma.co.za/leagues/tables",
                        //2 => "http://www.soccerladuma.co.za/leagues/tables/national-first-division-1",
                       // 3 => "http://www.soccerladuma.co.za/leagues/tables/caf-champions-league-2",
                        4 => "http://www.soccerladuma.co.za/leagues/tables/world-cup-brazil-2014"
                        //5 => "",


                        );*/
$url = "http://www.soccerladuma.co.za/leagues/tables/world-cup-brazil-2014";
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
  
$standings_data   = array();
$results_data     = array();
$group_name_data  = array();

//for($j=0;$j<count($array_of_urls);$j++)
//{
  $cont = stream_context_create($opts);
  $contents = file_get_contents($url, false, $cont);

  $dom = new DOMDocument();
  $dom->loadHTML($contents);

  $num_Of_tables = $dom->getElementsByTagName('table');
  $num_Of_tables = $num_Of_tables->length;
  for ($i=0; $i<$num_Of_tables; $i++)
  {
    $th_values = array();
    $tables = $dom->getElementsByTagName('table');
    $tables = $tables->item($i);
    $tables = $tables->getElementsByTagName('th');
    $tmp=10;
    foreach ($tables as $key => $value) 
    {
      $th_values[] = $value->nodeValue;
    } 
    $tables2 = $dom->getElementsByTagName('table');
    $tables2 = $tables2->item($i);
    $tables2 = $tables2->getElementsByTagName('td');
    if((count($th_values)>=10)&&((($tables2->length)%9) ==0))
    {      

      foreach ($tables2 as $key2 => $value2) 
      {
        $standings_data_array[$key2%9][] = $value2->nodeValue;
        if(($key2%9)==0)
        {
          $standings_data_array[9][] = $th_values[0];
          if (count($th_values)>11)
          {

            if ((($th_values[$tmp])!= NULL)&&(($th_values[$tmp])!=" "))
            {              
              for($k=0; $k<((($tables2->length)/9)/(count($th_values)-10));$k++)
              { 
                $standings_data_array[10][] = $th_values[$tmp];
              }
            }
            $tmp++;
          }
        }
      } 
    }    
  }
//}
echo "<br />";
echo "________Standings Data_________ <br/>";
print_r($standings_data_array);
echo "____________________________<br />";
print_r($group_name_data);

?>
</pre>