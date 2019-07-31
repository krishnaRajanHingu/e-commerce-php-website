<?php require_once('db_connection.php');
$id = $_GET['name'];

$sql = "SELECT * FROM products where product_id='$id'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
   
     $row  = $result->fetch_assoc();

     $name  = $row["product_name"];
     $stock = $row["in_stock"];
     $price = $row["unit_price"];
     $unit_qty = $row["unit_quantity"];
    
} else {
    echo "0 results";
}
$link->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <style>
        body{
            font-family: Arial, Helvetica, sans-serif;
        }
        .product_img{
          width: 235px;
          height: 230px;
          margin-right: 2px;
          float: left;
          margin-top: 30px;
        }
        .product_detail_container{
          width: 290px;
          height: 280px;
          float: left;
          margin-top: 30px;
        }
        .header{
            width: 100%;
            height:70px;
            background-color:#53900F;
            color:white;
            font-family: arial;
            font-size: 20px;
        }
        .product_header{
            padding-top: 7px;
            padding-left: 10px;
        }
        .product_detail_container{
            padding-left: 10px;
            padding-top: 30px;
            float: left;
        }
        th {
            text-align: left;
            width: 60%;
            padding-top: 10px;
        }
        .add, .sub{
            background: #A4A71E;
            border: none;
            font-size: large;
            color: white;
            height: 28px;
            width: 28px;
        }
        .cart_button{
            margin-top: 20px;
            padding-left: 10px;
            background-color: #D6CE00;
            color: white;
            height: 40px;
            width: 170px;
            font-size: large;
            border: 2px solid #1F6521;
        }
    </style>
</head>
<body>
    <div> 
        <!-- header -->
          <div class="header">
              <table cellspacing="0" cellspacing="0">
                  <tr>
                      <td class="product_header"><?php  echo $name; ?></td>
                  </tr>
                  <tr>
                      <td class="product_header" style="font-style: italic;"> (<?php  echo $unit_qty; ?>)</td>
                  </tr>
              </table>
              
          </div>
          <!-- header ends here -->
        <div class="product_img">
            <img  width="235px" height="230px"   src="../images/<?php  echo $id; ?>.jpg" alt="Fish fingers image" />
        </div>

        <div class="product_detail_container">
             <table class="product_detail" cellspacing="0" cellspacing="0">
                 <tr>
                     <th>Quantity Available:</th>
                     <td style="padding-top: 10px;"><?php  echo $stock;?> </td>
                 </tr>

                 <tr>
                     
                     <th>Price:</th>
                     <td style="padding-top: 10px;">$ <?php  echo $price;?> </td>
                 </tr>
                 <tr>
                    <form name="cart" action="../mycart.php" method="post" >
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                        <input type="hidden" name="name" value="<?php echo $name; ?>">
                        <input type="hidden" name="unit_qty" value="<?php echo $unit_qty; ?>">
                        <th>Quantity</th>
                        <td style="padding-top: 10px;">
                            <button type="button" class="sub">-</button>
                            <input type="number" id="1" value="1" min="1" max="20" style="width: 30px; height: 25px" name="qty"/>
                            <button type="button" class="add">+</button>
                        </td>
                        <tr>
                            <td colspan="2">
                                <button class="cart_button" type="submit" formtarget="cart">Add To Cart</button>
                            </td>
                        </tr>
                    </form>
                 </tr>
             </table> 
        </div>
    </div>   
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>
    $('.add').click(function () {
        if ($(this).prev().val() < 20) {
            $(this).prev().val(+$(this).prev().val() + 1);
        }
    });
    $('.sub').click(function () {
        if ($(this).next().val() > 1) {
            if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
        }
    });
</script>
</html>
