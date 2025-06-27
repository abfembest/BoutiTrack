<?php include 'db_connect.php';?>
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
      
        font-size: 12px;
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
        max-width: 100%;
      }
    }
}
</style>
<div class="ticket">

                  <b>

                    <?php 
                    $name = $_SESSION["name"];
                    echo"Current sales". " @ ";

                     //'Cashier: '. $_SESSION["name"];
                  echo date('d-m-Y')." ";
              $sql = "SELECT invoice_id FROM jobuk.temp_sale WHERE username = '$name' LIMIT 1";
              $result = $connect->query($sql);
              if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>

       <br><?php echo  'Rctno'.": " .$row['invoice_id']." " ." "; ?> </div>
  <?php                 
}
}   


                  ?></b>
   <table class="table table-stripped" style="width: 100%;">
      <tr>
                        <th class="description">Qty.</th>
                        <th class="description">Description</th>
                        <th class="description">Unit price</th>                  
                        <th class="description">Cost</th>
                        <th class="description"></th>

                        <th class="description">Action</th>
                    </tr>                  
    <?php
                    
 $sql = "SELECT id, invoice_id, specie, quantity, unit_price, (quantity *unit_price) AS cost FROM jobuk.temp_sale";
  $result = $connect->query($sql);
  if ($result-> num_rows >0) {
    while ($row = $result-> fetch_assoc()) {?>


      <tr>
          <td class="description"><?php echo $row['quantity']; ?></td>
          <td class="description"><?php echo $row['specie']; ?></td>
          <td class="price"><?php echo $row['unit_price']; ?></td>
          <td class="description"><?php echo $row['cost']; ?></td>
          <td class="description"></td>
          <td class="description"><a href="printpos/action_deleteca.php?id=<?php echo $row['id'];
          ?>" class="btn btn-danger" id="delete">Remove</a></td>
          
      </tr> 

             <?php

            }
            } 

              ?>
             <?php 

            $sql = "SELECT id, quantity, unit_price, SUM(quantity*unit_price) AS Amount, SUM(quantity)AS total_quantity FROM jobuk.temp_sale WHERE username = '$name'";
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
         <td class="description"><a href ="printpos/salesreceipta.php" name = "print">print invoice</a></td>   
            
            
</div>
<!--Modal butteon controls-->
<div class="modal fade" id="modal-danger">
        <div class="modal-dialog">
          <div class="modal-content bg-danger">
            <div class="modal-header">
              <h6 class="modal-title">Are you sure you want to delete this transaction?</h6>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>

              <?php 
              if (isset($_POST['delete'])) {
                # code...
              
              $id = (isset($_GET['id']) ? $_GET['id'] : '');
              $sql = "SELECT id, quantity, unit_price FROM jobuk.temp_sale WHERE id = '$id'";
            $result = $connect->query($sql);
            if ($result-> num_rows >0) {
              while ($row = $result-> fetch_assoc()) {?>
              <?php echo $row['id'];
                    echo $row['quantity'];?>.&hellip;</p>
             <?php
             }            
            }
            } 
            ?>
            <?php
            
                $connect->Close();

              ?>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
              <button type="button" class="btn btn-outline-light">Save changes</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->