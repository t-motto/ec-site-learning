<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="UTF-8">
        <title>商品詳細 - ECサイト学習</title>
    </head>
    <body>
        <h1>商品詳細</h1>

        <?php
        //商品データ
        $products = [
            [
                'id'    => '1',
                'name'  => 'ノートPC', 
                'price' => 89800,
                'image' => 'https://picsum.photos/200/150?random=1'    
            ],
            [
                'id'    => '2',
                'name'  => 'マウス',
                'price' => 2980,
                'image' => 'https://picsum.photos/200/150?random=2'
            ],
            [
                'id'    => '3',
                'name'  => 'キーボード',
                'price' => 5980,
                'image' => 'https://picsum.photos/200/150?random=3'
            ],
        ];
        //URLから商品IDを取得
        $product_id = $_GET['id'];
        $found_product = null;
        foreach($products as $product){
            if($product['id'] == $product_id){
                $found_product = $product;
                break;
            }
        }

        if($found_product){
            echo '<img src="' . $found_product['image'] . '"style="max-width: 300px;' . $found_product['name'] . '">';
            echo '<h2>' . $found_product['name'] . '</h2>';
            echo '<p>価格： ¥' . number_format($found_product['price']) . '</p>'; 
            echo '<p><a href="index.php">← 商品一覧に戻る</a></p>';
        } 
        else {
            echo '<p> 商品が見つかりません</p>';
            echo '<p><a href="index.php">← 商品一覧に戻る</a></p>';
        }
        ?>
    </body>
</html>