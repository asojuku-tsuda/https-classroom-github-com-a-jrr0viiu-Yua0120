<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body class="cyberpunk-bg">
    <div class="login-box">
      <h2>
<?php
// 入力値が配列じゃないかチェック
$username = filter_input(INPUT_GET,'username');
$useraddress = filter_input(INPUT_GET,'useraddress');
$usermail = filter_input(INPUT_GET,'usermail');
// 正規表現かチェック
// 名前
if (is_null($username) || $username === '') {
    die("名前を入力してください。");
}
if (!mb_ereg('^[ぁ-んァ-ヶー一-龯]+$', $username) || mb_strlen($username) > 20) {
    die("20文字以内で名前を入力してください。記号等は利用できません。");
}

// 住所
if (is_null($useraddress) || $useraddress === '') {
    die("住所を入力してください。");
}
if (!mb_ereg('^[ぁ-んァ-ヶー一-龯0-9０-９a-zA-Zａ-ｚＡ-Ｚ\-]+$', $useraddress) || mb_strlen($useraddress) > 30) {
    die("30文字以内で住所を入力してください。記号等は利用できません。");
}

// メールアドレス
if (is_null($usermail) || $usermail === '') {
    die("メールアドレスを入力してください。");
}
if (!filter_var($usermail, FILTER_VALIDATE_EMAIL) || !mb_ereg('^[a-zA-Z0-9._\-@]+$', $usermail)) {
    die("正しいメールアドレス形式で入力してください。記号は.-_@のみ利用可能。");
}

// チェックが全部trueで終わったから出力
echo "あなたが入力した値<br>";
echo "名前：" . $username . "<br>";
echo "住所：" . $useraddress . "<br>";
echo "メールアドレス：" . $usermail;

?>
    </h2>
    </div>
  </body>
</html>
