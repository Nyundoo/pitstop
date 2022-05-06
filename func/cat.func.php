<style>
.flex {
  display: flex;
}
</style>

<?php

session_start();


$page = 'shop.php';

$servername = "208.91.198.23";
$username = "pitst5ii_pitstop_upload_user";
$password = "32365042";
$dbname = "pitst5ii_pitstop_upload";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    } 

if (isset($_GET['add'])) {
    $sql = "SELECT `id`, `quantity`
    FROM `db_products`
    WHERE `id`=" .mysqli_real_escape_string($conn, htmlentities((int)$_GET['add']));

$result = mysqli_query($conn, $sql);

while ($cat_row = mysqli_fetch_assoc($result)){
    if ($cat_row['quantity']!=$_SESSION['cart_'.(int)$_GET['add']]){
        $_SESSION['cart_'.(int)$_GET['add']] += '1';
    }
  }
  header("Location: $page");   
}

if (isset($_GET['remove'])) {
    $_SESSION['cart_'.(int)$_GET['remove']]--;
    header("Location: $page");
}

if (isset($_GET['delete'])) {
    $_SESSION['cart_'.(int)$_GET['delete']]='0';
    header("Location: $page");
}



     function cat_data() {
        // $servername = "localhost";
        // $username = "kketrades";
        // $password = "Sifed32365042?";
        // $dbname = "pitstop_upload";
        
        $servername = "208.91.198.23";
    $username = "pitst5ii_pitstop_upload_user";
    $password = "32365042";
    $dbname = "pitst5ii_pitstop_upload";
  
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
          die("Connection failed: " . mysqli_connect_error());
        } 
        

          $cats = array();
  
          $sql = "SELECT `id`, `name`, `description`, `price`, `shipping`, `quantity`, `image_name`, `ext` 
          FROM `db_products`
          WHERE `quantity` > 0 
          GROUP BY `id`
          ";
          $result = mysqli_query($conn, $sql);
  
          while ($get_row = mysqli_fetch_assoc($result)){
          echo  '
          <style>
* {
  box-sizing: border-box;
}

/* Create three unequal columns that floats next to each other */
.column {
  float: left;
  padding: 10px;
}

.left{
  width: 35%;
}
.right {
    width: 15%;     
    border: 1px #D5D9D9 solid;
    border-radius: 8px;    
  }

.middle {
  width: 50%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
.product-title-word-break {
    word-break: break-word;
}
.a-size-large {
    font-size: 24px!important;
    line-height: 32px!important;
}
.a-button-text {
    background-color: transparent;
    border: 0;
    display: block;
    font-size: 13px;
    line-height: 29px;
    margin: 0;
    outline: 0;
    padding: 0 10px 0 11px;
    text-align: center;
    white-space: nowrap;
}
.a-button-stack .a-button {
    margin-bottom: 10px;
    display: block;
}
.a-button-icon:not(.a-button-toggle), .a-button-search:not(.a-button-toggle) {
    border-radius: 20px;
}
.a-button:not(.a-button-toggle) {
    border-radius: 8px;
    box-shadow: 0 2px 5px 0 rgba(213,217,217,.5);
}
.a-buttonx:not(.a-button-toggle) {
  border-radius: 8px;
  box-shadow: 0 2px 5px 0 rgba(213,217,217,.5);
}
.a-button {
    background: #FFF;
    border-radius: 3px;
    border-color: #D5D9D9;
    border-style: solid;
    border-width: 1px;
    cursor: pointer;
    display: inline-block;
    padding: 0;
    text-align: center;
    text-decoration: none!important;
    vertical-align: middle;    
    width: 100%;
}
.a-spacing-small, .a-ws .a-ws-spacing-small {
    margin-bottom: 8px!important;
}
.a-button-primary {
    background: #FFD814;
    border-color: #FCD200;
}
.a-color-secondary, .a-color-tertiary {
  color: #565959!important;
}
.a-size-base {
  font-size: 14px!important;
  line-height: 20px!important;
}
.a-spacing-base, .a-ws .a-ws-spacing-base {
  font-size: 14px!important;
  line-height: 20px!important;
  margin-bottom: 12px!important;
}
.a-text-bold {
  font-weight: 700!important;
}
h1 {
  display: block;
  font-size: 2em;
  margin-block-start: 0.67em;
  margin-block-end: 0.67em;
  margin-inline-start: 0px;
  margin-inline-end: 0px;
  font-weight: bold;
}
.a-size-base-plus {
  font-size: 16px!important;
  line-height: 24px!important;
}
.a-text-bold {
  font-weight: 700!important;
}
.a-price .a-offscreen {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.a-price[data-a-color=price] {
  color: #B12704;
}
.a-price {
  text-decoration: none;
  position: relative;
  line-height: normal;
}
.a-size-medium {
  text-rendering: optimizeLegibility;
}
.w3-btn{
  -webkit-text-size-adjust: 100%;
  line-height: 1.5;
  box-sizing: inherit;
  border: none;
  display: inline-block;
  vertical-align: middle;
  overflow: hidden;
  text-decoration: none;
  text-align: center;
  cursor: pointer;
  white-space: nowrap;
  user-select: none;
  margin-bottom: 16px!important;
  background-color: #FF0000!important;
  border-radius: 5px;
  font-size: 17px;
  font-family: sans-serif;
  padding: 6px 18px;
  color: #FFFFFF;
}
</style>
          
          <div class="row"  style="background-color:#ffff; padding:20px;">
            <div class="column left"><img src="./assets/img/' ,$get_row['image_name'], '.' ,$get_row['ext'], '" class="img-fluid" alt="image" /></div>
            <div class="column middle"><div id="productTitle" class="a-size-large product-title-word-break">'.$get_row['name'].'</div><hr><br /><div class="a-list-item"><h1 class="a-size-base-plus a-text-bold">About this item</h1><br />'.$get_row['description'].'<br /></div></div> 
            <div class="column right a-price a-text-price a-size-medium">$'.number_format($get_row['price'], 2).'<div class="a-size-base a-color-secondary">+ $'.number_format($get_row['shipping'], 2).' Shipping & Import Fees</div><div class="a-section a-spacing-base">Only '.number_format($get_row['quantity'], 2).'  left in stock (more on the way).</div><span class="a-button a-spacing-small a-button-primary a-button-icon natc-enabled"><a class="a-button-text" href="cat.func.php?add='.$get_row['id'].'">Add to cart</a></span></div>
          <div><br /><br />';
          }
  
          return $cats;
  
          mysqli_close($conn);
        }

        function paypal_items() {
            $servername = "208.91.198.23";
            $username = "pitst5ii_pitstop_upload_user";
            $password = "32365042";
            $dbname = "pitst5ii_pitstop_upload";
          
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                } 

            $num = 0;
            foreach ($_SESSION as $name => $value) {
                if ($value!=0) {
                    if (substr($name, 0, 5) == 'cart_') {
                        $id = substr($name, 5, (strlen($name)-5));
                        
                        $sql = "SELECT `id`, `name`, `price`, `shipping` 
          FROM `db_products`
          WHERE `id`=".mysqli_real_escape_string($conn, htmlentities((int)$id))
          ;
          $result = mysqli_query($conn, $sql);
  
          while ($cat_row = mysqli_fetch_assoc($result)){
              $num++;
            echo '<input type="hidden" name="item_number_'.$num.'" value="'.$id.'">';
            echo '<input type="hidden" name="item_name_'.$num.'" value="'.$cat_row['name'].'">';
            echo '<input type="hidden" name="amount_'.$num.'" value="'.$cat_row['price'].'">';
            echo '<input type="hidden" name="shipping_'.$num.'" value="'.$cat_row['shipping'].'">';
            echo '<input type="hidden" name="shipping2_'.$num.'" value="'.$cat_row['shipping'].'">';
            echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
        }
                }
                $total += $sub;
            }  
                    }
                }
            

        function cart () {
            $servername = "208.91.198.23";
            $username = "pitst5ii_pitstop_upload_user";
            $password = "32365042";
            $dbname = "pitst5ii_pitstop_upload";
          
                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                  die("Connection failed: " . mysqli_connect_error());
                } 


            foreach ($_SESSION as $name => $value) {
                if ($value>0) {
                    if (substr($name, 0, 5) == 'cart_') {
                        $id = substr($name, 5, (strlen($name)-5));
                        $cats = array();
  
          $sql = "SELECT `id`, `name`, `price` 
          FROM `db_products`
          WHERE `id`=".mysqli_real_escape_string($conn, htmlentities((int)$id))
          ;
          $result = mysqli_query($conn, $sql);
  
          while ($cat_row = mysqli_fetch_assoc($result)){
              $sub = $cat_row['price']*$value;
            echo '<div  class="a-buttonx" style="padding: 10px;"><div>'.$cat_row['name']. ' x '.$value.' @ '.number_format($cat_row['price'], 2).' = '.number_format($sub, 2).' <a href="cart.func.php?remove='.$id.'">[-] </a> <a href="cart.func.php?add='.$id.'">[+] </a> <a href="cart.func.php?delete='.$id.'">
            [Delete]</a><br /></div></div>';
                    }
                }
                $total += $sub;
            }            
        }
        
        if ($total==0) {
            echo "Your cart is empty!";
        } else {
            echo '<p class="a-price a-text-price a-size-medium">Total: $'.number_format($total, 2).'</p>';
            
            ?>
            <p>
            <input type="hidden" name="cmd" value="_ext-enter">
            <form action="https://www.paypal.com/us/cgi-bin/webscr" method="post">
            <input type="hidden" name="cmd" value="_cart">
            <input type="hidden" name="upload" value="1">
            <input type="hidden" name="business" value="lukhoniarthur@gmail.com">
            <?php paypal_items(); ?>
            <input type="hidden" name="currency_code" value="USD">
            <input type="hidden" name="amount" value="0.00">
            <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
            </form>
            </p>
            <?php
            echo '<br />';
            echo "Equity checkout button(coming soon!)";
        }
        
    }


?>