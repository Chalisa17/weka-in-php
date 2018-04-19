<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form class="" action="#" method="post">
      <table>
        <tr>
          <td> value 1 :</td><td><input type="text" name="v1"></td>
        </tr>
        <tr>
          <td> value 2 :</td><td><input type="text" name="v2"></td>
        </tr>
        <tr>
          <td> value 3 :</td><td><input type="text" name="v3"></td>
        </tr>
        <tr>
          <td> value 4 :</td><td><input type="text" name="v4"></td>
        </tr>
          <td>  <input type="submit" name="submit" value="ส่งข้อมูล">  </td>
        </tr>
      </table>
    </form>

    <?php
  if($_POST["submit"] != null){
    $v1=$_POST["v1"];
    $v2=$_POST["v2"];
    $v3=$_POST["v3"];
    $v4=$_POST["v4"];
    $c =0;
    echo "ข้อมูลที่คุณป้อนคือ\t".$v1."\t".$v2."\t".$v3."\t".$v4."\t"."<br>";
    $data = array ('left-weight,left-distance,right-weight,right-distance,class','5,1,3,2,L','4,2,3,1,B','3,5,2,1,R','4,5,1,3,?',$v1.','.$v2.','.$v3.','.$v4.',?');

    //save fille .csv
    $fp = fopen('balance_csv.csv', 'w');
    foreach($data as $line){
     $val = explode(",",$line);
     fputcsv($fp, $val);
    }
    fclose($fp);//end

    // save file csv to arff-file
    // -L last set last attribute is a normial value
    $cmd = 'java -classpath "weka.jar" weka.core.converters.CSVLoader -N "last" balance_csv.csv > balance_unseen_test.arff ';
    exec($cmd,$output);


    // run unseen data -p 5 is class attribute
    $cmd1 = 'java -classpath "weka.jar" weka.classifiers.trees.J48 -T "balance_unseen_test.arff" -l "balance.model" -p 5'; // show output prediction
    exec($cmd1,$output1);
    $c=count($output1)-2;
         echo "ผลลัพธ์ที่ได้จากการทำนาย คือ ";
        echo $output1[$c]."<br>";
   }
     ?>
  </body>
</html>
