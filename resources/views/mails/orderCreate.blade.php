<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
  <style>
    .test {
      display: flex;
      justify-content: space-between;
    }
  </style>
</head>
<body>
  <h1>您好, {{ $myData['name'] }}</h1>
  <p>您已成立訂單, 訂單編號為 {{ $myData['order_id'] }}。</p>
  <p>總金額: {{ $myData['total'] }}</p>
  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque iste a repudiandae! Obcaecati, vero provident, minus fuga consectetur ad illum amet sed, atque modi et ex qui error possimus maxime!</p>
  <div class="test">
    <p style="margin-right: auto;">謝謝惠顧</p>
    <p>宏卷雅 敬上</p>
  </div>
</body>
</html>