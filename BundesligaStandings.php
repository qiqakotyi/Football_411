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
        $url = "http://www.soccerladuma.co.za/leagues/tables/bundesliga-3";
        $cont = stream_context_create($opts);
          // header('content-type: text/plain');
        $contents = file_get_contents($url , false, $cont);

        $dm = new DOMDocument();
        $dm ->loadHTML($contents);
        $xpath = new DOMXPath($dm);
        $count;
        $counter;
        $cnt;
        $cont;
        $c;

        $played  =array();
        $won = array();
        $draws = array();
        $lose = array();
        $goalsScored = array();
        $goalsAgainst = array();
        $goalDifference = array();
        $points = array();

      //number of games played
      foreach ($xpath->query('.//td[2]') as $td) {
            //     # code...                      
            $played[] = $td->nodeValue;
            $count++;
            if ($count==18){
              break;
            }
          }

          print_r('<pre>');
          print_r($played);
          print_r('</pre>');
          

        //number of Games won
      foreach ($xpath->query('.//td[3]') as $td) {
          //     # code...
          $won[] = $td->nodeValue;
          $counter++;
          if ($counter == 18){
            break;
      }
     
    }

      print_r('<pre>');
      print_r($won);
      print_r('</pre>');
    
      

         //number of Games drawn
      foreach ($xpath->query('.//td[4]') as $td) {
          //     # code...
          $draws[]= $td->nodeValue;
          $cnt++;
          if ($cnt == 18){
            break;
      }
     
    }

      print_r('<pre>');
      print_r($draws);
      print_r('</pre>');
     

     //number of Games lost

      foreach ($xpath->query('.//td[5]') as $td) {
          // # code...
          $lose[]= $td->nodeValue;
          $c++;
          if ($c == 18){
            break;
      }
     
    }

      print_r('<pre>');
      print_r($lose);
      print_r('</pre>');



     //number of Goals Scored

      foreach ($xpath->query('.//td[6]') as $td) {
          //     # code...
          $goalsScored[]= $td->nodeValue;
          $cont++;
          if ($cont == 18){
            break;
      }
     
    }

      print_r('<pre>');
      print_r($goalsScored);
      print_r('</pre>');
    
//goals against

     foreach ($xpath->query('.//td[7]') as $td) {
          //     # code...
          $goalsAgainst[]= $td->nodeValue;
          $cont++;
          if ($cont == 18){
            break;
      }
     
    }

      print_r('<pre>');
      print_r($goalsAgainst);
      print_r('</pre>');

//goal diference
      foreach ($xpath->query('.//td[8]') as $td) {
          //     # code...
          $goalDifference[]= $td->nodeValue;
          $cont++;
          if ($cont == 18){
            break;
      }
     
    }

      print_r('<pre>');
      print_r($goalDifference);
      print_r('</pre>');

      //Points
      foreach ($xpath->query('.//td[9]') as $td) {
          //     # code...
          $points[]= $td->nodeValue;
          $cont++;
          if ($cont == 18){
            break;
      }
     
    }

      print_r('<pre>');
      print_r($points);
      print_r('</pre>');


      
?>