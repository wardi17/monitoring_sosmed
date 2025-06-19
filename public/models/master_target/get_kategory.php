<?php

class kategory{
  

    function category(){
        $db= new  My_db();
        $conn =$db->open_connection();
       
        $year = date("Y");
        $sql =" SELECT DISTINCT kategory FROM master_video WHERE tahun ='".$year."' ";
        $result = odbc_exec($conn,$sql);
        // $data= odbc_fetch_array($result); 
        // if(isset($data)){
            while(odbc_fetch_row($result)){
                $rows[] =[
                    odbc_result($result,'kategory'),
                ];
            };
            //die(var_dump($rows));
            return $rows;
        // }else{
        //    return $rows =null;
        // }
    
        
    }

   

}

$category = new kategory();

?>