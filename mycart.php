<?php
session_start();
function searchForId($id, $array) {
    foreach ($array as $key => $val) {
        if (trim($val['item_id']) == trim($id)) {
            return $key;
        }
    }
    return null;
}

if(isset($_SESSION["cart"]))
{
    $item_array_key = searchForId($_POST["id"], $_SESSION["cart"]);
    //If you want to block duplicate entry 
    if(isset($item_array_key))
    {
        $_SESSION["cart"][$item_array_key]['qty'] = $_SESSION["cart"][$item_array_key]['qty'] + $_POST["qty"];
    } else {
        $item_array = array(
        'item_id' => $_POST["id"],
        'price' => $_POST["price"],
        'qty' => $_POST["qty"],
        'name' => $_POST["name"],
        'unit_qty' => $_POST["unit_qty"]
        );
        array_push($_SESSION["cart"],$item_array);
    }
}else{
    if(isset($_POST['id'])){
        $item_array = array(
            'item_id' => $_POST["id"],
            'price' => $_POST["price"],
            'qty' => $_POST["qty"],
            'name' => $_POST["name"],
            'unit_qty' => $_POST["unit_qty"]
        );
        $_SESSION["cart"][0] = $item_array;
    }
}
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
    .cart_header {
        width: 100%;
        background-color: #53900F;
        color: white;
        font-family: arial;
        font-size: 20px;
        padding: 10px 0;
        text-align: center;
    }
    .cart_container td{
        padding: 5px;
        text-align: center
    }
    .cart_container th{
        padding: 7px;
        text-align: center;
        background-color: #A4A71E;
        color: white;
        border: 0;
    }
    tr:nth-child(even) {
       background-color: #E4E6A3;
    }
    tr:nth-child(odd) {
        background-color: #D6F5C3;
    }
    .total{
        background: white!important;
        font-size: large;
    }
    .total td{
        padding: 10px 10px 10px 38px;
        border-top: 2px solid black;
    }
    .button_checkout{
        width: 100px;
        margin: 15px;
        padding: 12px 30px;
        background-color: #D6CE00;
        color: white;
        text-decoration: none;
        font-size: large;
        border: 2px solid #1F6521;
    }
</style>
</head>
<body>
<?php ob_start(); ?>
<?php
    if(!empty($_SESSION["cart"])) { ?>
        <div class="cart_view">
        <div class="cart_header">
            <label>My Cart</label>                 
        </div>
        <div >
            <table border="0"  cellpadding="0" cellspacing="0">
                <tr class="cart_container">
                    <th width="45%">Product Name</th>
                    <th width="10%">Quantity</th>
                    <th width="15%">Amount</th>
                    <th width="20%">Total</th>                           
                </tr>
                <?php
                if(!empty($_SESSION["cart"]))
                {
                    $total = 0;
                    foreach($_SESSION["cart"] as $keys => $values)
                    {
                ?>
                <tr class="cart_container">
                    <td><?php echo $values["name"];?> 
                        <span style="font-style: italic;">(<?php echo $values["unit_qty"];?>)</span>
                    </td>
                    <td><?php echo $values["qty"]; ?></td>
                    <td>$ <?php echo $values["price"]; ?></td>
                    <td>$ <?php echo number_format($values["qty"] * $values["price"], 2);?></td>
                </tr>
                <?php
                      $total = $total + ($values["qty"] * $values["price"]);
                    }
                ?>
                <tr class="total" >
                    <td colspan="3" align="right">Grand Total</td>
                    <td>$ <?php 

                     $price = number_format($total, 2);
                     echo $price;
                     $_SESSION["price"] = $price;

                     ?></td>
                    
                </tr>
                <?php
                }
                ?>

                <?php $contents = ob_get_contents();?>                         
            </table>
            <div style="margin-top: 30px;">
                <a class="button_checkout" target="leftTop" id="check" href="checkout_form.php"> Check Out </a>
                <a class="button_checkout" id="cleartCart" style="background-color: #1F2605;" href="clear_session.php"> Clear Cart</a>
            </div>
        </div>
        <?php   
            $_SESSION["value"] = $contents ;
        ?>
     <?php   } else { ?>
        <div>
            <img  width="100%" src="images/cartempty.jpg" alt="cart image" />            
        </div>
    </div>
     <?php   } ?>
</body>

    <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
    <script>
    $( "#check" ).click(function() {
        $(".cart_view").remove();
        <?php
        if(!isset($_SESSION["cart"])){ ?>
            alert('Cart is Empty . Please select any Product  ');
             event.preventDefault();
             <?php } ?>
         
    });
    // $("#cleartCart").click(function(){
    //     var r = confirm("Are you sure you want to delete all products from your cart?");
    //     if (r == true) {
    //         <?php
    //             header("Location: clear.php"); 
    //         ?>                                                          
    //     } 
    // });
    </script>

</html>