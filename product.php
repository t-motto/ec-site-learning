<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
        
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
    ]
];

//カートに追加の整理
if (isset($_POST['add_to_cart'])){
    echo '<p style="color: red;">ボタンが押されました</p>';
    $product_id = $_POST['product_id'];

    //カートが存在しない場合は、初期化
    if (!isset($_SESSION['cart'])){
        $_SESSION['cart'] = [];
    }

    //カートに商品を追加(既に存在する場合は、対象商品の数量を増やす)
    if (isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]++;
    }else{
        $_SESSION['cart'][$product_id] = 1;
    }

    // ここに追加
    echo '<p>カート内容: ';
    print_r($_SESSION['cart']);
    echo '</p>';
    
    echo '<script>alert("カートに追加しました");</script>';
 }

//URLから商品IDを取得
$product_id = $_GET['id'];
$found_product = null;
foreach($products as $product){
    if($product['id'] == $product_id){
        $found_product = $product;
        break;
    }
}
?>

<!DOCTYPE html>
<html lang = "ja">
    <head>
        <meta charset="UTF-8">
        <title>商品詳細 - ECサイト学習</title>
    </head>
    <body>
        <h1>商品詳細</h1>

        <?php
        if($found_product){
         ?>
            <img src="<?php echo $found_product['image']; ?>" style="max-width: 300px;">
            <h2><?php echo $found_product['name']; ?> </h2>
            <p>価格： ¥<?php echo number_format($found_product['price']); ?> </p>

            <form method="post">
                <input type="hidden" name="product_id" value="<?php echo $found_product['id']; ?>">
                <button type = "submit" name="add_to_cart">カートに追加 </button>
            </form>

            <p><a href="index.php">← 商品一覧に戻る</a></p>
        <?php
        } else {
        ?>
            echo '<p> 商品が見つかりません</p>';
            echo '<p><a href="index.php">← 商品一覧に戻る</a></p>';
        <?php
        }
        ?>    

    </body>
</html>