<?php
$cmd = 'java -classpath "weka.jar" weka.classifiers.trees.J48 -t "balance.scale.arff" -d "balance.model" -x 5';
exec($cmd,$output);
for ($i=0;$i<sizeof($output);$i++)
 { trim($output[$i]);
 echo $output[$i]."<br>";
 }
?>
