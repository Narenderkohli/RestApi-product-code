
<?php
$version = phpversion();
print $version;

$servername = "localhost";
$username = "root";
$password = "";
$db = "addedproduct";


$conn = mysqli_connect($servername, $username, $password,$db);
      
          if ($conn)
          {
            echo "<br>connected";
          }
          else{
            echo "not connected";
          }

          ?>
<div class="custom_student_form">
  <form action="/alexcartnew/shopify-product-added.php" method="post" enctype="multipart/form-data" >
    <label for="pro-name">Product Name</label>
    <input type="text" id="pro-name" name="product_title" required><br/><br/>

    <label for="description">Description</label>
    <textarea name="editor1"></textarea><br/><br/>

    
    <label for="vendor">Vendor</label>
    <input type="text" id="vendor" name="vendor"><br/><br/>
    
    <label for="product_type">Product Type</label>
    <input type="text" id="product_type" name="product_type"><br/><br/>
    
    <label for="tags">Product Tags</label>
    <input type="text" id="tags" name="tags"><br/><br/>

     <label for="price">Price</label>
    <input type="text" id="price" name="product_price" required><br/><br/>
    <label for="compare_at_price">Compare Price</label>
       <input type="text" id="compare_at_price" name="product_com_price" required><br/><br/>

    <label for="vendor">Sku</label>
    <input type="text" id="sku" name="sku"><br/><br/>
    <label for="varinats">First Variant Name</label>
       <input type="text" id="variants-name" name="firt_variants_name"><br/><br/>
       <label for="varinats">First Variant First values</label>
       <input type="text" id="" name="first_variants_first_values"><br/><br/>
       <label for="varinats">First Variant Second values</label>
       <input type="text" id="" name="first_variants_Second_values"><br/><br/>
       <label for="varinats">Second Variant Name</label>
       <input type="text" id="" name="Second_variants_name"><br/><br/>
       <label for="varinats">Second Variant First values</label>
       <input type="text" id="" name="Second_variants_first_values"><br/><br/>
       <label for="varinats">Second Variant Second values</label>
       <input type="text" id="" name="Second_variants_Second_values"><br/><br/>
    
       <input type="file" name="image" alt="Submit" width="48" height="48"> <br/><br/>

       <input type="submit" value="Create">
        
  </form>
</div>
