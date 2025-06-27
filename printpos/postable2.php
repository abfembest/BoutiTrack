<?php include 'db_connect.php';
    ?>

<style type="text/css">
  
td,
th,
tr,
table {
    border-top: 1px solid black;
    border-collapse: collapse;
    text-align: center;
}
table {
      
        
        margin: auto;
        
}

/*td.description,
th.description {
    width: 75px;
    max-width: 75px;
}*/

td.quantity,
th.quantity {
    
    word-break: break-all;
}

td.price,
th.price {
    
    word-break: break-all;
}

.centered {
    text-align: center;
    align-content: center;
    font-size: 15px;
}

.ticket {
    width: 100%;
    
    font-size: 0.8em;
    text-align: center;
    font-style: bold;"
}

img {
    max-width: 100px;
    border-radius: 20px;
    margin-left: 60px;
}
#delete{
  max-height: 35px;
  max-width: 100px;
}

@media print {
    .hidden-print,
    .hidden-print * {
        display: none !important;
    }
    @media screen(450px){
      table{
        max-width: 400px;
      }
    }
}
</style>
<div class="ticket" style="width:100%;">
                  <b><?php echo"Current sales". " @ ";

                     //'Cashier: '. $_SESSION["name"];
                  echo date('d-m-Y')." ";
              $sql = "SELECT invoice_id FROM jobuk.temp_sale LIMIT 1";
              $result = $connect->query($sql);
              if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>

       <br><?php echo  'Rctno'.": " .$row['invoice_id']." " ." "; ?> </div>
  <?php                 
}
}   


                  ?></b>
   <table class="table table-stripped"style="width:100%;">
    <tbody style="width:100%;">
      <tr>
                        <th class="description">Qty.</th>
                        <th class="description">Description</th>
                        <th class="description">Unit price</th>                  
                        <th class="description">Cost</th>
                        <th class="description"></th>
                        <th class="description">Action</th>
                    </tr>                  
    <?php
                    $name = $_SESSION["name"];
                    
 $sql = "SELECT id, invoice_id, specie, quantity, unit_price,username, (quantity *unit_price) AS cost 
          FROM jobuk.temp_sale WHERE username = '$name'";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>


      <tr>
          <td class="description"><?php echo $row['quantity']; ?></td>
          <td class="description"><?php echo $row['specie']; ?></td>
          <td class="price"><?php echo $row['unit_price']; ?></td>
          <td class="description"><?php echo $row['cost']; ?></td>
          <td class="description"></td>
          <td class="description"><a href="printpos/action_deletec.php?id=<?php echo $row['id'];
          ?>" class="btn btn-danger" id="delete">Remove</a></td>
          
      </tr> 

             <?php

            }
            } 

              ?>
             <?php 

            $sql = "SELECT id, quantity, unit_price, SUM(quantity*unit_price) AS Amount, SUM(quantity)AS total_quantity, username FROM jobuk.temp_sale WHERE username = '$name'";
            $result = $connect->query($sql);
            if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>

      </div>

            <tr><td colspan='2'><?php echo "quantity ".$row["total_quantity"]."<td colspan='3'>Amount ".'='.'₦'.$row["Amount"] ;?>
            </tr>

            </table>

            
            <?php            
            }
            } 
            ?>
            <?php
            
                $connect->Close();

              ?>
         <td class="description"><a href ="printpos/salesreceipt.php" name = "print">print invoice</a></td>   
            
            </tbody>
</div>
<!--Modal butteon controls-->

       
        <!-- /.modal-dialog -->