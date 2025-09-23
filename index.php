<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECサイト学習</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            margin: 20px;
            background-color: #f5f5f5;     
        }
        .product {
            background-color: white; 
            border: 1px solid #ddd; 
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
        }
        .product img{
            width: 100%;
            max-width: 200px;
            height: 150px;
            object-fit: cover;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .product h3 {
            color: #333;
            margin-top: 0;
        }
        .price{
            color: #e74c3c;
            font-weight: bold;
            font-size: 18px;
        }

    </style>
</head>
    <body>
        <h1>ECサイト - 商品一覧</h1>
    </body>  
</html>

<?php
//商品データ
$products = [
    [
        'name'  => 'ノートPC', 
        'price' => 89800,
        'image' => 'https://via.placeholder.com/200x150?text=ノートPC'
    ],
    [
        'name' => 'マウス',
        'price' => 2980,
        'image' => 'https://via.placeholder.com/200x150?text=マウス'
    ],
    [
        'name' => 'キーボード',
        'price' => 5980,
        'image' => 'https://via.placeholder.com/200x150?text=キーボード'
    ],
];   


foreach($products as $product){
    echo '<div class="product">';
    echo '<img src="' . $product['image'] . '" alt= "' . $product['name'] . '">';
    echo '<h3>' . $product['name'] . '</h3>';
    echo '<p class="price">価格: ¥' . number_format($product['price']) . '</p>';
    echo '</div>';
}
?>