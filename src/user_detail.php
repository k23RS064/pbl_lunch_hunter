<?php
// 仮の店舗データ
$store = [
  'store_name' => '九段製麺 九産大前店',
  'address' => '福岡県福岡市東区香住ヶ丘２丁目２−４',
  'tel' => '092-410-2885',
  'hours' => '11:00〜15:00',
  'holiday' => '不定休',
  'parking' => 'なし',
  'payment' => '現金 クレジットカード',
  'url' => 'https://www.example.com',
  'photo' => 'photo_sample.jpg',
  'review_avg' => '4.2',
  'review_count' => '128',
  'taste' => 5,
  'price' => 4,
  'atmosphere' => 4,
  'service' => 4
];

// 仮の口コミデータ
$reviews = [
  ['account_name' => '社員A', 'rating' => 5, 'comment' => 'とても美味しかったです！', 'photo' => 'ramen.jpg'],
  ['account_name' => '社員B', 'rating' => 4, 'comment' => '接客が丁寧でした。', 'photo' => 'gyoza.jpg'],
  ['account_name' => '社員C', 'rating' => 3, 'comment' => '値段が少し高めでした。', 'photo' => '']
];
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>店舗詳細 - Lunch Hunt</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 20px; }
    .container { max-width: 900px; margin: auto; }
    .section { margin-bottom: 30px; }
    label { font-weight: bold; display: block; margin-top: 10px; }
    img { max-width: 100%; height: auto; margin-top: 10px; }
    .nav_buttons button { margin-right: 10px; }
    .review_card { border: 1px solid #ccc; padding: 10px; margin-top: 10px; border-radius: 5px; }
  </style>
</head>
<body>
  <div class="container">
    <h1>Lunch Hunt</h1>
    <div class="nav_buttons">
      <button onclick="location.href='logout.php'">ログアウト</button>
      <button onclick="location.href='mypage.php'">マイページ</button>
      <button onclick="alert('お気に入りに登録しました')">お気に入り</button>
      <button onclick="location.href='store_edit.php'">編集</button>
    </div>

    <!-- 店舗情報 -->
    <div class="section">
      <h2>店舗詳細</h2>
      <p><strong>店舗名：</strong><?= $store['store_name'] ?></p>
      <p><strong>住所：</strong><?= $store['address'] ?></p>
      <p><strong>電話番号：</strong><?= $store['tel'] ?></p>
      <p><strong>営業時間：</strong><?= $store['hours'] ?></p>
      <p><strong>定休日：</strong><?= $store['holiday'] ?></p>
      <p><strong>駐車場：</strong><?= $store['parking'] ?></p>
      <p><strong>支払方法：</strong><?= $store['payment'] ?></p>
      <p><strong>URL：</strong><a href="<?= $store['url'] ?>" target="_blank">公式サイト</a></p>
      <p><strong>外見写真：</strong></p>
      <img src="<?= $store['photo'] ?>" alt="店舗外観">
    </div>

    <!-- 評価 -->
    <div class="section">
      <h3>評価</h3>
      <p><strong>総合評価：</strong><?= $store['review_avg'] ?> / 5（<?= $store['review_count'] ?>人）</p>
      <p><strong>味：</strong><?= str_repeat('★', $store['taste']) ?></p>
      <p><strong>値段：</strong><?= str_repeat('★', $store['price']) ?><?= str_repeat('☆', 5 - $store['price']) ?></p>
      <p><strong>雰囲気：</strong><?= str_repeat('★', $store['atmosphere']) ?><?= str_repeat('☆', 5 - $store['atmosphere']) ?></p>
      <p><strong>接客：</strong><?= str_repeat('★', $store['service']) ?><?= str_repeat('☆', 5 - $store['service']) ?></p>
    </div>

    <!-- 投稿フォーム -->
    <div class="section">
      <h3>コメント投稿</h3>
      <form method="post" enctype="multipart/form-data">
        <label for="comment">コメント（250文字以内）</label>
        <textarea id="comment" name="comment" maxlength="250"></textarea>

        <label for="photo">写真（任意）</label>
        <input type="file" id="photo" name="photo">

        <button type="submit" name="submit_review">投稿</button>
      </form>
    </div>

    <!-- 口コミ一覧 -->
    <div class="section">
      <h3>口コミ</h3>
      <?php foreach ($reviews as $r): ?>
        <div class="review_card">
          <p><strong>アカウント：</strong><?= $r['account_name'] ?></p>
          <p><strong>評価：</strong><?= str_repeat('★', $r['rating']) ?><?= str_repeat('☆', 5 - $r['rating']) ?></p>
          <p><strong>コメント：</strong><?= $r['comment'] ?></p>
          <?php if (!empty($r['photo'])): ?>
            <img src="<?= $r['photo'] ?>" alt="料理写真">
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>
</html>