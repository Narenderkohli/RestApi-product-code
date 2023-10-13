<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;
// $db = new mysqli("localhost","root","","addedproduct");
$api_key = '0920abad244aa58f0a346f8f270898c0';
$secret_key = '9a8858c85598a885c53386c7d6902b4a';
$access_token = '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';
$api_version = '2023-07';

$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["image"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
$firt_variants_name = $_POST['firt_variants_name'];
$first_variants_first_values = $_POST['first_variants_first_values'];
$first_variants_Second_values = $_POST['first_variants_Second_values'];
$Second_variants_name = $_POST['Second_variants_name'];
$Second_variants_first_values = $_POST['Second_variants_first_values'];
$Second_variants_Second_values = $_POST['Second_variants_Second_values'];
$price = $_POST['product_price'];
$sku = $_POST['sku'];
$postJson=[];
	$postJson['title']= $_POST['product_title'];
	$postJson['variants'][0]['sku']= $_POST['sku'];
	$postJson['image'][0]['src']= '/alexcartnew/uploads/'.$_FILES["image"]["name"].'';
	$postJson['variants'][0]['price']= $_POST['product_price'];
	$postJson['variants'][0]['compare_at_price']= $_POST['product_com_price']; 
	$postJson['body_html']= $_POST['editor1'];
	$postJson['vendor']= $_POST['vendor'];
	$postJson['product_type']= $_POST['product_type'];
	$postJson['tags']= $_POST['tags'];
	$postJson['status']='active';
    $postJson['options']  = [
		[
			"name" => "$firt_variants_name", 
			"values" => [
			 "$first_variants_first_values", 
			 "$first_variants_Second_values",
			]
		], 
		 [
			"name" => "$Second_variants_name", 
			"values" => [
				"$Second_variants_first_values", 
				"$Second_variants_Second_values" 
			]
		   ]
			];
	 $postJson['variants']= [
		[
			"option1" => "$first_variants_first_values", 
			"option2" => "$Second_variants_first_values" ,
			"price"=> "$price",
            "sku"=>"$sku",
		], 
		[
			"option1" => "$first_variants_first_values", 
			"option2" => "$Second_variants_Second_values" ,
			"price"=> "$price",
            "sku"=>"$sku",
		],
		[
			"option1" => "$first_variants_Second_values", 
			"option2" => "$Second_variants_first_values" ,
			"price"=> "$price",
            "sku"=>"$sku",
		],
		[
			"option1" => "$first_variants_Second_values", 
			"option2" => "$Second_variants_Second_values" ,
			"price"=> "$price",
            "sku"=>"$sku",
		]
		];		
	$finaldata['product']=$postJson;

	// print_r($finaldata) ;
	$clienttheme = new Client();
	$responsetheme = $clienttheme->request('POST','https://suffescom-research-and-development.myshopify.com/admin/api/'.$api_version.'/products.json', [
		'json' => $finaldata,
		'headers' => ['X-Shopify-Access-Token' => $access_token]
	     ]);  
	$getProductData = json_decode($responsetheme->getBody()->getContents(), true);
	echo '<pre>';
	print_r($getProductData);
    echo 'Product Added Successfully';
?>