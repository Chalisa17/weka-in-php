<?php
$cmd = 'java -classpath "weka.jar" weka.classifiers.lazy.IBk -K 3 -t "glass.arff"';
exec($cmd,$output);
for ($i=0;$i<sizeof($output);$i++)
 { trim($output[$i]);
 echo $output[$i]."<br>";
 }
?>
