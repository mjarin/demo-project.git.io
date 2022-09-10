<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "new_test_db";
$con = mysqli_connect($host, $username, $password, $dbname) or die('Error in Connecting: ' . mysqli_error($con));



$url = "http://127.0.0.1:8081/api/orders";

        $ch = curl_init(); 
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_HEADER, false);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, true);
        $data = curl_exec ($ch); 
        curl_close($ch);

// print_r($data) ;

$obj = json_decode($data);

foreach($obj as $row)
{

        $duplicate = "SELECT * FROM order_new  WHERE customer_name='$row->customer_name' and shipping_address= '$row->shipping_address' 
        and delivery_charge='$row->delivery_charge' and product_id='$row->prod_id' and unit_price= '$row->unit_price' 
        and quantity= '$row->qty' and grand_total= '$row->grand_total'";
        $check_run = mysqli_query($con, $duplicate); 
        $checkrows= mysqli_num_rows($check_run);

        if($checkrows == 0){
        
        $query = "INSERT INTO order_new (customer_name, shipping_address, delivery_charge, product_id, unit_price, quantity, grand_total)
         VALUES('$row->customer_name','$row->shipping_address','$row->delivery_charge','$row->prod_id',
         '$row->unit_price','$row->qty','$row->grand_total')";
         $run = mysqli_query($con ,$query); 

}
}

if($checkrows == 0){

}else{

    echo "Already Inserted";    
}


//close connection 
mysqli_close($con); 

?>