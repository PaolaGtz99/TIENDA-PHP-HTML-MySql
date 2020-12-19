<?php
    $f=fopen("contador.txt","r");
    $contador=0;
    if($f){
        $contador=fread($f,filesize("contador.txt"));
        $contador++;
        fclose($f);
    }        
    $f=fopen("contador.txt","w+");
    if($f){
        fwrite($f,$contador);
        fclose($f);
    }  
    $var= ceil(log10($contador));
    if($var-log10($contador)==0){
        $var++;
    }
    for($i=$var;$i<5;$i++)
        $contador="0".$contador;
    echo "<span id='contador'>".$contador."</span>";
    
?>