<?php  session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
        .place_order {
          width: 180px;
          margin: 15px;
          padding: 12px 30px;
          background-color: #D6CE00;
          color: white;
          text-decoration: none;
          font-size: large;
          border: 2px solid #1F6521;
        }
        tr td label::after {
          content: "*";
          color:red;
        }
        tr input, tr select{
          width: 90%;
          padding: 5px;
        }
    </style>
</head>
<body>

    <form id="form1" method="post" action="mail.php">  
        <h2 align="center"> Checkout Form:</h2>  
        <table id="table1"; cellspacing="5px" cellpadding="5%"; align="center" style="width: 100%;">  
           <tr>  
                  <td  align="left" style="width: 40%;"><label>First Name:</label></td>  
                  <td><input required type="text" name="firstname" /></td>  
           </tr>  
           
           <tr>  
                  <td align="left" style="width: 40%;"><label>Last Name:</label></td>  
                  <td><input required type="text" name="lastname" /></td>  
           </tr>  
           <tr>  
                  <td align="left" style="width: 40%;"><label>Email Address:</label></td>  
                  <td><input required type="email" name="email" /></td>  
           </tr>  
           <tr>  
                  <td align="left" style="width: 40%;"><label>Address Line 1 :</label></td>  
                  <td><input required type="text" name="address1" /></td>  
           </tr>  
           <tr>  
                  <td align="left" style="width: 40%;"><label>Address Line 2:</label></td>  
                  <td><input required type="text" name="address" /></td>  
           </tr>

           <tr>  
                  <td align="left" style="width: 40%;"><label>City:</label></td>  
                  <td><input required type="text" name="city" /></td>  
           </tr>  
           <tr>  
                  <td align="left" style="width: 40%;"><label>State:</label></td>  
                  <td >
                      <select required name="state"  id="state" style="width: 94%;">  
                        <option value="" selected disabled hidden >--Select Any One--</option>  
                        <option value="0">Australian Capital Territory</option>
                        <option value="1">New South Wales</option>
                        <option value="2">Northern Territory</option>
                        <option value="3">Queensland</option>
                        <option value="4">South Australia</option>
                        <option value="5">Tasmania</option>
                        <option value="6">Victoria</option>
                        <option value="7">Western Australia</option>
                      </select> 
                  </td>  
           </tr>
           <tr>  
                  <td align="left" style="width: 40%;"><label>Post Code:</label></td>  
                  <td><input required type="text" name="postal" /></td>  
           </tr> 
           <tr>  
                  <td align="left" style="width: 40%;"><label>Payment Type:</label></td>  
                  <td>
                      <select required name="payment_type"  id="Qualifiation" style="width: 94%;">  
                        <option value="" selected disabled hidden >--Select Any One--</option>  
                        <option value="COD">Cash On Delivery</option>  
                        <option value="online">Online Payment</option>  
                      </select> 
                  </td>  
           </tr> 
         </table>
          <?php 
               if(isset($_SESSION["price"])) { ?>
              <h3>Your total amount of purchase is : <?php  echo  $_SESSION["price"]; ?> </h3>

           <?php  } ?>
                   <button class="place_order" type="submit">Place Order</button>
          </form>  
</body>

</html>