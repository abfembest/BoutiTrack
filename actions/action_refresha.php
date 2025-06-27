<?php include 'db_connect.php';

if(isset($_POST['refresh'])){
   

}
$sql = "INSERT INTO jobuk.sales (invoice_id, product,specie, quantity_instock, quantity_sold, quantity, unit_price, username, payment_method, transaction_date) SELECT invoice_id, product, specie, quantity_instock, quantity_sold, quantity, unit_price, username, payment_method, transaction_date FROM jobuk.temp_sale;INSERT INTO invoice_table (transaction_date) VALUES (current_timestamp);DELETE FROM temp_sale";

if (mysqli_multi_query($connect, $sql)) {
    header('Location:../makesalesa.php');
} else {
    echo "Error completing sales: " . $connect->error;
}

$connect->close();
?>