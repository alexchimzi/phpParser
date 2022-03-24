
#!/usr/bin/php
<?php 

// Get Unique Combinations
$brand = readline("Enter Brand Name : ");
$model = readline("Enter Model Name : ");
$condition = readline("Enter Condition : ");
$grade = readline("Enter Grade : ");
$gb_spec = readline("Enter Capacity: ");
$network = readline("Enter Network : ");
$colour = readline("Enter Colour : ");


// Open File, filename passed as argument

$txt_file    = file_get_contents($argv[1]);
$rows        = explode("\n", $txt_file);
$brand_name_counter = 0;



foreach($rows as $row => $data)
{
   
    $row_data = explode(',', $data);
    

    // Attribute referencing
    $row_data_in[$row]['brand_name'] = $row_data[0];
    $row_data_in[$row]['model_name'] = $row_data[1];
    $row_data_in[$row]['condition_name'] = $row_data[2];
    $row_data_in[$row]['grade_name'] = $row_data[3];
    $row_data_in[$row]['gb_spec_name'] = $row_data[4];
    $row_data_in[$row]['colour_name'] = $row_data[5];
    $row_data_in[$row]['network_name'] = $row_data[6];

   
    try {

      if (strpos(strtolower($row_data_in[$row]['brand_name']),strtolower($brand)) == TRUE){
          if (strpos(strtolower($row_data_in[$row]['model_name']),strtolower($model)) == TRUE){
                if(strpos(strtolower($row_data_in[$row]['condition_name']),strtolower($condition)) == TRUE)   {

                  if(strpos(strtolower($row_data_in[$row]['grade_name']),strtolower($grade)) == TRUE){

                    if(strpos(strtolower($row_data_in[$row]['gb_spec_name']),strtolower($gb_spec)) == TRUE){

                      if(strpos(strtolower($row_data_in[$row]['colour_name']),strtolower($colour)) == TRUE){

                        if(strpos(strtolower($row_data_in[$row]['network_name']),strtolower($network)) == TRUE){

                                $brand_name_counter++;
                                echo $data.PHP_EOL ;
                         }else{ throw new Exception("DID not find ".$network,7);}

                       }else{throw new Exception("DID not find ".$colour,6);}
                      
                    }else{throw new Exception("DID not find ".$gb_spec,5);}

                  }else{throw new Exception("DID not find ".$grade,4);}
                }else{throw new Exception("DID not find ".$condition,3);}      
              }else{throw new Exception("DID not find ".$model,2);}
        }else{throw new Exception("DID not find ".$brand,1);}

        } catch (Exception $e) {
            //echo 'Message: ' .$e->getCode().PHP_EOL;
      }
    }
if($brand_name_counter == 0){
  echo ' No match found for "'.$brand.' '.$model.' '.$condition.' '.$grade.' '.$gb_spec.' '.$colour.' '.$network.PHP_EOL;
}else{
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
fwrite($myfile,"Make : ".$brand.PHP_EOL);
fwrite($myfile,"Model : ".$model.PHP_EOL);
fwrite($myfile,"Colour : ".$colour.PHP_EOL);
fwrite($myfile,"Capacity : ".$gb_spec.PHP_EOL);
fwrite($myfile,"Network : ".$network.PHP_EOL);
fwrite($myfile,"Grade : ".$grade.PHP_EOL);
fwrite($myfile,"Condition : ".$condition.PHP_EOL);
fwrite($myfile,"Count : ".$brand_name_counter.PHP_EOL);
fclose();
echo 'Count: '.$brand_name_counter.' and file saved.'.PHP_EOL;
} 



?>    