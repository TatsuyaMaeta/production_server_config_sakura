# ここにタイトルを入れる

## DEMO

    デプロイ先：https://kani-nuneno.sakura.ne.jp/231220_kadai/
    ローカル版動画：XXXXXXXXXXXXX

## 紹介と使い方

    誕生日に欲しいものをみんなにアピールできるサイト

## 工夫した点

    ひと項目ずつ編集可能にしてみた。
    

## 苦戦した点

    　[お知恵拝借したいです]デプロイしてもリンク遷移がうまくいっていない
    ◼︎起きていること
    デプロイしたページ（index）からデータを送信したり、ページ上部リンクからselect.phpに遷移しようとするとエラーメッセージが出る
    DBConnectError:SQLSTATE[HY000] [2002] No such file or directory
    ◼︎試してみたこと
    My SQLをうまく呼び出せていないっぽかったので、localhostの場所指示方法を変えてみた。がしかしエラーメッセージ変わらず。
    [変更前]
    $pdo = new PDO('mysql:dbname=gs_231220kadai;charset=utf8;host=localhost', 'root', '');
    [変更後]
    $pdo = new PDO('mysql:dbname=gs_231220kadai;charset=utf8;host=127.0.0.1', 'root', '');



## 参考にした web サイトなど

