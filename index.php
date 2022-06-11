<?php
/* -------------------------------------------------------------------------
 画像掲示板(ふたば・しおから系)
futaba.php v0.8 lot.041107 Yakuba改 20121120版
----------------------------------------------------------------------------
■futaba.phpについて
このスクリプトはレッツPHP!<http://php.s3.to/>のgazou.phpを改造したものです。
配布条件はレッツPHP!に準じます。改造、再配布は自由にどうぞ。
このスクリプトに関する質問はレッツPHP!にしないようにお願いします。
最新版は<http://www.2chan.net/script/>で配布しています。
ご質問は準備板＠ふたば<http://www.2chan.net/junbi/index2.html>までどうぞ。

■Yakuba改について
このスクリプトは上記を改造したsiokara.phpをさらに改造したものです。
ご利用に際しては無保証無サポートですので、それを承知の上でご利用下さい。
改造箇所につきましてはレッツPHP様・ふたば様・しおから様へは絶対問い合わせないでください。

■設置法
所望のディレクトリのパーミッションを777(707)にします。
srcディレクトリとthumbディレクトリを作り、パーミッションを777(707)にします。
futaba.phpを置き、ブラウザから呼出します(必要なファイルが自動設定されます)。
gif2png<http://www.tuxedo.org/~esr/gif2png/>がある場合は、
gifでもサムネイルを作れます。付属のバイナリはlinux-i386用です。

■注意
・img.logのファイル名はデフォルトから変えてご使用ください。
　define(LOGFILE, 'img.log'); // ログファイル名
・設置サーバによってはindex.htmが無いと画像掲示板設置フォルダ内が見えてしまう場合があります。
　空のindex.htmを置くか、スクリプトの入り口ファイル名指定をindex.htmに変更してください。
　define("PHP_SELF2", 'futaba.htm'); // 入り口ファイル名
・自動でディレクトリが作れない鯖がありますので、保険のために<ref><src><thumb><thumbs>を置いておきます。(Yakuba)

■としあき＠しおから改スクリプト
□Ver.1.0.0 2004/04/21 公開開始
futaba.php v0.8 lot.031015からの主な変更点
bmp/swfの明示的な禁止、gif表示方法改造、サムネ画質向上、スレ主強制sage機能、以下省略設定
gif2pngの入手と基本的な設置方法は上記ふたば準備板スレと配布所を参照のこと。
知恵と助言を授けてくれたとしあき達に多大なる感謝と御礼を。

□Ver.1.0.1 2004/05/09
設定可能項目に追加
文中自動リンクの可否/時間表示に秒を含めるか/メル欄にsage挿入で常時sage/設定時間後に強制sage
以下省略数指定

□Ver.1.0.2 2004/05/19
管理画面にサムネイル差し替え機能を追加/管理画面に強制スレsage化機能を追加

□Ver.1.0.3 2004/05/22
複数のサムネイル画像選択機能追加/画像の取得にhtmlを経由機能追加/投稿時にアニGIFのサムネ化選択可能に
/差し替え動作を一部修正/「レス省略」の設定値を定数化

□Ver.1.0.3a 2004/05/23
レスに画像添付可能バージョン、開発中ベータ版

□Ver.1.0.4 2004/08/01
特定のホストを登録してID(ホスト名を暗号化した文字列)、またはホスト名を表示する機能を追加

□Ver.1.0.4a 2004/08/01
レスに画像添付可能バージョンにID、ホスト名表示機能を追加
相変わらずベータ版のまま(いや、ベータ版以前に味見試験版の希ガス・・・)

□Ver.1.0.4a + α 2005/03/17
バージョンを書くと、ゴチャゴチャなっちゃう可能性があるので、書いてません。
要は、味見実験です。もっと分かり易く言えば、α版だと思え
・削除キー＼題名＼本文＼名前 必須選択
・レス時、そのスレに戻る機能追加
・スレ主が自分のスレの強制ＩＤか否か決定
・スレ主がスレ建て時に名前記入欄有無を決定
・投稿時にクッキーに保存されているものは読み込まないよう変更
・サムネイル作成ルーチンを追加
・赤くしてみるテスト。テキトーです。
・スレストを実験導入。
で、結局のところの位置付けは、α版‥？いや、β版か‥。うーん、、、人柱版かな‥？
なんてゆうか、利用者各自の判断にお任せします！　ソースがかなり汚くなっていますのでご注意を。
☆お約束☆　設置は自己責任でね！

■他力本願の役場改造スクリプト
□sc0137(Ver104a Firefox名前文字化対応 SC121base)改  by Yakuba 20090915版
・Yakuba改造部分には「Yakuba」のコメントが入っています。
・簡易認証キーを追加
・本当に簡易的なものですが、画一的な動作しかしないスパムツールには効果があるかも…
・人為的なスパム投下には効果が薄いかもしれませんが、余所者には分からないキーを付加すればスパムは減るでしょう。
・あまりにもマイナーなキーにすると新規投稿者さえ排除する事になるので注意を。
・動作がおかしかったら適度に直して下さいませ。
□Yakuba 20090921版
・アドレス末尾にスラッシュがない場合、無限アクセスに陥る場合があるバグを修正。
(ちょうど昨年にしおあき様からスクリプトの修正個所を教えていただいていましたが、これを組み込むのを忘れていました。お詫びして組み込みました。ありがとうございます。)
・cat.phpとipcount.phpを利用させていただき、カタログとカウンタを組み込みました。感謝！
□Yakuba 20100130版
・簡易認証キーを、スレ立＆レス時、またはスレ立時のみに使用できる様に変更しました。
□Yakuba 20100203版
・簡易認証キーをモード２にしてレスをすると認証キーエラーとなるミスを修正しました。
・LF改行に統一。極一部の環境で改行コードが混ざっている事でエラーが出るというご報告を頂きまして、統一させてみました。
□Yakuba 20100305版
・UNIX鯖向に文字コードを変えたら今度はWin鯖が癇癪を起こして文字化けだとか…うーん…(0303独り言)
・今更気がつきましたが、ヘッダの文字コード設定と実際の文字コードが違ってたら、そりゃ文字化けしますわな…
・と言うことで「SJIS-CRLF」に統一します。後は適当にいじってみてください。
・あとhtml4.01Transitionalへ少しシフトしてます。
□Yakuba 20101213版
・スレ立てモードの時は「スレッドを立てる」、レスモードの時は「返信する」にボタンを変更。今のふたばに近づいてます。
・あと…ほんっっとに些細なバグフィクス。
・火狐狩り系に対する文字化け対策を施しました(効果があるか分かりませんが…)。
□Yakuba 20110104版
・さらに些細なバグフィクス。あとhtml4.01Transitionalへさらにシフト。
□Yakuba 20110108版
・管理人強制sageにしていてもカキコしたら浮上するバグを修正。
□Yakuba 20110119版
・ちょっだけ改造してdel機能を搭載。
□Yakuba 20110527版
・「futaba.php v0.81 lot.070929」の消える予告時間を搭載。作者様に感謝いたします。
□Yakuba 20110904版 ＋α…
・時限強制スレスト機能を搭載。かなり乱暴かつ不親切な仕様ですので悪しからず…
・一部表示変更とバグフィクス…(20110906版)
□Yakuba 20110923版
・レス数強制スレスト機能を搭載。パンドラの匣の中のぬこ様のスクリプトをかなり参考にさせていただきました。
　この場をお借りしてお礼申し上げます。
□Yakuba 20120206版
・PHP5.3.0より「ereg」や「ereg_replace」などが非推奨となり警告を吐きまくりますので、「preg_match」や「preg_replace」へ置き換えました。
□Yakuba 20120602版
・preg系で一部警告が出まくる現象を確認しましたので、その修正をしました。
□20121120版
・PHP5.4で関数コール時に参照で引数を渡せなくなった事と、htmlspecialcharsの標準動作が変更になった事に対応(ひろ様感謝！)。

【このスクリプトは"ふたば☆ちゃんねる"に似せているため、少しレイアウトが独自になっています】
------------------------------------------------------------------------- */

// 以下2行は調整用・・・
ignore_user_abort(0);
//error_reporting(E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
// グローバル変数のセット
extract($_POST);
extract($_GET);
extract($_COOKIE);
date_default_timezone_set('Asia/Tokyo');        // ◆Yakuba 標準時の設定(dateで必須)
$upfile_name = isset($_FILES["upfile"]["name"]) ? $_FILES["upfile"]["name"] : "";
$upfile = isset($_FILES["upfile"]["tmp_name"]) ? $_FILES["upfile"]["tmp_name"] : "";

if(!defined('PHP_VERSION_ID')) {                // ◆Yakuba PHP5.2.7未満にPHP_VERSION_IDを設ける
  $v = explode('.',PHP_VERSION);
  define('PHP_VERSION_ID', ($v[0] * 10000 + $v[1] * 100 + $v[2]));
}

// 全般設定---------------------------------------------------------------------
define("LOGFILE", 'img.cgi');                   // ログファイル名(本文)
define("TREEFILE", 'tree.cgi');                 // ログファイル名(ツリー)
define("IMG_DIR", 'src/');                      // 画像保存ディレクトリ。futaba.phpから見て
define("THUMB_DIR", 'thumb/');                  // サムネイル保存ディレクトリ
define("TITLE", 'ぽりろだ。- ポリフェノール秋山情報');                  // タイトル（<title>とTOP
define("HOME", '');                             // 「ホーム」へのリンク
define("MAX_KB", 1000);                          // 投稿容量制限 KB（phpの設定により2Mまで
define("MAX_W", 250);                           // 投稿サイズ幅（これ以上はwidthを縮小
define("MAX_H", 250);                           // 投稿サイズ高さ
define("PAGE_DEF", 10);                         // 一ページに表示する記事
define("FOLL_ADD", 110);                        // 以下省略（一ページに表示する記事×指定頁数＝設定数
define("LOG_MAX", 1000);                        // ログ最大行数
define("ADMIN_PASS", 'admin_pass');                  // 管理者パス
// require("./define.php");
define("RE_COL", '789922');                     // ＞が付いた時の色
define("PHP_SELF", 'index.php');               // このスクリプト名
define("PHP_SELF2", 'index.html');              // 入り口ファイル名
define("PHP_EXT", '.htm');                      // 1ページ以降の拡張子
define("RENZOKU", 2);                           // 連続投稿秒数
define("RENZOKU2", 2);                          // 画像連続投稿秒数
define("RENOYA", 1800);                         // 連続スレ立て間隔
define("MAX_RES", 100);                         // 強制sageになるレス数
define("USE_THUMB", 1);                         // サムネイルを作る する:1 しない:0
define("PROXY_CHECK", 0);                       // proxyの書込みを制限する y:1 n:0
define("DISP_ID", 2);                           // IDを表示する 強制:2 する:1 しない:0
define("BR_CHECK", 0);                          // 改行を抑制する行数 しない:0
define("PASS_CHECK", 0);                        // 削除キーの入力をチェックする する:1 しない:0
define("EN_AUTOLINK", 0);                       // URL自動リンクを行う する:1 しない:0
define("EN_SEC", 1);                            // 時間表示に「秒」を含める 含める:1 含めない:0
define("EN_SAGE_START", 1);                     // スレ主強制sage機能を使用する する:1 しない:0
define("MAX_PASSED_HOUR", 0);                   // 強制sageまでの時間 0で強制sageなし(註：スレ主や管理者関係無しの時間による強制sage)
define("ADMIN_SAGE", 1);                        // 管理者強制sage処理 する:1 しない:0
define("NOTICE_SAGE", 0);                       // 強制sageを告知する する:1 しない:0
define("DEF_SUB", 'さよなら緑ちゃん');                      // 省略時の題名
define("DEF_NAME", 'ぽりあき');                 // 省略時の名前
define("DEF_COM", '逃がしませんよ～');    // 省略時の本文
define("SUB_CHECK", 0);                         // 題名省略時拒絶する する:1 しない:0
define("NAME_CHECK", 0);                        // 名前省略時拒絶する する:1 しない:0
define("COM_CHECK", 0);                         // 本文省略時拒絶する する:1 しない:0
// もし、有効にした場合、注意書きを書くことをお勧めします。

define("RES_MARK", '…');                       // レスの頭に付ける文字列
define("OMIT_RES", 6);                          // 「レス省略」を表示するレスの数

// レス画像添付機能-------------------------------------------------------------
define("RES_IMG", 1);                           // レスにも画像を添付できるようにする 添付可能:1 添付不可:0

// アニメーションＧＩＦ設定-----------------------------------------------------
// サムネイルを使用しない場合、GIFをそのまま表示するため、アニメーションGIFが動きます。
define("USE_GIF_THUMB", 1);                     // GIF表示にサムネイルを使用する する:1 しない:0
// define("USE_GIF_THUMB", 0);                     // GIF表示にサムネイルを使用する する:1 しない:0
define("CHECK_ANI", 1);                         // アニメーションGIFかどうかチェックする する:1 しない:0
// 告知はしません.裏でコソーリと取得だけします.

// ツール避けhtml経由関係-------------------------------------------------------
define("IMG_REFER", 1);                         // ツール避けに画像リンクをhtml経由にする する:1 しない:0
define("IMG_REF_DIR", 'ref/');                  // 経由先html格納ディレクトリ

// サムネイル管理者差換え機能---------------------------------------------------
// 差し替えサムネ(1)[replace_n.jpg]有で差換え有効、無しで無効
define("REPLACE_EXT", '.replaced');             // 差し替えの際、元々のサムネイルファイルのお尻に付ける文字
define("NOTICE_THUMB", 0);                      // サムネ差し替えを告知する する:1 しない:0

// 項目を増やす場合は定数宣言したファイル名、タイトルを$rep_thumb配列に追加します。
// もちろん定数宣言しないで直接配列に追加してもOK
define("R_THUM1", 'replace_n.jpg');             // 差し替えサムネ(1) ファイル名
define("R_TITL1", 'ふつう');                    // 差し替えサムネ(1) タイトル
define("R_THUM2", 'replace_g.jpg');             // 差し替えサムネ(2) ファイル名
define("R_TITL2", 'ぐろ');                      // 差し替えサムネ(2) タイトル
define("R_THUM3", 'replace_l.jpg');             // 差し替えサムネ(3) ファイル名
define("R_TITL3", 'ろり');                      // 差し替えサムネ(3) タイトル
define("R_THUM4", 'replace_3.jpg');             // 差し替えサムネ(4) ファイル名
define("R_TITL4", 'さんじ');                    // 差し替えサムネ(4) タイトル

$rep_thumb = array(R_TITL1=>R_THUM1,R_TITL2=>R_THUM2,R_TITL3=>R_THUM3,R_TITL4=>R_THUM4);
$default_thumb = R_THUM1;                       // デフォルトのサムネファイル名

// hage 追加 2004.8.1
// 赤字表示機能追加------------------------------------------------------------
define("HOSTFILE", 'host.lst');                 // 晒しホストの記録ファイル
define("IDHOSTFILE", 'idhost.lst');             // 晒しIDの記録ファイル
// hage 追加ここまで

// hiro 追加 2005.03.17
// サムネイル作成機能選択------------------------------------------------------
define("QUALITY_THUMB", 75);                    // サムネイルの品質 0〜100 まで設定可能 default:75
define("SELECT_THUMB", 0);                      // サムネイル作成 GD版:0 repng2jpeg版:1
// hiro 追加 ここまで

// hiro 追加 2005.03.24
// スレッドストッパー機能------------------------------------------------------
define("THREAD_STOP", 1);                               // スレッドストッパー機能を使用する する:1 しない:0 (◆Yakuba註 スレスト機能は無条件で有効になってるっぽいです…)
//define("NOTICE_STOP", 1);                             // スレストを告知する する:1 しない:0
// hiro 追加 ここまで

// hiro 追加 2005.03.18
// あか〜くなるな〜る。バレるとピンチ！！（でもなかったり‥
// 「'tomato' => '管理人'」となっているならばメル欄に「tomato」と書くことで赤くなります
// 正規表現は使用していないので、完全マッチです。なので、余計なものは書かないこと！
// 変更の余地ありまくりな仕様です。ただのお遊びだと思いねぇ。
// この機能に関するご要望等御座いましたら、掲示板にお願いします。
define("JOY_TOMATO", 1);                                // 赤字機能 使わない:0 使う:1
$tomato = array('tomato' => '管理人', 'tomato2' => '副管理人', 'tomato3' => '削除人');
// hiro 追加 ここまで

// 拒否設定--------------------------------------------------------------------
$badstring = array("vuitton","ブルガリ","chanel","gucci","dummy_string2","無料動画","無料画像","友達募集");      // 拒絶する文字列
$badfile = array("dummy","dummy2");                     // 拒絶するファイルのmd5
$badip = array("addr.dummy.com","addr.dummy2.comt");    // 拒絶するホスト

// 拡張設定--------------------------------------------------------------------
$addinfo = '';                                          // 投稿欄注意書きの追記事項

// ▼Yakuba追加
$koukoku = '';                                          // 広告など
define("NINSYOU", 0);                                   // 簡易認証キー(使用しない：0、スレ立＆レスに使用：1、スレ立のみに使用：2)
define("NINSYOU_MAS", '味方');                          // 簡易認証キー(キーワード)
define("NINSYOU_Q", '先輩の○○だよ！[漢字２字]');      // 簡易認証キー(質問。レイアウトの都合上、文字は少な目に。)
define("DELON", 0);                                     // DEL機能(使用しない：0、使用する：1。同一DIRにdel.phpが必要)
define("EN_DELTIME", 0);                                // 消える予告時間(使用しない：0、使用する：1)
define("THREAD_STOP_TIME", 0);                          // 時限強制スレスト機能を使用する(使用しない：0、使用する：1)
define("THREAD_STOP_HOUR", 48);                         // 強制スレストになる時間(n時間後)
define("THREAD_STOP_RES", 0);                           // レス数強制スレスト機能を使用する(使用しない：0、使用する：1)
define("THREAD_STOP_MAX", 100);                         // 強制スレストになるレス数(ログ最大行数より必ず小さくする事)
// ▲Yakuba追加
//=============================================================================

init();         // ◆初期設定後は不要なので削除可
$path = realpath("./").'/'.IMG_DIR;

/* ヘッダ　◆自己責任の元、各所設定を適当に変更する事をお勧めします */
function head(&$dat){
  $dat.='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja-JP">
<head>
  <meta name="robots" content="index,follow">
  <meta name="Berry" content="no">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <meta http-equiv="Content-Style-Type" content="text/css">
  <meta http-equiv="Content-Script-Type" content="text/javascript">
  <title>'.TITLE.'</title>
  <meta name="description" content="ふたば☆ちゃんねるタイプの画像掲示板です。">
  <meta name="keywords" content="ふたば,ちゃんねる,画像,二次元">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="cache-control" content="no-cache">
  <!--<meta http-equiv="expires" content="-1">-->
  <!-- <link rel="shortcut icon" href="http://アドレス/favicon.ico" type="image/vnd.microsoft.icon"> -->
  <!-- <link rel="icon" href="http://アドレス/favicon.ico" type="image/vnd.microsoft.icon"> -->
  <style type="text/css">
    <!--
    body,tr,td,th { font-size:12pt }
    a:hover       { color:#dd0000; }
    span          { font-size:20pt }
    small         { font-size:10pt }
    -->
  </style>
  <script language="JavaScript">
  <!--
    function l(e){var P=getCookie("pwdc"),N=getCookie("namec"),i;with(document){for(i=0;i<forms.length;i++){if(forms[i].pwd)with(forms[i]){pwd.value=P;}if(forms[i].name)with(forms[i]){name.value=N;}}}};onload=l;function getCookie(key, tmp1, tmp2, xx1, xx2, xx3) {tmp1 = " " + document.cookie + ";";xx1 = xx2 = 0;len = tmp1.length;  while (xx1 < len) {xx2 = tmp1.indexOf(";", xx1);tmp2 = tmp1.substring(xx1 + 1, xx2);xx3 = tmp2.indexOf("=");if (tmp2.substring(0, xx3) == key) {return(unescape(tmp2.substring(xx3 + 1, xx2 - xx1 - 1)));}xx1 = xx2 + 1;}return("");}
    if(self!=top){top.location=self.location;}
  //-->
  </script>
<script>
  (function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');
  ga(\'create\', \'UA-3087318-12\', \'polyloda.com\');
  ga(\'send\', \'pageview\');
</script>
</head>

<body bgcolor="#ffffee" text="#800000" link="#0000ee" vlink="#0000ee">
<p align="right">
<!-- ◆ここら辺にアナライザを入れるといいかも -->
[<a href="'.HOME.'" target="_top">ホーム</a>]
[<a href="'.PHP_SELF.'?mode=admin">管理用</a>]
<p align="center">
<img src="./polyloda.png"><br>
<font size="-2">
the <a href="http://seiga.nicovideo.jp/seiga/im364581">image</a> above is used without permission. :)<br>
</font>
<!--
<font color="#800000" size="5">
<b><span>'.TITLE.'</span></b></font>
-->
<hr width="90%" size="1">
';
}

/* 投稿フォーム */
function form(&$dat,$resno,$admin="",$name_flag=FALSE){
  global $addinfo, $koukoku;
  $msg=""; $hidden="";
  $maxbyte = MAX_KB * 1024;
  $no = $resno;
  if($resno){
    $msg .= "[<a href=\"".PHP_SELF2."\">掲示板に戻る</a>]\n";
    $msg .= "<table width=\"100%\"><tr><th bgcolor=\"#e04000\">\n";
    $msg .= "<font color=\"#ffffff\">レス送信モード</font>\n";
    $msg .= "</th></tr></table>\n";
  }
  if($admin){
    $hidden = "<input type=\"hidden\" name=\"admin\" value=\"".ADMIN_PASS."\">";
    $msg = "<h4>タグがつかえます</h4>";
  }
  $dat .= $msg.'<center>'.
          '<form action="'.PHP_SELF.'" method="POST" enctype="multipart/form-data">'.
          '<input type="hidden" name="mode" value="regist">'.$hidden.
          '<input type="hidden" name="MAX_FILE_SIZE" value="'.$maxbyte.'">';
  if($no){ $dat .= '<input type="hidden" name="resto" value="'.$no.'">'; }

  // hiro 変更 2005.03.17
  $dat .= '<table cellpadding="1" cellspacing="1">';
  // if(!$name_flag) $dat .= '<tr><td bgcolor="#eeaa88"><b>おなまえ</b></td><td><input type="text" name="name" size="28"></td></tr>';
  // hiro 変更 ここまで

  // ▼Yakuba追加
  if (!$resno){
    $dat .= // '<tr><td bgcolor="#eeaa88"><b>E-mail</b></td><td><input type="text" name="email" size="28"></td></tr>'.
            '<tr><td bgcolor="#eeaa88"><b>題　　名</b></td><td><input type="text" name="sub" size="35">'.
            // '<input type="submit" value="スレッドを立てる"></td></tr>'.
            '<input type="submit" value="送信する"></td></tr>'.
            '<tr><td bgcolor="#eeaa88"><b>コメント</b></td>'.
            '<td><textarea name="com" cols="48" rows="4" wrap="soft"></textarea></td></tr>';
  } else {
    $dat .= // '<tr><td bgcolor="#eeaa88"><b>E-mail</b></td><td><input type="text" name="email" size="28"></td></tr>'.
            '<tr><td bgcolor="#eeaa88"><b>題　　名</b></td><td><input type="text" name="sub" size="35">'.
            '<input type="submit" value="返信する"></td></tr>'.
            '<tr><td bgcolor="#eeaa88"><b>コメント</b></td>'.
            '<td><textarea name="com" cols="48" rows="4" wrap="soft"></textarea></td></tr>';
  }
  // ▲Yakuba追加

  if(!$resno || RES_IMG){
    // hage 変更 2004.8.1
    // 投稿時にGIF停止できるようにラベルを追加(USE_GIF_THUMBによる判別追加)
    $add_str = "";
    if($resno) { $add_str = " <font color=\"#FF0000\">■レスに画像添付可</font>"; }
    $dat .= "<tr><td bgcolor=\"#eeaa88\"><b>添付File</b></td>".
            "<td><input type=\"file\" name=\"upfile\" size=\"35\">".$add_str."</td></tr>";
    // hiro 変更 2005.03.16
    // やる気のない変更です‥
if (FALSE) {
    $dat .= "\n<tr><td bgcolor=\"#eeaa88\"><b>オプション</b></td>\n<td>";
    if(!USE_GIF_THUMB){
      $dat .= ' [<label><input type="checkbox" name="noanime" value="on" checked>GIFアニメ停止</label>] ';
    }
    if(!$resno) {
      $dat .= ' [<label><input type="checkbox" name="chkname" value="on" checked>名前欄なし</label>] ';
      $dat .= ' [<label><input type="checkbox" name="chkid" value="on" checked>強制ID表示</label>] ';
      $dat .= ' [<label><input type="checkbox" name="textonly" value="on" checked>画像なし</label>] ';
    }
    if($resno) $dat .= '  [<label><input type="checkbox" name="bakres" value="on" checked>スレに戻る</label>] ';
    $dat .= "</td></tr>\n";
}
    // hiro 変更 ここまで
    // hage 変更ここまで
  }
  $dat .= '<tr><td bgcolor="#eeaa88"><b>削除キー</b></td>'.
          '<td><input type="password" name="pwd" size="8" maxlength="8" value="">'.
          '<small>';
  // hiro 追加 2005.03.15
  if(PASS_CHECK) { $dat .= ' <font color="#FF0099">必須</font> '; }
  // hiro 追加 ここまで
  $dat .= '(記事の削除用。英数字で8文字以内)</small></td></tr>';

  // ▼Yakuba追加
  if (NINSYOU==1){
    $dat .= '<tr><td bgcolor="#eeaa88"><b>認証キー</b></td>'.
            '<td><input type="text" name="ninsyou_key" size="8">'.
            '<small>';
    $dat .= ' <font color="#ff0099">必須</font> ';
    $dat .= '('.NINSYOU_Q.')</small></td></tr>';
  }
  if (NINSYOU==2 && !$resno){
    $dat .= '<tr><td bgcolor="#eeaa88"><b>認証キー</b></td>'.
            '<td><input type="text" name="ninsyou_key" size="8">'.
            '<small>';
    $dat .= ' <font color="#ff0099">必須</font> ';
    $dat .= '('.NINSYOU_Q.')</small></td></tr>';
  }
  // ▲Yakuba追加

  $dat .= '<tr><td colspan="2" style="font-size:small;">
<ul style="margin:0px;"><small>
';
  // hage 変更 2004.8.1
  if(RES_IMG){
    $dat .= '<li>レスに画像添付可.</li>';
  }
  $dat .= '<li>添付可能：GIF, JPG, PNG. ブラウザによっては正常に添付できないことがあります.</li>'.
          '<li>画像は横 '.MAX_W.'ピクセル、縦 '.MAX_H.'ピクセル以上は縮小表示されます.</li>';
  if(!USE_GIF_THUMB){
    $dat .= '<li>GIFは動きます. 動かしたい時は投稿時に[GIFアニメ停止]のチェックを解除.</li>';
  }
  // hage 変更ここまで

  // ▼Yakuba変更
if (FALSE) {
  $dat .= '<li>最大投稿データ量は'.MAX_KB.'KB まで. sage機能付き.</li>'."\n";
  if(EN_SAGE_START){$dat .= '<li>スレ主さん目欄sage記入で強制sage.</li>'."\n";}
  if(THREAD_STOP_TIME){$dat .= '<li>スレを立てて約 '.THREAD_STOP_HOUR.'時間後にそのスレに書き込みが出来なくなります.</li>'."\n";}       // ◆Yakuba追加
  $dat .= '<li>現在<script type="text/javascript" src="ipcount.php"></script>人くらいが見てます. <a href="cat.php">カタログ</a>.</li>'."\n";
  $dat .= '<li>この板の保存数は'.LOG_MAX.'件です.</li>'."\n";
}
  if($addinfo){$dat .= '<li>'.$addinfo.'</li>'."\n";}
  $dat .= '</small></ul>'."\n";
  if($koukoku){$dat .= '<br><center>'.$koukoku.'</center>'."\n";}
  $dat .= '</td></tr></table>'."\n".'</form></center><hr>'."\n";
  // ▲Yakuba変更
}

/* 記事部分 */
function updatelog($resno=0){
  global $path; $p=0;
  global $tomato;                       // hiro 追加 2004.03.18

  // hage 追加 2004.8.1
  $hostdat = array('dummy');
  if(is_file(HOSTFILE)){
    $hostdat = file(HOSTFILE);
    $counthost = count($hostdat);
    for($i=0;$i<$counthost;++$i){ $hostdat[$i] = trim($hostdat[$i],"\n"); }
  }
  $idhostdat = array('dummy');
  if(is_file(IDHOSTFILE)){
    $idhostdat = file(IDHOSTFILE);
    $counthost = count($idhostdat);
    for($i=0;$i<$counthost;++$i){ $idhostdat[$i] = trim($idhostdat[$i],"\n"); }
  }
  // hage 追加ここまで

  // hiro 変更 2005.03.17
  // ハゲあきさんの修正点より移植しました
/*
  $tree = file(TREEFILE);
  $find = false;
  if($resno){
    $counttree=count($tree);
    for($i = 0;$i<$counttree;$i++){
      list($artno,)=explode(",",rtrim($tree[$i]));
      if($artno==$resno){$st=$i;$find=true;break;} //レス先検索
    }
    if(!$find) error("該当記事がみつかりません");
  }
  $line = file(LOGFILE);
  $countline=count($line);
  for($i = 0; $i < $countline; $i++){
    list($no,) = explode(",", $line[$i]);
    $lineindex[$no]=$i + 1; //逆変換テーブル作成
  }
*/

  $tree = file(TREEFILE);
  $find = FALSE;
  if($resno) {
    $counttree = count($tree);
    for($i = 0; $i < $counttree; $i++) {
      $tline = explode(",", rtrim($tree[$i]));
      if($resno == $tline[0] || array_search($resno,$tline)) { //レス先検索
        $resno = $tline[0];
        $st = $i;
        $find = TRUE;
        break;
      }
    }
    if(!$find) { error("該当記事がみつかりません　".$resno); }
  }

  $line = file(LOGFILE);
  $countline = count($line);
  $dispid_flag = FALSE; $name_flag = FALSE;
  for($i = 0; $i < $countline; $i++) {
    list($no,,,,,,$url,,,,,,,) = explode(",", $line[$i]);
    if($no == $resno){
      if(stristr($url, "_vid_")) { $dispid_flag = TRUE; }
      if(stristr($url, "_noname_")) { $name_flag = TRUE; }
    }
    $lineindex[$no] = $i + 1; //逆変換テーブル作成
  }
  // hiro 変更 ここまで

  $counttree = count($tree);
  for($page=0;$page<$counttree;$page+=PAGE_DEF){
    $dat='';
    head($dat);
    // hiro 変更 2005.03.17 引数追加
    form($dat,$resno,FALSE,$name_flag);
    // hiro 変更 ここまで
    if(!$resno){
      $st = $page;
    }
    $dat.='<form action="'.PHP_SELF.'" method=POST>';

  for($i = $st; $i < $st+PAGE_DEF; $i++){
    if(empty($tree[$i])) { continue; }
    $treeline = explode(",", rtrim($tree[$i]));
    $disptree = $treeline[0];
    $j=$lineindex[$disptree] - 1; //該当記事を探して$jにセット
    if(empty($line[$j])) { continue; } //$jが範囲外なら次の行
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pwd,$ext,$w,$h,$time,$chk) = explode(",", $line[$j]);

    // hiro 追加 2005.03.16
    if(!$resno){
      $dispid_flag = (stristr($url, "_vid_")) ? TRUE : FALSE;
      $name_flag = (stristr($url, "_noname_")) ? TRUE : FALSE;
    }
    // hiro 追加 ここまで

    // hiro 追加 2005.03.18
    // 赤字機能
    if (JOY_TOMATO) {
      foreach($tomato as $keys => $v){
        if (!strcmp($email, $keys)) {
          $com = "[<font color=#FF0000>".$v."</font>]<br>".$com;
          $email = str_replace($keys, "", $email);
          break;
        }
      }
    }
    // hiro 追加 ここまで

    // URLとメールにリンク
    // hiro 追加 2005.03.16
    if($name_flag && $email) $now = '<a href="mailto:'.$email.'">'.$now.'</a>';
    // hiro 追加 ここまで
    if($email) $name = "<a href=\"mailto:$email\">$name</a>";
    $com = auto_link($com);
    $com = preg_replace("#(^|>)(&gt;[^<]*)#i", "\\1<font color=".RE_COL.">\\2</font>", $com);

    // 画像ファイル名
    $img = $path.$time.$ext;
    $src = IMG_DIR.$time.$ext;

    // 経由先htmlファイル作成
    if (IMG_REFER && is_file($img) && !is_file(IMG_REF_DIR.$time.".htm")){
      $fp=fopen(IMG_REF_DIR.$time.".htm","w");
      flock($fp, LOCK_EX);
      rewind($fp);
      fputs($fp, "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=../$src\">");
      fclose($fp);
    }

    // <imgタグ作成
    $imgsrc = "";
    $dat_img="";
    if($ext && is_file($img)){
      $size = filesize($img);//altにサイズ表示
      if($w && $h){//サイズがある時
        if(@is_file(THUMB_DIR.$time.'s.jpg') &&
          (USE_GIF_THUMB||$ext!='.gif'||stristr($url,'noanime')||@is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT))){
          $imgsrc = "<small>サムネイルを表示しています.クリックすると元のサイズを表示します.</small><br>";
          if (IMG_REFER) {$imgsrc .= "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
          else{$imgsrc .= "<a href=\"".$src."\" target=_blank>";}
          if ( @is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)){
            $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg'.REPLACE_EXT;
          }
          else{
            $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg';
          }
          $imgsrc .= " border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
        }else{
          if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
          else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
          $imgsrc .= "<img src=".$src." border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
        }
      }else{//それ以外
        if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
        else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
        $imgsrc .= "<img src=".$src." border=0 align=left hspace=20 alt=\"".$size." B\"></a>";
      }
      if (IMG_REFER) {
        // スレもテーブル型にするために画像関係タグを別変数に
        $dat_img="画像タイトル：<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";
      } else {
        $dat_img="画像タイトル：<a href=\"$src\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";
      }
    }
    // メイン作成
    $dat .= $dat_img; //画像関係文字列をここに移動
    $dat .= "<input type=checkbox name=\"$no\" value=delete><font color=#cc1105 size=\"+1\"><b>$sub</b></font> \n";
    // hage 追加 2004.8.1
    // $dat .= " <font color=#117743><b>$name</b></font> $now No.$no &nbsp; \n";
    // hiro 変更 2005.03.16
    // $dat .= " <font color=#117743><b>$name</b></font> $now";
    if($name_flag) { $dat .= " $now"; }
    else { $dat .= " <font color=\"#117743\"><b>$name</b></font> $now"; }
    // if(!DISP_ID && in_array($host,$idhostdat) && !stristr($now,"ID:")){
    if(!DISP_ID && in_array($host,$idhostdat) && !stristr($now,"ID:") || $dispid_flag){
    // hiro 変更 ここまで
      $idtemp = " ID:".substr(crypt(md5($host),'id'),-8);
      $dat .= $idtemp;
    }
    $dat .= " No.$no \n";
    if(DELON){ $dat.="<a href=\"./del.php?res=$no\">del</a>&nbsp;"; }       // ◆Yakuba追加
    // ▼Yakuba追加
    if(EN_DELTIME){
      list( ,,,,,,,,,,,, $dtimenew, ) = explode( ",", $line[ 0 ] );
      list( ,,,,,,,,,,,, $dtimeold, ) = explode( ",", $line[ $countline - 1 ] );
      $dtimenew = intval( substr( $dtimenew, 0, 10 ) );
      $dtimeold = intval( substr( $dtimeold, 0, 10 ) );
      $dtime = intval( substr( $time, 0, 10 ) );
      $dat.= "<small>".date( "H:i", $dtimenew - $dtimeold + $dtime)."頃消えます&nbsp;</small>";
    }
    // ▲Yakuba追加
    // hage 追加ここまで
    if(!$resno){ $dat.="[<a href=".PHP_SELF."?res=$no>返信</a>]<br>"; }
    // hage 追加 2004.8.1
    // $dat.="\n<blockquote>$com</blockquote>";
    if(in_array($host,$hostdat)){
      $dat .= "\n<blockquote>[<font color=#ff0000>$host</font>]<br>$com</blockquote>";
    }else{
      $dat .= "\n<blockquote>$com</blockquote>";
    }
    // hage 追加ここまで

    $stop_flag = (stristr($url, '_tstop_')) ? TRUE : FALSE;     // hiro 追加 2005.03.24

    // そろそろ消える。
    if($lineindex[$no]-1 >= LOG_MAX*0.95){
      $dat.="<font color=\"#f00000\"><b>このスレは古いので、もうすぐ消えます。</b></font><br>\n";
    }

    // 管理者サムネ差し替え告知
    if(NOTICE_THUMB && @is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)){
      $dat.="<font color=\"#f00000\"><small><b>".
            "このスレは管理者によりサムネイルが差し替えられています。理由はお察しください。<br>".
            "サムネイルをクリックすると元の画像を表示します。".
            "</b></small></font><br>\n";
    }

    // 管理者sage告知
    if(NOTICE_SAGE && stristr($url,'sage')){
      $dat.="<font color=\"#f00000\"><small><b>".
            "このスレは管理者によりsage指定されています。理由はお察しください。".
            "</b></small></font><br>\n";
    }

    //レス作成

    $countres = count($treeline);

    // ▼Yakuba追加
    if(THREAD_STOP_RES){
      $ts_nokori = THREAD_STOP_MAX - $countres;
      if($ts_nokori > 0){
        if(THREAD_STOP_MAX*0.5 > $ts_nokori){$dat .= "<font color=\"#707070\">レス可能数はあと".($ts_nokori)."です。</font><br>\n";}
      } else {
        $dat .= "<font color=\"#707070\">スレッドストップです。</font><br>\n";
        $stop_flag = TRUE;
      }
    }
    // ▲Yakuba追加

    if(!$resno) {
      $s = $countres - OMIT_RES;
      if($s < 1) { $s = 1; }
      elseif($s > 1) {
       $dat .= "<font color=\"#707070\">レス".
               ($s - 1)."件省略。全て読むには返信ボタンを押してください。</font><br>\n";
      }
    } else { $s = 1; }

    for($k = $s; $k < $countres; $k++){
      $disptree = $treeline[$k];
      $j=$lineindex[$disptree] - 1;
      if(empty($line[$j])) { continue; }
      list($no,$now,$name,$email,$sub,$com,$url,
           $host,$pwd,$ext,$w,$h,$time,$chk) = explode(",", $line[$j]);

      // hiro 追加 2005.03.18
      // 赤字機能
      if (JOY_TOMATO) {
        foreach($tomato as $keys => $v){
          if (!strcmp($email, $keys)) {
            $com = "[<font color=#ff0000>".$v."</font>]<br>".$com;
            $email = str_replace($keys, "", $email);
            break;
          }
        }
      }
      // hiro 追加 ここまで

      // URLとメールにリンク
      // hiro 追加 2005.03.16
      if($name_flag && $email) $now = '<a href="mailto:'.$email.'">'.$now.'</a>';
      // hiro 追加 ここまで
      if($email) $name = "<a href=\"mailto:$email\">$name</a>";
      $com = auto_link($com);
      $com = preg_replace("#(^|>)(&gt;[^<]*)#i", "\\1<font color=".RE_COL.">\\2</font>", $com);

      // 画像ファイル名
      $img = $path.$time.$ext;
      $src = IMG_DIR.$time.$ext;
      // 経由先htmlファイル作成
      if (IMG_REFER && is_file($img) && !is_file(IMG_REF_DIR.$time.".htm")){
        $fp=fopen(IMG_REF_DIR.$time.".htm","w");
        flock($fp, LOCK_EX);
        rewind($fp);
        fputs($fp, "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=../$src\">");
        fclose($fp);
      }
      // <imgタグ作成
      $imgsrc = "";
      $dat_img="";
      if($ext && is_file($img)){
        $size = filesize($img);//altにサイズ表示
        if($w && $h){//サイズがある時
          // スレ主アニメーション停止指示追加
          if(@is_file(THUMB_DIR.$time.'s.jpg') &&
            (USE_GIF_THUMB||$ext!='.gif'||stristr($url,'noanime')||@is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT))){
            // ツール避けhtml参照を追加
            $imgsrc = "<small>サムネイルを表示しています.クリックすると元のサイズを表示します.</small><br>";
            if (IMG_REFER) {$imgsrc .= "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
            else{$imgsrc .= "<a href=\"".$src."\" target=_blank>";}
            if ( @is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)){
              $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg'.REPLACE_EXT;
            }
            else{
              $imgsrc .= "<img src=".THUMB_DIR.$time.'s.jpg';
            }
            $imgsrc .= " border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
          }else{
            if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
            else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
            $imgsrc .= "<img src=".$src." border=0 align=left width=$w height=$h hspace=20 alt=\"".$size." B\"></a>";
          }
        }else{//それ以外
          if (IMG_REFER) {$imgsrc = "<a href=\"".IMG_REF_DIR.$time.".htm\" target=_blank>";}
          else{$imgsrc = "<a href=\"".$src."\" target=_blank>";}
          $imgsrc .= "<img src=".$src." border=0 align=left hspace=20 alt=\"".$size." B\"></a>";
        }
        if (IMG_REFER) {
          $dat_img = "<br>画像タイトル：<a href=\"".IMG_REF_DIR.$time.
                     ".htm\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";
        }
        else{
          $dat_img="<br>画像タイトル：<a href=\"$src\" target=_blank>$time$ext</a>-($size B)<br>$imgsrc";
        }
      }

      // 別変数に入れた画像用タグ文字列をテーブルの中に配置
      // メイン作成
      $dat.="<table border=\"0\"><tr><td nowrap align=\"right\" valign=\"top\">".RES_MARK."</td><td bgcolor=\"#f0e0d6\">\n";
      $dat.="<input type=\"checkbox\" name=\"$no\" value=\"delete\"><font color=\"#cc1105\" size=\"+1\"><b>$sub</b></font> \n";
      // hage 追加 2004.8.1
      // $dat.=" <font color=#117743><b><b>$name</b></b></font> $now No.$no &nbsp;";
      // hiro 変更 2005.03.16
      // $dat .= " <font color=#117743><b>$name</b></font> $now";
      if($name_flag) { $dat .= " $now"; }
      else { $dat .= " <font color=\"#117743\"><b>$name</b></font> $now"; }
      // if(!DISP_ID && in_array($host,$idhostdat) && !stristr($now,"ID:")){
      if(!DISP_ID && in_array($host,$idhostdat) && !stristr($now,"ID:") || $dispid_flag){
      // hiro 変更 ここまで
        $idtemp = " ID:".substr(crypt(md5($host),'id'),-8);
        $dat .= $idtemp;
      }
      $dat .= " No.$no \n";
      if(DELON){ $dat.="<a href=\"./del.php?res=$no\">del</a>&nbsp;"; }         // ◆Yakuba追加
      // $dat.="$dat_img<blockquote>$com</blockquote>";
      $dat .= "$dat_img<blockquote>";
      if(in_array($host,$hostdat)){ $dat .= "[<font color=#ff0000>$host</font>]<br>"; }
      $dat .= "$com</blockquote>";
      // hage 追加ここまで
      $dat.="</td></tr></table>\n";
    }

    // hiro 追加 2005.03.24
    if($stop_flag) {
    $marktext = RES_MARK;
      $dat .= <<<__STOP__
<table border=0><tr><td align="right" valign="top" nowrap>$marktext</td><td bgcolor="#F0E0D6">
<input type="checkbox" name="" value=""><font color="#cc1105" size="+1"><b>スレスト</b></font> <font color="#117743"><b>スレッドストッパー</b></font> 38/01/19(火)03:14:07 No.∞
<blockquote>もう、書き込めませんよ。<br><br>停止しました。。。<br>スレッドストッパー。。。(‾ー‾)ニヤリッ</blockquote></td></tr></table>
__STOP__;
    }
    // hiro 追加 ここまで

    $dat.="<br clear=left><hr>\n";
    clearstatcache();//ファイルのstatをクリア
    $p++;
    if($resno){break;} //res時はtree1行だけ
  }

  $dat .= '<table align="right"><tr><td nowrap align="center">'.
          '<input type="hidden" name="mode" value="usrdel">【記事削除】'.
          '[<input type="checkbox" name="onlyimgdel" value="on">画像だけ消す]<br>'.
          '削除キー<input type="password" name="pwd" size="8" maxlength="8" value="">'.
          '<input type="submit" value="削除"></form></td></tr></table>';

    if(!$resno){ //res時は表示しない
      $prev = $st - PAGE_DEF;
      $next = $st + PAGE_DEF;
    // 改ページ処理
      $dat.="<table align=\"left\" border=\"1\"><tr>";
      if($prev >= 0){
        if($prev==0){
          $dat.="<form action=\"".PHP_SELF2."\" method=\"get\"><td>";
        }else{
          $dat.="<form action=\"".$prev/PAGE_DEF.PHP_EXT."\" method=\"get\"><td>";
        }
        $dat.="<input type=\"submit\" value=\"前のページ\">";
        $dat.="</td></form>";
      }else{$dat.="<td>最初のページ</td>";}

      $dat.="<td>";
      for($i = 0; $i < count($tree) ; $i+=PAGE_DEF){
        if($i >= FOLL_ADD){ $dat.="[以下省略]";break; }
        if($st==$i){$dat.="[<b>".($i/PAGE_DEF)."</b>] ";}
        else{
          if($i==0){$dat.="[<a href=\"".PHP_SELF2."\">0</a>] ";}
          else{$dat.="[<a href=\"".($i/PAGE_DEF).PHP_EXT."\">".($i/PAGE_DEF)."</a>] ";}
        }
      }
      $dat.="</td>";

      if($p >= PAGE_DEF && count($tree) > $next && $next < FOLL_ADD){
        $dat.="<form action=\"".$next/PAGE_DEF.PHP_EXT."\" method=\"get\"><td>";
        $dat.="<input type=\"submit\" value=\"次のページ\">";
        $dat.="</td></form>";
      }else{$dat.="<td>最後のページ</td>";}
        $dat.="</tr></table><br clear=\"all\">\n";
    }
    foot($dat);
    if($resno){echo $dat;break;}
    if($page==0){$logfilename=PHP_SELF2;}
        else{$logfilename=$page/PAGE_DEF.PHP_EXT;}
    // hage 追加 2004.8.1
    ignore_user_abort(1);
    // hage 追加ここまで
    $fp = fopen($logfilename, "w");
    flock($fp, LOCK_EX);
    set_file_buffer($fp, 0);
    rewind($fp);
    fputs($fp, $dat);
    fclose($fp);
    chmod($logfilename,0666);
    // hage 追加 2004.8.1
    ignore_user_abort(0);
    // hage 追加ここまで
    if($page >= FOLL_ADD){ break; }
  }
  if(!$resno&&is_file(($page/PAGE_DEF+1).PHP_EXT)){unlink(($page/PAGE_DEF+1).PHP_EXT);}
}

/* フッタ */
function foot(&$dat){
  $dat.='
<center>
<small><!-- GazouBBS v3.0 --><!-- ふたば改0.8 --><!-- しおから改1.0.4 -->
- <a href="http://php.s3.to" target=_top>GazouBBS</a> + <a href="http://www.2chan.net/" target=_top>futaba</a> + <a href="http://siokara.que.jp/" target=_top>siokara</a> + <a href="http://t-jun.kemoren.com/" target="_top">yakuba</a> -
</small>
</center>
</body></html>';
}

/* オートリンク */
function auto_link($proto){
  if(EN_AUTOLINK){
    $proto = preg_replace("#(https?|ftp|news)(://[[:alnum:]\+\$\;\?\.%,!#~*/:@&=_-]+)#","<a href=\"\\1\\2\" target=\"_blank\">\\1\\2</a>",$proto);
  }
  return $proto;
}

/* エラー画面 */
function error($mes, $dest=''){
  global $upfile_name,$path;
  if(is_file($dest)) unlink($dest);
  head($dat);
  echo $dat;
  echo "<br><br><hr size=1><br><br>",
       "<center><font color=red size=5><b>$mes<br><br><a href=".PHP_SELF2.">リロード</a></b></font></center>",
       "<br><br><hr size=1>";
  die("</body></html>");
}

/* プロクシ接続チェック */
function  proxy_connect($port) {
  $a="";$b="";
  $fp = @fsockopen ($_SERVER["REMOTE_ADDR"], $port,$a,$b,2);
  if(!$fp){return 0;}else{return 1;}
}

/* 記事書き込み */
function regist($name,$email,$sub,$com,$url,$pwd,$upfile,$upfile_name,$resto){
  global $path,$badstring,$badfile,$badip,$pwdc,$textonly;
  global $noanime,$chkname,$chkid,$bakres;      // hiro 変更 2005.03.16
  $dest=""; $mes=""; $ext="";
  $pwd= $pwd ? (string)$pwd :'';
  $pwdc = $pwdc ? (string)$pwdc :'';
  // honishi
  $textonly = TRUE;
  $noanime = TRUE;
  $chkname = TRUE;
  $chkid = TRUE;
  $bakres = TRUE;
  // /honishi

  // 時間
  $time = time();
  $tim = $time.substr(microtime(),2,3);

  if($resto && !RES_IMG && $upfile) { error("いや、画像レス禁止だし。"); }      // hiro 追加 2005.03.18

  // ▼Yakuba追加
  if(NINSYOU==1){
    $ninsyou_key2 = ($_POST['ninsyou_key']);
    if (!(NINSYOU_MAS==$ninsyou_key2)) {
      error("認証キーが違います<br>再度確認してください"); 
    }
  }
  if(NINSYOU==2 && !$resto){
    $ninsyou_key2 = ($_POST['ninsyou_key']);
    if (!(NINSYOU_MAS==$ninsyou_key2)) {
      error("認証キーが違います<br>再度確認してください"); 
    }
  }
  // ▲Yakuba追加

  // アップロード処理
  if(isset($_FILES["upfile"]["error"])){//エラーチェック
	if(in_array($_FILES["upfile"]["error"],[1,2])){
		error('ファイルサイズが大きすぎます。');//容量オーバー
	} 
  }

  if($upfile&&file_exists($upfile)){
    $dest = $path.$tim.'.tmp';
    move_uploaded_file($upfile, $dest);
    //↑でエラーなら↓に変更
    //copy($upfile, $dest);
    $upfile_name = CleanStr($upfile_name);
    if(!is_file($dest)) error("アップロードに失敗しました<br>サーバがサポートしていない可能性があります", $dest);
    $size = getimagesize($dest);
    if(!is_array($size)) error("アップロードに失敗しました<br>画像ファイル以外は受け付けません", $dest);
    $chk = md5_of_file($dest);
    foreach($badfile as $value){if(FALSE && preg_match("#^$value#",$chk)){
      error("アップロードに失敗しました<br>同じ画像がありました", $dest); //拒絶画像
    }}
    chmod($dest,0666);
    $W = $size[0];
    $H = $size[1];

    switch ($size[2]) {
      case 2 : $ext=".jpg";break;
      case 3 : $ext=".png";break;
      case 1 : $ext=".gif";break;
      default : $ext=".xxx";error("アップロードに失敗しました<br>GIF,JPG,PNG以外の画像ファイルは受け付けません", $dest);break;
    }

    // 画像表示縮小
    if($W > MAX_W || $H > MAX_H){
      $W2 = MAX_W / $W;
      $H2 = MAX_H / $H;
      ($W2 < $H2) ? $key = $W2 : $key = $H2;
      $W = ceil($W * $key);
      $H = ceil($H * $key);
    }
    $mes = "画像 $upfile_name のアップロードが成功しました<br><br>";
  }

  foreach($badstring as $value){if(preg_match("#$value#",$com)||preg_match("#$value#",$sub)||preg_match("#$value#",$name)||preg_match("#$value#",$email)){
  error("拒絶されました(str)", $dest);};}
  if($_SERVER["REQUEST_METHOD"] != "POST") error("不正な投稿をしないで下さい(post)", $dest);
  // フォーム内容をチェック
  if(!$name||preg_match("#^[ |　|]*$#",$name)) $name="";
  if(!$com||preg_match("#^[ |　|\t]*$#",$com)) $com="";
  if(!$sub||preg_match("#^[ |　|]*$#",$sub))   $sub=""; 

  if(!$resto&&!$textonly&&!is_file($dest)) error("画像がありません", $dest);
  if(!$com&&!is_file($dest)) error("何か書いて下さい", $dest);

  $name=str_replace("管理","\"管理\"",$name);
  $name=str_replace("削除","\"削除\"",$name);

  if(strlen($com) > 1000) error("本文が長すぎます", $dest);
  if(strlen($name) > 100) error("名前が長すぎます", $dest);
  if(strlen($email) > 100) error("メール欄が長すぎます", $dest);
  if(strlen($sub) > 100) error("題名が長すぎます", $dest);
  if(strlen($resto) > 10) error("レス番号の指定が長すぎます", $dest);
  if(strlen($url) > 100) error("URL欄が長すぎます", $dest);

  //ホスト取得
  $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);

  foreach($badip as $value){ //拒絶host
   if(preg_match("#$value$#i",$host)){
    error("拒絶されました(host)", $dest);
  }}
  if(preg_match("#^mail#i",$host)
    || preg_match("#^ns#i",$host)
    || preg_match("#^dns#i",$host)
    || preg_match("#^ftp#i",$host)
    || preg_match("#^prox#i",$host)
    || preg_match("#^pc#i",$host)
    || preg_match("#^[^\.]\.[^\.]$#i",$host)){
    $pxck = "on";
  }
  if(preg_match("#ne\\.jp$#i",$host)||
    preg_match("#ad\\.jp$#i",$host)||
    preg_match("#bbtec\\.net$#i",$host)||
    preg_match("#aol\\.com$#i",$host)||
    preg_match("#uu\\.net$#i",$host)||
    preg_match("#asahi-net\\.or\\.jp$#i",$host)||
    preg_match("#rim\\.or\\.jp$#i",$host)
    ){$pxck = "off";}
  else{$pxck = "on";}

  if($pxck=="on" && PROXY_CHECK){
    if(proxy_connect('80') == 1){
      error("ＥＲＲＯＲ！　公開ＰＲＯＸＹ規制中！！(80)", $dest);
    } elseif(proxy_connect('8080') == 1){
      error("ＥＲＲＯＲ！　公開ＰＲＯＸＹ規制中！！(8080)", $dest);
    }
  }

  // hiro 変更 2005.03.15
/*
  // No.とパスと時間とURLフォーマット
  srand((double)microtime()*1000000);
  if($pwd==""){
    if($pwdc==""){
      $pwd=rand();$pwd=substr($pwd,0,8);
    }else{
      $pwd=$pwdc;
    }
  }
*/
  // No.とパスと時間とURLフォーマット
  list($usec,) = explode(' ', microtime());
  srand($usec * 1000000);

  if($pwd==""){
    if(PASS_CHECK) { error("削除キーが未入力です",  $dest); }
    $pwd=rand();$pwd=substr($pwd,0,8);
  }
  // hiro 変更 ここまで

  $c_pass = $pwd;
  $pass = ($pwd) ? substr(md5($pwd),2,8) : "*";
  $youbi = array('日','月','火','水','木','金','土');
  $yd = $youbi[gmdate("w", $time+9*60*60)];
  if(EN_SEC){
      $now = gmdate("y/m/d",$time+9*60*60)."(".(string)$yd.")".gmdate("H:i:s",$time+9*60*60);
  } else {
      $now = gmdate("y/m/d",$time+9*60*60)."(".(string)$yd.")".gmdate("H:i",$time+9*60*60);
  }

  if(DISP_ID){
    if($email&&DISP_ID==1){
      $now .= " ID:???";
    } else {
      $now .= " ID:".substr(crypt(md5($_SERVER["REMOTE_ADDR"].'idの種'.gmdate("Ymd", $time+9*60*60)),'id'),-8);
    }
  }
  //テキスト整形
  $email= CleanStr($email);  $email=preg_replace("#[\r\n]#","",$email);
  $sub  = CleanStr($sub);    $sub  =preg_replace("#[\r\n]#","",$sub);
  $url  = CleanStr($url);    $url  =preg_replace("#[\r\n]#","",$url);
  $resto= CleanStr($resto);  $resto=preg_replace("#[\r\n]#","",$resto);
  if(!$resto)$url .='_thre';
  $com  = CleanStr($com);
  // 改行文字の統一。 
  $com = str_replace( "\r\n",  "\n", $com); 
  $com = str_replace( "\r",  "\n", $com);
  // 連続する空行を一行
  $com = preg_replace("#\n((　| )*\n){3,}#","\n",$com);
  if(!BR_CHECK || substr_count($com,"\n")<BR_CHECK){
    $com = nl2br($com);         //改行文字の前に<br>を代入する
  }
  $com = str_replace("\n",  "", $com);  //\nを文字列から消す。

  $name=str_replace("◆","◇",$name);
  $name=preg_replace("#[\r\n]#","",$name);
  $names=$name;
  $name = CleanStr($name);
  if(preg_match("/(#|＃)(.*)/",$names,$regs)){
    $cap = $regs[2];
    $cap=strtr($cap,"&amp;", "&");
    $cap=strtr($cap,"&#44;", ",");
    $name=preg_replace("/(#|＃)(.*)/","",$name);
    $salt=substr($cap."H.",1,2);
    $salt=preg_replace("#[^\.-z]#",".",$salt);
    $salt=strtr($salt,":;<=>?@[\\]^_`","ABCDEFGabcdef"); 
    $name.="</b>◆".substr(crypt($cap,$salt),-10)."<b>";
  }

  // 萌え連さんのスクリプトを参考に、省略時文字列を定数化
  // hiro 変更 2005.03.15  
  if(!$name) {
    if(NAME_CHECK) error("名前がありません",  $dest);
    $name = DEF_NAME;
  }
  if(!$com) {
    if(COM_CHECK) error("本文がありません",  $dest);
    $com = DEF_COM;
  }
  if(!$sub) {
    if(SUB_CHECK) error("題名がありません",  $dest);
    $sub = DEF_SUB;
  }
  // hiro 変更 ここまで

  // スレ主のアニメーション停止指示追加
  if ($ext == '.gif' && $noanime == 'on') { $url .= 'noanime'; }

  // アニメーションGIFかどうか判断
  if(CHECK_ANI && !strcmp($ext, ".gif")) {
    $a=array(); $rtn=0;
    // チェック用外部コマンド呼び出し
    if(stristr(PHP_OS,"WIN")) {
      if(file_exists(realpath("./gif2png.exe"))) {
        @exec(realpath("./gif2png.exe")." -c $dest",$a,$rtn);
      }
    } else {
      if(is_executable(realpath("./gif2png"))) {
        @exec(realpath("./gif2png")." -c $dest",$a,$rtn);
      }
    }
    // コマンド戻り値をチェックして2以上(2フレーム以上)のときは印をつける
    if($rtn > 1) { $url .= '_ugo_'; }
  }

  // hiro 追加 2005.03.16
  // 指示を追加
  if (!strcmp($chkname, 'on')) { $url .= '_noname_'; }
  if (!strcmp($chkid, 'on')) { $url .= '_vid_'; }
  // hiro 追加 ここまで

  // ログ読み込み
  $fp = fopen(LOGFILE, "r+") or error("ERROR! load log", $dest);
  set_file_buffer($fp, 0);
  flock($fp, LOCK_EX);
  rewind($fp);
  $buf = fread($fp, 1000000);
  if($buf == '') { error("error load log", $dest); }
  $line = explode("\n", $buf);
  $countline = count($line) - 1; // ゴミが入る為 -1 追加
  for($i = 0; $i < $countline; $i++) {
//    if(empty($line[$i])) { continue; }
    list($artno,) = explode(",", rtrim($line[$i])); // 逆変換テーブル作成
//    $lineindex[$artno] = $i + 1;
    $lineindex[$artno] = $i;
    $line[$i] .= "\n";
  }

  // sage判定(スレsageスタート、時間経過sage、管理者sage)
  $flgsage = FALSE;
  if($resto) {
//    if(empty($line[$lineindex[$resto]-1])) { continue; }
//    list(,,,$chkemail,,,$chkurl,,,,,,$ltime,) = explode(",", rtrim($line[$lineindex[$resto]-1]));
    list(,,,$chkemail,,,$chkurl,,,,,,$ltime,) = explode(",", rtrim($line[$lineindex[$resto]]));
    if(strlen($ltime) > 10) { $ltime = substr($ltime, 0, -3); }
    if(EN_SAGE_START && stristr($chkemail, 'sage')) { $flgsage = TRUE; }
    if(MAX_PASSED_HOUR && (($time - $ltime) >= (MAX_PASSED_HOUR*60*60))) { $flgsage = TRUE; }
    if(ADMIN_SAGE && stristr($chkurl, 'sage')) { $flgsage = TRUE; }
    // hiro 追加 2005.03.24
    if(stristr($chkurl, '_tstop_')) { error("スレッドストッパー。。。(‾ー‾)ニヤリッ", $dest); }
    // hiro 追加 ここまで
    // if($stop_flag) { error("スレッドストップです。はい。", $dest); }
    if(THREAD_STOP_TIME && (($time - $ltime) >= (THREAD_STOP_HOUR*60*60))) { $stop_flag = TRUE; error("制限時間を越えましたので書き込みが出来ません", $dest); }         // ◆Yakuba追加
  }

  // 二重投稿チェック
  $imax = ($countline > 20) ? 20 : $countline;
  for($i = 0; $i < $imax; $i++) {
//   if(empty($line[$i])) { continue; }
   list($lastno,,$lname,,,$lcom,,$lhost,$lpwd,,,,$ltime,) = explode(",", $line[$i]);
   if(strlen($ltime) > 10) { $ltime = substr($ltime, 0, -3); }
   if($host==$lhost || substr(md5($pwd),2,8)==$lpwd || substr(md5($pwdc),2,8)==$lpwd) { $pchk=1; }else{ $pchk=0; }
   if(RENZOKU && $pchk && $time - $ltime < RENZOKU)
    error("連続投稿はもうしばらく時間を置いてからお願い致します", $dest);
   if(RENZOKU && $pchk && $time - $ltime < RENZOKU2 && $upfile_name)
    error("画像連続投稿はもうしばらく時間を置いてからお願い致します", $dest);
   if(RENZOKU && $pchk && $com == $lcom && !$upfile_name)
    error("本文が前回の投稿の内容と同じです", $dest);
  }

  // 連続スレ立てチェック
  if($dest && file_exists($dest)) {
    $imax = ($countline > 30) ? 30 : $countline;
    for($i = 0; $i < $imax; $i++) { // 親記事、host、投稿時間チェック
      // if(empty($line[$i])) { continue; }
      list(,,,,,,$chkurl,$chkhost,,,,,$ltime,,) = explode(",", $line[$i]);
      if(strlen($ltime) > 10) { $ltime = substr($ltime, 0, -3); }
      if($host==$chkhost && strpos($chkurl, 'thre') && strpos($url, 'thre')) { $purl=1; }else{ $purl=0; }
      if(RENOYA && $purl && $time - $ltime < RENOYA)
      error("スレ立てはもうしばらく時間を置いてからお願い致します", $dest);
    }
  }

  // ▼Yakuba追加(パンドラの匣の中のぬこ様に感謝です)
  // スレッドストップ
  if(THREAD_STOP_RES){
    $fq = fopen(TREEFILE, "r");
    $trbuf = fread($fq,1000000);
    fclose($fq);        // ここらでツリーファイルを見てる
    if($trbuf=='') error("ツリーファイルが壊れている可能性があります。",$dest);
    $trline = explode("\n",$trbuf);
    $trcount = count($trline);
    if($resto){
      for($i=0; $i<$trcount; $i++){
        $trno = explode(",", rtrim($trline[$i]));
        if($trno[0]==$resto){
          $trline[$i]=rtrim($trline[$i]).",1\n";
          $trj=explode(",", rtrim($trline[$i]));
          if(count($trj) > THREAD_STOP_MAX) error("スレッドストップです。",$dest);
          break;
        }
      }
    }
  }
  // ▲Yakuba追加

  // ログ行数オーバー
  if($countline > LOG_MAX) {
    for($d = $countline-1; $d >= LOG_MAX-1; $d--) {
//      if(empty($line[$d])) { continue; }
      list($dno,,,,,,,,,$dext,,,$dtime,) = explode(",", $line[$d]);
      if(is_file($path.$dtime.$dext)) unlink($path.$dtime.$dext);
      if(is_file(THUMB_DIR.$dtime.'s.jpg')) unlink(THUMB_DIR.$dtime.'s.jpg');
      if(is_file(THUMB_DIR.$dtime.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$dtime.'s.jpg'.REPLACE_EXT);
      if(is_file(IMG_REF_DIR.$dtime.'.htm')) unlink(IMG_REF_DIR.$dtime.'.htm');
      $line[$d] = "";
      treedel($dno,TRUE);
    }
  }

  // アップロード処理
  if($dest && file_exists($dest)) {
    $imax = ($countline > 2000) ? 2000 : $countline;
    for($i = 0; $i < $imax; $i++) { // 画像重複チェック
//     if(empty($line[$i])) { continue; }
     list(,,,,,,,,,$extp,,,$timep,$chkp,) = explode(",", $line[$i]);
     if(FALSE && $chkp == $chk && file_exists($path.$timep.$extp)) {
      error("アップロードに失敗しました<br>同じ画像があります", $dest);
    }}
  }

  list($lastno,) = explode(",", $line[0]);
  $no = $lastno + 1;
  isset($ext)?0:$ext="";
  isset($W)?0:$W="";
  isset($H)?0:$H="";
  isset($chk)?0:$chk="";
  $newline = "$no,$now,$name,$email,$sub,$com,$url,$host,$pass,$ext,$W,$H,$tim,$chk,\n";
  $newline .= implode('', $line);
//  set_file_buffer($fp, 0);
//  ftruncate($fp, 0);
  rewind($fp);
  fputs($fp, $newline);
  ftruncate($fp, ftell($fp));
  flock($fp, LOCK_UN);
  fclose($fp);

  // ツリー更新
  $find = FALSE;
  $newline = '';
  $tp = fopen(TREEFILE, "r+") or error("ERROR! load tree", $dest);
  set_file_buffer($tp, 0);
  flock($tp, LOCK_EX);
  rewind($tp);
  $buf = fread($tp, 1000000);
  if($buf == '') { error("error tree update", $dest); }
  $line = explode("\n", $buf);
  $countline = count($line) - 1; // ゴミが入る為 -1 追加
  for($i = 0; $i < $countline; $i++) {
//  if(empty($line[$i])) { continue; }
    $line[$i] .= "\n";
    $j = explode(",", rtrim($line[$i]));
  }
  if($resto) {
    for($i = 0; $i < $countline; $i++) {
      $rtno = explode(",", rtrim($line[$i]));
      if($rtno[0] == $resto) {
        $find = TRUE;
        $line[$i] = rtrim($line[$i]).','.$no."\n";
        $j = explode(",", rtrim($line[$i]));
        if(count($j) > MAX_RES || ((EN_SAGE_START || MAX_PASSED_HOUR || ADMIN_SAGE) && $flgsage)) { $email .= 'sage'; }         //◆Yakuba改(管理者強制sageが出来ない不具合を修正)
        if(!stristr($email, 'sage')) {
          $newline = $line[$i];
          $line[$i] = '';
        }
        break;
  } } }
  if(!$find) {
    if(!$resto) { $newline = "$no\n"; }else{ error("スレッドがありません", $dest); }
  }
  $newline .= implode('', $line);
//  set_file_buffer($tp, 0);
//  ftruncate($tp, 0);
  rewind($tp);
  fputs($tp, $newline);
  ftruncate($tp, ftell($tp));
  flock($tp, LOCK_UN);
  fclose($tp);

  //クッキー保存
  setcookie ("pwdc", $c_pass,time()+7*24*3600);  /* 1週間で期限切れ */
  if(function_exists("mb_internal_encoding")&&function_exists("mb_convert_encoding")
      &&function_exists("mb_substr")){
    if(preg_match("#MSIE|Opera|Firefox|Safari#",$_SERVER["HTTP_USER_AGENT"])){  // ◆Yakuba改 火狐狩りに対応(自信なし)
      $i=0;$c_name='';
      mb_internal_encoding("UTF-8");
      while($j=mb_substr($names,$i,1)){
        $j = mb_convert_encoding($j, "UTF-16", "UTF-8");
        $c_name.="%u".bin2hex($j);
        $i++;
      }
      header("Set-Cookie: namec=$c_name; expires=".gmdate("D, d-M-Y H:i:s",time()+7*24*3600)." GMT",false);
    }else{
      $c_name=$names;
      setcookie ("namec", $c_name,time()+7*24*3600);  /* 1週間で期限切れ */
    }
  }

  if($dest&&file_exists($dest)){
    rename($dest,$path.$tim.$ext);
    // hiro 変更 2005.03.17
    if(USE_THUMB){
      if(SELECT_THUMB) { thumb_other($path,$tim,$ext); }
      else { thumb($path,$tim,$ext); }
    }
    // hiro 変更 ここまで
  }
  updatelog();

  // hiro 追加 2005.03.16
  if(!strcmp($bakres, 'on')) { $chgdisp = PHP_SELF."?res=".$resto; }
  else { $chgdisp = PHP_SELF2; }
  echo "<html><head>";
  echo "<META HTTP-EQUIV=\"Content-Type\" content=\"text/html; charset=utf-8\">";
  echo "<META HTTP-EQUIV=\"refresh\" content=\"1;URL=".$chgdisp."\">";
  echo "</head>";
  // hiro 追加 ここまで
  echo "<body>$mes 画面を切り替えます</body></html>";
}

// hiro 追加 2007/01/17
/* 最新のスレッド番号を取得する関数 */
function getLastThread() {
  $fp = fopen(TREEFILE, "r") or error("ERROR! load tree");
  flock($fp, LOCK_SH);
  $buf = fread($fp, 1000000);
  fclose($fp);

  if ($buf == '') { error("error tree loading"); }
  $line = explode("\n", $buf);

  $thrs = array();
  foreach ($line as $v) {
    list($a,) = explode(",", $v);
    array_push($thrs, $a);
  }
  rsort($thrs);

  return $thrs[0];
}
// hiro 追加 ここまで

//サムネイル作成
function thumb($path,$tim,$ext){
  if(!function_exists("ImageCreate")||!function_exists("ImageCreateFromJPEG"))return;
  $fname=$path.$tim.$ext;
  $thumb_dir = THUMB_DIR;     //サムネイル保存ディレクトリ
  $width     = MAX_W;         //出力画像幅
  $height    = MAX_H;         //出力画像高さ
  // 画像の幅と高さとタイプを取得
  $size = GetImageSize($fname);
  switch ($size[2]) {
    case 1 :
      if(function_exists("ImageCreateFromGIF")){
        $im_in = @ImageCreateFromGIF($fname);
        if($im_in){break;}
      }
      if(!function_exists("ImageCreateFromPNG"))return;
      if(stristr(PHP_OS,"WIN")){
        if(!file_exists(realpath("./gif2png.exe")))return;
        @exec(realpath("./gif2png.exe")." -z $fname",$a);}
      else{
        if(!is_executable(realpath("./gif2png")))return
        @exec(realpath("./gif2png")." $fname",$a);}
      if(!file_exists($path.$tim.'.png'))return;
      $im_in = @ImageCreateFromPNG($path.$tim.'.png');
      unlink($path.$tim.'.png');
      if(!$im_in)return;
      break;
    case 2 : $im_in = @ImageCreateFromJPEG($fname);
      if(!$im_in){return;}
       break;
    case 3 :
      if(!function_exists("ImageCreateFromPNG"))return;
      $im_in = @ImageCreateFromPNG($fname);
      if(!$im_in){return;}
      break;
    default : return;
  }
  // リサイズ
  if ($size[0] > $width || $size[1] >$height) {
    $key_w = $width / $size[0];
    $key_h = $height / $size[1];
    ($key_w < $key_h) ? $keys = $key_w : $keys = $key_h;
    $out_w = ceil($size[0] * $keys);
    $out_h = ceil($size[1] * $keys);
  } else {
    $out_w = $size[0];
    $out_h = $size[1];
  }
  // 出力画像（サムネイル）のイメージを作成   元画像を縦横とも コピー します。
  if(function_exists("ImageCreateTrueColor") && get_gd_ver() == "2") {
    $im_out = ImageCreateTrueColor($out_w, $out_h);
    ImageCopyResampled($im_out, $im_in, 0, 0, 0, 0, $out_w, $out_h, $size[0], $size[1]);
  } else {
    $im_out = ImageCreate($out_w, $out_h);
    ImageCopyResized($im_out, $im_in, 0, 0, 0, 0, $out_w, $out_h, $size[0], $size[1]);
  }
  // サムネイル画像を保存
  ImageJPEG($im_out, $thumb_dir.$tim.'s.jpg', QUALITY_THUMB);
  chmod($thumb_dir.$tim.'s.jpg',0666);
  // 作成したイメージを破棄
  ImageDestroy($im_in);
  ImageDestroy($im_out);
}

// hiro 追加 2005.03.17
/* サムネイル作成 */
function thumb_other($path,$tim,$ext) {

  $fname  = $path.$tim.$ext; //ファイル名
  $fthumb = THUMB_DIR.$tim.'s.jpg'; //サムネイル名
  $width  = MAX_W; //出力画像幅
  $height = MAX_H; //出力画像高さ

  // repng2jpegがあるかどうか判別
  if (stristr(PHP_OS,"WIN") && file_exists(realpath("./repng2jpeg.exe"))) {
    $png2jpeg_path = realpath("./repng2jpeg.exe");
  } elseif (is_executable(realpath("./repng2jpeg"))) {
    $png2jpeg_path = realpath("./repng2jpeg");
  } else {
    return;
  }

  // 画像の幅と高さとタイプを取得
  $size = GetImageSize($fname);
  // リサイズ
  if ($size[0] > $width || $size[1] >$height) {
    $key_w = $width / $size[0];
    $key_h = $height / $size[1];
    ($key_w < $key_h) ? $keys = $key_w : $keys = $key_h;
    $out_w = ceil($size[0] * $keys);
    $out_h = ceil($size[1] * $keys);
  } else {
    $out_w = $size[0];
    $out_h = $size[1];
  }
  // サムネイル画像を保存
  @exec($png2jpeg_path." $fname $fthumb $out_w $out_h ".QUALITY_THUMB);
  @chmod($fthumb, 0666);
  return;
}
// hiro 追加 ここまで

//gdのバージョンを調べる
function get_gd_ver(){
  if(function_exists("gd_info")){
    $gdver=gd_info();
    $phpinfo=$gdver["GD Version"];
  }else{ //php4.3.0未満用
    ob_start();
    phpinfo(8);
    $phpinfo=ob_get_contents();
    ob_end_clean();
    $phpinfo=strip_tags($phpinfo);
    $phpinfo=stristr($phpinfo,"gd version");
    $phpinfo=stristr($phpinfo,"version");
  }
  $end=strpos($phpinfo,".");
  $phpinfo=substr($phpinfo,0,$end);
  $length = strlen($phpinfo)-1;
  $phpinfo=substr($phpinfo,$length);
  return $phpinfo;
}
//ファイルmd5計算 php4.2.0未満用
function md5_of_file($inFile) {
 if (file_exists($inFile)){
  if(function_exists('md5_file')){
    return md5_file($inFile);
  }else{
    $fd = fopen($inFile, 'r');
    $fileContents = fread($fd, filesize($inFile));
    fclose ($fd);
    return md5($fileContents);
  }
 }else{
  return false;
}}
//ツリー削除
function treedel($delno){
  $fp=fopen(TREEFILE,"r+");
  set_file_buffer($fp, 0);
  flock($fp, LOCK_EX);
  rewind($fp);
  $buf=fread($fp,1000000);
  if($buf==''){error("error tree del");}
  $line = explode("\n",$buf);
  $countline=count($line)-1;
  if($countline>1){
    for($i = 0; $i < $countline; $i++){if($line[$i]!=""){$line[$i].="\n";};}
    for($i = 0; $i < $countline; $i++){
      $treeline = explode(",", rtrim($line[$i]));
      $counttreeline=count($treeline);
      for($j = 0; $j < $counttreeline; $j++){
        if($treeline[$j] == $delno){
          $treeline[$j]='';
          if($j==0){$line[$i]='';}
          else{$line[$i]=implode(',', $treeline);
            $line[$i]=preg_replace("#,,#",",",$line[$i]);
            $line[$i]=preg_replace("#,$#","",$line[$i]);
            $line[$i].="\n";
          }
          break 2;
    } } }
    ftruncate($fp,0);
    set_file_buffer($fp, 0);
    rewind($fp);
    fputs($fp, implode('', $line));
  }
  fclose($fp);
}
/* テキスト整形 */
function CleanStr($str){
  global $admin;
  $str = trim($str);//先頭と末尾の空白除去
  if($admin!=ADMIN_PASS){//管理者はタグ可能
    if(PHP_VERSION_ID >= 50400){$str = htmlspecialchars($str, ENT_COMPAT | ENT_HTML401, 'UTF-8');} else {$str = htmlspecialchars($str);}     //タグっ禁止 ◆Yakuba PHP5.4.0以降対応
    $str = str_replace("&amp;", "&", $str);//特殊文字
  }
  return str_replace(",", "&#44;", $str);//カンマを変換
}
/* ユーザー削除 */
function usrdel($no,$pwd){
  global $path,$pwdc,$onlyimgdel;
  $host = gethostbyaddr($_SERVER["REMOTE_ADDR"]);
  $delno = array("dummy");
  $delflag = FALSE;
  reset($_POST);

  foreach($_POST as $key=>$val){
	if($val==='delete'){
		array_push($delno,$key);
		$delflag=TRUE;
	}
  }

  if($pwd=="" && $pwdc!="") $pwd=$pwdc;
  $line = @file(LOGFILE);
  $countline=count($line);
  for($i = 0; $i < $countline; $i++){if($line[$i]!=""){$line[$i].="\n";};}
  $flag = FALSE;
  for($i = 0; $i<$countline; $i++){
    list($dno,,,,,,,$dhost,$pass,$dext,,,$dtim,) = explode(",", $line[$i]);
    if(array_search($dno,$delno) && (substr(md5($pwd),2,8) == $pass || $dhost == $host||ADMIN_PASS==$pwd)){
      $flag = TRUE;
      $line[$i] = "";                   //パスワードがマッチした行は空に
      $delfile = $path.$dtim.$dext;     //削除ファイル
      if(!$onlyimgdel){
        treedel($dno);
      }
      if(is_file($delfile)) unlink($delfile);//削除
      if(is_file(THUMB_DIR.$dtim.'s.jpg')) unlink(THUMB_DIR.$dtim.'s.jpg');//削除
      if(is_file(THUMB_DIR.$dtim.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$dtim.'s.jpg'.REPLACE_EXT);//削除
      // 参照先htmlファイルも削除対象に
      if(is_file(IMG_REF_DIR.$dtim.'.htm')) unlink(IMG_REF_DIR.$dtim.'.htm');
    }
  }
  if(!$flag) error("該当記事が見つからないかパスワードが間違っています");
}
/* パス認証 */
function valid($pass){
  global $default_thumb;
  if($pass && $pass != ADMIN_PASS) error("パスワードが違います");

  head($dat);
  echo $dat;
  echo "[<a href=\"".PHP_SELF2."\">掲示板に戻る</a>]\n";
  echo "[<a href=\"".PHP_SELF."\">ログを更新する</a>]\n";
  echo "<table width='100%'><tr><th bgcolor=#E08000>\n";
  echo "<font color=#FFFFFF>管理モード</font>\n";
  echo "</th></tr></table>\n";
  echo "<p><form action=\"".PHP_SELF."\" method=POST>\n";
  // ログインフォーム
  if(!$pass){
    echo "<center><table border=0><tr><td>";
    echo "<input type=radio name=admin value=del checked>記事削除<BR>";
    echo "<input type=radio name=admin value=post>管理人投稿<BR>";
    if (is_file($default_thumb)) echo "<input type=radio name=admin value=thumb>サムネイル差し替え<BR>";
    if (ADMIN_SAGE) echo "<input type=radio name=admin value=sage>強制sage処理<br>";
    // hage 追加 2004.8.1
    echo "<input type=radio name=admin value=reghost>ホスト/ID表示リストに登録<br>";
    echo "<input type=radio name=admin value=delhost>ホスト/ID表示リストから削除<br>";
    echo "<input type=radio name=admin value=stop>スレスト処理<br>";
    // hage 追加ここまで
    echo "<input type=hidden name=mode value=admin>\n";
    echo "</td></tr></TABLE>";
    echo "<input type=password name=pass size=8>";
    echo "<input type=submit value=\" 認証 \"></form></center>\n";
    die("</body></html>");
  }
}
/* 管理者削除 */
function admindel($pass){
  global $path,$onlyimgdel;
  $all=0; $msg="";
  $delno = array("dummy");
  $delflag = FALSE;
  reset($_POST);
  foreach($_POST as $key=>$val){
	if($val==='delete'){
		array_push($delno,$key);
		$delflag=true;
	}
  }

  if($delflag){
    // hage 追加 2004.8.1
    ignore_user_abort(1);
    // hage 追加ここまで
    $fp = fopen(LOGFILE, "r+") or error("ERROR! load log");
    set_file_buffer($fp, 0);
    flock($fp, LOCK_EX);
    rewind($fp);
    $buf = fread($fp, 1000000);
    if($buf == '') { error("error admin del"); }
    $line = explode("\n", $buf);
    $countline = count($line) - 1; // ゴミが入る為 -1 追加

    for($i = 0; $i < $countline; $i++) {
//      if(empty($line[$i])) { continue; }
      $line[$i] .= "\n";
    }
    $find = FALSE;
    for($i = 0; $i < $countline; $i++){
      list($no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk) = explode(",",$line[$i]);
      if($onlyimgdel=="on"){
        if(array_search($no,$delno)){//画像だけ削除
          $delfile = $path.$tim.$ext;   //削除ファイル
          if(is_file($delfile)) unlink($delfile);//削除
          if(is_file(THUMB_DIR.$tim.'s.jpg')) unlink(THUMB_DIR.$tim.'s.jpg');//削除
          if(is_file(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT);//削除
          // 参照先htmlファイルも削除対象に
          if(is_file(IMG_REF_DIR.$tim.'.htm')) unlink(IMG_REF_DIR.$tim.'.htm');
        }
      }else{
        if(array_search($no,$delno)){//削除の時は空に
          $find = TRUE;
          $line[$i] = "";
          $delfile = $path.$tim.$ext;   //削除ファイル
          if(is_file($delfile)) unlink($delfile);//削除
          if(is_file(THUMB_DIR.$tim.'s.jpg')) unlink(THUMB_DIR.$tim.'s.jpg');//削除
          if(is_file(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT)) unlink(THUMB_DIR.$tim.'s.jpg'.REPLACE_EXT);//削除
          // 参照先htmlファイルも削除対象に
          if(is_file(IMG_REF_DIR.$tim.'.htm')) unlink(IMG_REF_DIR.$tim.'.htm');
          treedel($no);
        }
      }
    }
    if($find){//ログ更新
      ftruncate($fp,0);
      set_file_buffer($fp, 0);
      rewind($fp);
      fputs($fp, implode('', $line));
    }
    fclose($fp);
    // hage 追加 2004.8.1
    ignore_user_abort(0);
    // hage 追加ここまで
  }
  // 削除画面を表示
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=del>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>削除したい記事のチェックボックスにチェックを入れ、削除ボタンを押して下さい。\n";
  echo "<p><input type=submit value=\"削除する\">";
  echo "<input type=reset value=\"リセット\">";
  echo "[<input type=checkbox name=onlyimgdel value=on checked>画像だけ消す]";
  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>削除</th><th>記事No</th><th>投稿日</th><th>題名</th>";
  echo "<th>投稿者</th><th>コメント</th><th>ホスト名</th><th>添付<br>(Bytes)</th><th>md5</th>";
  echo "</tr>\n";
  $line = file(LOGFILE);

  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    // フォーマット
    $now=preg_replace('#.{2}/(.*)$#','\1',$now);
    $now=preg_replace('#\(.*\)#',' ',$now);
    if(strlen($name) > 10) $name = substr($name,0,9).".";
    if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
    if($email) $name="<a href=\"mailto:$email\">$name</a>";
    $com = str_replace("<br>"," ",$com);
    if(PHP_VERSION_ID >= 50400){$com = htmlspecialchars($com, ENT_COMPAT | ENT_HTML401, 'UTF-8');} else {$com = htmlspecialchars($com);}     // ◆Yakuba PHP5.4.0以降対応
    if(strlen($com) > 20) $com = substr($com,0,18) . ".";
    // 画像があるときはリンク
    if($ext && is_file($path.$time.$ext)){
      $img_flag = TRUE;
      $clip = "<a href=\"".IMG_DIR.$time.$ext."\" target=_blank>".$time.$ext."</a><br>";
      $size = filesize($path.$time.$ext);
      $all += $size;                    //合計計算
      $chk= substr($chk,0,10);
    }else{
      $clip = "";
      $size = 0;
      $chk= "";
    }
    $bg = ($j % 2) ? "d6d6f6" : "f6f6f6";//背景色

    echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$no\" value=delete></th>";
    echo "<th>$no</th><td><small>$now</small></td><td>$sub</td>";
    echo "<td><b>$name</b></td><td><small>$com</small></td>";
    echo "<td>$host</td><td align=center>$clip($size)</td><td>$chk</td>\n";
    echo "</tr>\n";
  }

  echo "</table><p><input type=submit value=\"削除する$msg\">";
  echo "<input type=reset value=\"リセット\"></form>";

  $all = (int)($all / 1024);
  echo "【 画像データ合計 : <b>$all</b> KB 】";
  die("</center></body></html>");
}

/* 管理者サムネ差し替え */
// ほとんど管理者削除と一緒・・・統合したいけど・・・
function admin_chgthumb($pass){
  global $path,$stillGIF;
  global $rep_thumb,$default_thumb;
  $thum_name = $default_thumb;
  foreach($rep_thumb as $chkthumb){
    if (!is_file($chkthumb)){error("代替サムネイルファイル".$chkthumb."が見つかりません");}
  }

  $chgno = array('dummy');
  $chgflag = FALSE;
  reset($_POST);

  foreach($_POST as $key=>$val){
	if($val==='chgthumb'){
		array_push($chgno,$key);
		$chgflag=TRUE;
	}
   // 差し替えサムネファイル名取得
   if($key=='thumb'){$thumb_name=$val;}

}

  if($chgflag){
    // hage 追加 2004.8.1
    ignore_user_abort(1);
    // hage 追加ここまで
    $fp = fopen(LOGFILE, "r+") or error("ERROR! load log");
    set_file_buffer($fp, 0);
    flock($fp, LOCK_EX);
    rewind($fp);
    $buf = fread($fp, 1000000);
    if($buf == '') { error("error admin change thumbnail"); }
    $line = explode("\n", $buf);
    $countline = count($line) - 1; // ゴミが入る為 -1 追加

    for($i = 0; $i < $countline; $i++) {
//      if(empty($line[$i])) { continue; }
      $line[$i] .= "\n";
    }
    $find = FALSE;
    for($i = 0; $i < $countline; $i++){
      list($no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk) = explode(",",$line[$i]);
      if(array_search($no,$chgno)){
        $find = TRUE;
        // サムネイル差し替え
        $tpath = THUMB_DIR.$tim.'s.jpg';
        $tpathorg = $tpath.REPLACE_EXT;
        if (!is_file($tpathorg)){
          if(!is_file($tpath) && is_file($path.$tim.$ext)) { if(SELECT_THUMB){ thumb_other($path,$tim,$ext); }else{ thumb($path,$tim,$ext); }} // サムネがなかったら新規作成
          // サムネ名変更&差し替え仕様変更
          if( is_file($thumb_name) && is_file($tpath)){
            if ((!USE_GIF_THUMB && $ext=='.gif' && $stillGIF=='on')) {copy($tpath,$tpathorg);}
            else {copy($thumb_name,$tpathorg);}
            // サムネサイズを差し替える画像のサイズにする
            $tsize = GetImageSize($tpathorg);
            $w = $tsize[0];
            $h = $tsize[1];
          }
        }
        else{
          unlink($tpathorg);
          $tsize = GetImageSize($tpath);
          $w = $tsize[0];
          $h = $tsize[1];
        }
        $line[$i] = "$no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk,\n";
      }
    }
    if($find) { // ログ更新
      $renewline = implode('', $line);
//      set_file_buffer($fp, 0);
//      ftruncate($fp, 0);
      rewind($fp);
      fputs($fp, $renewline);
      ftruncate($fp, ftell($fp));
    }
    flock($fp, LOCK_UN);
    fclose($fp);
    updatelog();
    // hage 追加 2004.8.1
    ignore_user_abort(0);
    // hage 追加ここまで
  }

  // 差し替え記事選択画面を表示
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=thumb>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>サムネイルを差し替えたい記事のチェックボックスにチェックを入れ、差し替えボタンを押して下さい。\n";
  echo "<center>「差替」と「差替解除」が切り替わります。\n";
  echo "<p><input type=submit value=\"差し替え\">";
  echo "<input type=reset value=\"リセット\">";
  if(!USE_GIF_THUMB){echo "[<input type=checkbox name=stillGIF value=on>GIFをサムネイル化するだけ]";}

  echo "<center><BR>";
  $i=0;
  foreach ($rep_thumb as $rtitl => $rname){
    echo "<input type=radio name=thumb value=$rname ";
    if (!$i++) echo "checked";
    echo ">$rtitl";
  }

  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>選択</th><th>記事No</th><th>状態</th><th>投稿日</th><th>題名</th>";
  echo "<th>投稿者</th><th>コメント</th><th>ホスト名</th><th>添付<br>(Bytes)</th>";
  echo "</tr>\n";

  // ログファイル読み出し
  $line = file(LOGFILE);
  $bgcol = 0; $all = 0;
  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    if($ext && is_file($path.$time.$ext)){
      // フォーマット
      $now=preg_replace('#.{2}/(.*)$#','\1',$now);
      $now=preg_replace('#\(.*\)#',' ',$now);
      if(strlen($name) > 10) $name = substr($name,0,9).".";
      if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
      if($email) $name="<a href=\"mailto:$email\">$name</a>";
      $com = str_replace("<br>"," ",$com);
      if(PHP_VERSION_ID >= 50400){$com = htmlspecialchars($com, ENT_COMPAT | ENT_HTML401, 'UTF-8');} else {$com = htmlspecialchars($com);}     // ◆Yakuba PHP5.4.0以降対応
      if(strlen($com) > 20) $com = substr($com,0,18) . ".";
      $img_flag = TRUE;
      $clip = "<a href=\"".IMG_DIR.$time.$ext."\" target=_blank>".$time.$ext."</a><br>";
      $size = filesize($path.$time.$ext);
      $all += $size;                       //合計計算
      $chk= substr($chk,0,10);
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//背景色

      if (is_file(THUMB_DIR.$time.'s.jpg'.REPLACE_EXT)) {$tstat = "差替";}
      else{
        $tstat = (stristr($url,'noanime')) ? "スレ主" : "　";
      }
      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$no\" value=chgthumb></th>";
      echo "<th>$no</th><th>$tstat</th><td><small>$now</small></td><td>$sub</td>";
      echo "<td><b>$name</b></td><td><small>$com</small></td>";
      echo "<td>$host</td><td align=center>$clip($size)</td>\n";
      echo "</tr>\n";
    }
  }
  echo "</table><p><input type=submit value=\"差し替え\">";
  echo "<input type=reset value=\"リセット\"></form>";

  $all = (int)($all / 1024);
  echo "【 画像データ合計 : <b>$all</b> KB 】";
  die("</center></body></html>");
}

/* 管理者sage処理 */
// ここも、ほとんど管理者削除と(ry
function admin_sage($pass){
  global $path;

  $chgno = array('dummy');
  $chgflag = FALSE;
  reset($_POST);
  foreach($_POST as $key=>$val){
	if($val==='sage'){
		array_push($chgno,$key);
		$chgflag = TRUE;
	}
  }

  if($chgflag) {
    // hage 追加 2004.8.1
    ignore_user_abort(1);
    // hage 追加ここまで
    $fp = fopen(LOGFILE, "r+") or error("ERROR! load log");
    set_file_buffer($fp, 0);
    flock($fp, LOCK_EX);
    rewind($fp);
    $buf = fread($fp, 1000000);
    if($buf == '') { error("error admin sage"); }
    $line = explode("\n", $buf);
    $countline = count($line) - 1; // ゴミが入る為 -1 追加

    for($i = 0; $i < $countline; $i++) {
//      if(empty($line[$i])) { continue; }
      $line[$i] .= "\n";
    }
    $find = FALSE;
    for($i = 0; $i < $countline; $i++) {
      list($no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk) = explode(",",$line[$i]);
      if(array_search($no,$chgno)) {
        $find = TRUE;
        // URI枠に'sage'文字切り替え
        if(stristr($url, 'sage')) { $url = str_replace('sage', '', $url); }
        else { $url .= 'sage'; }
        $line[$i] = "$no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk,\n";
      }
    }
    if($find) { // ログ更新
      $renewline = implode('', $line);
//      set_file_buffer($fp, 0);
//      ftruncate($fp, 0);
      rewind($fp);
      fputs($fp, $renewline);
      ftruncate($fp, ftell($fp));
    }
    flock($fp, LOCK_UN);
    fclose($fp);
    updatelog();
    // hage 追加 2004.8.1
    ignore_user_abort(0);
    // hage 追加ここまで
  }

  // sage記事選択画面を表示
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=sage>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>sage状態を変更したい記事のチェックボックスにチェックを入れ、変更ボタンを押して下さい。\n";
  echo "<center>「sage」と「sage解除」が切り替わります。\n";
  echo "<center>「sageスタート」や「レス数sage」による「sage」は解除できません。\n";
  echo "<p><input type=submit value=\"変更\">";
  echo "<input type=reset value=\"リセット\">";
  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>選択</th><th>記事No</th><th>状態</th><th>投稿日</th><th>題名</th>";
  echo "<th>投稿者</th><th>コメント</th><th>ホスト名</th><th>添付<br>(Bytes)</th>";
  echo "</tr>\n";

  //ツリーファイルからスレ元の記事No.を取得
  $ttree = file(TREEFILE);
  $tno = array('dummy');
  $tfind = false;
  $tcounttree=count($ttree);
  for($i = 0;$i<$tcounttree;$i++){
    list($tartno,)=explode(",",rtrim($ttree[$i]));
    array_push($tno,$tartno);
  }

  //ログファイル読み出し
  $line = file(LOGFILE);
  $bgcol = 0; $all = 0;
  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    if(array_search($no,$tno)){
      // フォーマット
      $now=preg_replace('#.{2}/(.*)$#','\1',$now);
      $now=preg_replace('#\(.*\)#',' ',$now);
      if(strlen($name) > 10) $name = substr($name,0,9).".";
      if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
      if($email) $name="<a href=\"mailto:$email\">$name</a>";
      $com = str_replace("<br>"," ",$com);
      if(PHP_VERSION_ID >= 50400){$com = htmlspecialchars($com, ENT_COMPAT | ENT_HTML401, 'UTF-8');} else {$com = htmlspecialchars($com);}     // ◆Yakuba PHP5.4.0以降対応
      if(strlen($com) > 20) $com = substr($com,0,18) . ".";
      $url = (stristr($url,'sage')) ? 'sage' : '　';
      // 画像があるときはリンク
      if($ext && is_file($path.$time.$ext)){
        $img_flag = TRUE;
        $clip = "<a href=\"".IMG_DIR.$time.$ext."\" target=_blank>".$time.$ext."</a><br>";
        $size = filesize($path.$time.$ext);
        $all += $size;                    //合計計算
        $chk= substr($chk,0,10);
      }else{
        $clip = "";
        $size = 0;
        $chk= "";
      }
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//背景色

      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$no\" value=sage></th>";
      echo "<th>$no</th><th>$url</th><td><small>$now</small></td><td>$sub</td>";
      echo "<td><b>$name</b></td><td><small>$com</small></td>";
      echo "<td>$host</td><td align=center>$clip($size)</td>\n";
      echo "</tr>\n";
    }
  }
  echo "</table><p><input type=submit value=\"変更\">";
  echo "<input type=reset value=\"リセット\"></form>";

  $all = (int)($all / 1024);
  echo "【 画像データ合計 : <b>$all</b> KB 】";
  die("</center></body></html>");
}

// hage 追加 2004.8.1

/* 管理者赤字ホスト登録 */
function regist_host($pass){
  global $path;

  // IP表示オプションのチェック
  $ipflag = (isset($_POST['ipdisp']) && $_POST['ipdisp'] == 'on') ? TRUE : FALSE ;

  // 晒しホストリストファイルの取得
  $hostdat = array('dummy');
  if(is_file(HOSTFILE)){
    $hostdat = file(HOSTFILE);
    $counthost = count($hostdat);
    for($i=0;$i<$counthost;++$i){ $hostdat[$i] = trim($hostdat[$i],"\n"); }
  }
  // 晒しIDリストファイルの取得
  $idhostdat = array('dummy');
  if(is_file(IDHOSTFILE)){
    $idhostdat = file(IDHOSTFILE);
    $counthost = count($idhostdat);
    for($i=0;$i<$counthost;++$i){ $idhostdat[$i] = trim($idhostdat[$i],"\n"); }
  }
  // チェックの付いた記事番号の取得
  $chgno = array('dummy');
  $chgflag = FALSE;
  reset($_POST);

  foreach($_POST as $key=>$val){
	if($val==='regist'){
		array_push($chgno,$key);
		$chgflag=TRUE;
	}
  }

  // チェックの付いた項目があれば、更新
  $setflag = FALSE;
  $idsetflag = FALSE;
  if($chgflag){
    $logdat = file(LOGFILE);
    foreach($logdat as $line){
      list($no,,,,,,,$host,,,,,,) = explode(",",$line);
      if(in_array($no,$chgno) && $host){
        if($ipflag){
          if(!in_array($host,$hostdat)){
            $setflag = TRUE;
            array_push($hostdat,$host);
          }
        }else{
          if(!in_array($host,$idhostdat)){
            $idsetflag = TRUE;
            array_push($idhostdat,$host);
          }
        }
      }
    }

    if($setflag){
      $fp=fopen(HOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, LOCK_EX);
      fputs($fp, implode("\n", $hostdat));
      fclose($fp);
    }
    if($idsetflag){
      $fp=fopen(IDHOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, LOCK_EX);
      fputs($fp, implode("\n", $idhostdat));
      fclose($fp);
    }
    if($setflag || $idsetflag){ updatelog(); }
  }

  // 処理記事選択画面を表示
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=reghost>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>対象ホストの記事チェックボックスにチェックを入れ、変更ボタンを押して下さい。<br>\n";
  echo "表示ホストのリストに登録されます。<br>\n";
  echo "[ホスト名を表示させる]にチェックするとホスト名を、しないとIDを表示します。<br>\n";
  echo "<p><input type=submit value=\"変更\">";
  echo "<input type=reset value=\"リセット\">";
  echo "<p>[<input type=checkbox name=ipdisp value=on>ホスト名を表示させる]";
  echo "<P><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>選択</th><th>記事No</th><th>状態</th><th>投稿日</th><th>題名</th>";
  echo "<th>投稿者</th><th>コメント</th><th>ホスト名</th>";
  echo "</tr>\n";

  //ログファイル読み出し
  $line = file(LOGFILE);
  $bgcol = 0;
  for($j = 0; $j < count($line); $j++){
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);
    // フォーマット
    $now=preg_replace('#.{2}/(.*)$#','\1',$now);
    $now=preg_replace('#\(.*\)#',' ',$now);
    if(strlen($name) > 10) $name = substr($name,0,9).".";
    if(strlen($sub) > 10) $sub = substr($sub,0,9).".";
    if($email) $name="<a href=\"mailto:$email\">$name</a>";
    $com = str_replace("<br>"," ",$com);
    if(PHP_VERSION_ID >= 50400){$com = htmlspecialchars($com, ENT_COMPAT | ENT_HTML401, 'UTF-8');} else {$com = htmlspecialchars($com);}     // ◆Yakuba PHP5.4.0以降対応
    if(strlen($com) > 20) $com = substr($com,0,18) . ".";
    $url = '　　　';
    if(in_array($host,$idhostdat)){ $url = 'ID'; }
    if(in_array($host,$hostdat)){ $url = 'ホスト'; }

    $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//背景色

    echo "<tr bgcolor=\"$bg\"><th><input type=\"checkbox\" name=\"$no\" value=\"regist\"></th>";
    echo "<th>$no</th><th>$url</th><td><small>$now</small></td><td>$sub</td>";
    echo "<td><b>$name</b></td><td><small>$com</small></td><td>$host</td>\n";
    echo "</tr>\n";
  }
  echo "</table><p><input type=submit value=\"変更\">";
  echo "<input type=reset value=\"リセット\"></form>";
  die("</center></body></html>");
}

/* 管理者赤字ホスト削除 */
function delete_host($pass){
  global $path;

  // 晒しホストリストファイルの取得
  $hostdat = array('dummy');
  if(is_file(HOSTFILE)){
    $hostdat = file(HOSTFILE);
    $counthost = count($hostdat);
    for($i=0;$i<$counthost;++$i){ $hostdat[$i] = trim($hostdat[$i],"\n"); }
    $temp = array_shift($hostdat);
  }

  // 晒しIDリストファイルの取得
  $idhostdat = array('dummy');
  if(is_file(IDHOSTFILE)){
    $idhostdat = file(IDHOSTFILE);
    $counthost = count($idhostdat);
    for($i=0;$i<$counthost;++$i){ $idhostdat[$i] = trim($idhostdat[$i],"\n"); }
    $temp = array_shift($idhostdat);
  }

  // チェックの付いた記事番号の取得
  $chgno = array('dummy');
  $chgflag = FALSE;
  $idchgno = array('dummy');
  $idchgflag = FALSE;
  reset($_POST);
	foreach($_POST as $key=>$val){
		if($val==='delete'){
			{array_push($chgno,$key);
				$chgflag=TRUE;}
		}
		if($val==='id_delete'){
			array_push($idchgno,$key);
			$idchgflag=TRUE;
		}
	}
	

  $setflag = FALSE;
  $newdat = array('dummy');
  if($chgflag){
    foreach($hostdat as $line){
      $temp = str_replace('.','_',$line);	// phpではPOST引数の"."を"_"に変換するので・・・
      if(in_array($temp,$chgno)){
        $setflag = TRUE;
      }elseif($line != 'dummy'){
        array_push($newdat,$line);
      }
    }
    if($setflag){
      $hostdat = $newdat;
      $fp=fopen(HOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, LOCK_EX);
      fputs($fp, implode("\n", $hostdat));
      fclose($fp);
    }
  }
  $idsetflag = FALSE;
  $idnewdat = array('dummy');
  if($idchgflag){
    foreach($idhostdat as $line){
      $temp = str_replace('.','_',$line);	// phpではPOST引数の"."を"_"に変換するので・・・
      if(in_array($temp,$idchgno)){
        $idsetflag = TRUE;
      }elseif($line != 'dummy'){
        array_push($idnewdat,$line);
      }
    }
    if($idsetflag){
      $idhostdat = $idnewdat;
      $fp=fopen(IDHOSTFILE,"w");
      set_file_buffer($fp, 0);
      flock($fp, LOCK_EX);
      fputs($fp, implode("\n", $idhostdat));
      fclose($fp);
    }
  }
  if($setflag || $idsetflag){ updatelog(); }

  // 処理記事選択画面を表示
  echo "<input type=hidden name=mode value=admin>\n";
  echo "<input type=hidden name=admin value=delhost>\n";
  echo "<input type=hidden name=pass value=\"$pass\">\n";
  echo "<center><P>リストから削除したいホストのチェックボックスにチェックを入れ、変更ボタンを押して下さい。<br>\n";
  echo "表示ホストのリストから削除されます。\n";
  echo "<p><input type=submit value=\"削除\">";
  echo "<input type=reset value=\"リセット\">";
  echo "<P>ホスト表示リスト<br><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>選択</th><th>ホスト名</th></tr>\n";

  $bgcol = 0;
  foreach($hostdat as $line){
    if($line != 'dummy'){
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//背景色
      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$line\" value=delete></th>";
      echo "<td>$line</td></tr>\n";
    }
  }
  echo "</table>";
  echo "<P>ID表示リスト<br><table border=1 cellspacing=0>\n";
  echo "<tr bgcolor=6080f6><th>選択</th><th>ホスト名</th></tr>\n";

  $bgcol = 0;
  foreach($idhostdat as $line){
    if($line != 'dummy'){
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6";//背景色
      echo "<tr bgcolor=$bg><th><input type=checkbox name=\"$line\" value=id_delete></th>";
      echo "<td>$line</td></tr>\n";
    }
  }
  echo "</table>";
  echo "<p><input type=submit value=\"削除\">";
  echo "<input type=reset value=\"リセット\"></form>";
  die("</center></body></html>");
}

// hage 追加ここまで

// hiro 追加 2005.03.24
// ほとんど管理者sage処理と一緒…
/* 管理者スレスト処理 */
function admin_threadstop($pass){
  global $path;

  // チェックの付いた記事番号の取得
  $chgno = array('dummy');
  $chgflag = FALSE;
  reset($_POST);
  foreach($_POST as $key=>$val){
	if(!strcmp($val, 'chgmod')){
		array_push($chgno, $key); $chgflag = TRUE;
	}
  }

  // チェックの付いた項目があれば、更新
  if($chgflag) {
    copy(LOGFILE, LOGFILE.'.bak'); // コピー
// hage 追加 2004.7.27
    ignore_user_abort(1);
// hage 追加ここまで
    $fp = fopen(LOGFILE, "r+") or error("ERROR! load log");
    set_file_buffer($fp, 0);
    flock($fp, LOCK_EX);
    rewind($fp);
    $buf = fread($fp, 1000000);
    if($buf == '') { error("error admin thread stop..."); }
    $line = explode("\n", $buf);
    $countline = count($line) - 1; // ゴミが入る為 -1 追加

    for($i = 0; $i < $countline; $i++) {
//      if(empty($line[$i])) { continue; }
      $line[$i] .= "\n";
    }
    $find = FALSE;
    for($i = 0; $i < $countline; $i++) {
      list($no,$now,$name,$email,$sub,$com,$url,
           $host,$pw,$ext,$w,$h,$tim,$chk) = explode(",",$line[$i]);
      if(array_search($no, $chgno)) {
        $find = TRUE;
        // URI枠に'_tstop_'文字切り替え
        if(stristr($url, '_tstop_')) { $url = str_replace('_tstop_', '', $url); }
        else { $url .= '_tstop_'; }
        $line[$i] = "$no,$now,$name,$email,$sub,$com,$url,$host,$pw,$ext,$w,$h,$tim,$chk,\n";
      }
    }
    if($find) { // ログ更新
      $renewline = implode('', $line);
//      set_file_buffer($fp, 0);
//      ftruncate($fp, 0);
      rewind($fp);
      fputs($fp, $renewline);
      ftruncate($fp, ftell($fp));
    }
    flock($fp, LOCK_UN);
    fclose($fp);
// hage 追加 2004.7.27
    ignore_user_abort(0);
// hage 追加ここまで
    updatelog();
  }

  // 記事選択画面を表示
  echo <<<__EOD__
<input type="hidden" name="mode" value="admin">
<input type="hidden" name="admin" value="stop">
<input type="hidden" name="pass" value="$pass">
<center>
スレスト状態を変更したい記事のチェックボックスにチェックを入れ、変更ボタンを押して下さい。<br>
「スレスト」と「スレスト解除」が切り替わります。<br>
<p><input type="submit" value="変更"> <input type="reset" value="リセット"></p>\n
__EOD__;

  echo "<table border=1 cellspacing=0>\n",
       "<tr bgcolor=\"6080f6\"><th>選択</th><th>記事No</th><th>状態</th><th>投稿日</th><th>題名</th>",
       "<th>投稿者</th><th>コメント</th><th>ホスト名</th><th>添付<br>(Bytes)</th></tr>\n";

  // ツリーファイルからスレ元の記事No.を取得
  $ttree = file(TREEFILE);
  $tno = array('dummy');
  $tcounttree = count($ttree);
  for($i = 0; $i < $tcounttree; $i++) {
    list($tartno,) = explode(",",rtrim($ttree[$i]));
    array_push($tno, $tartno);
  }

  // ログファイル読み出し
  $line = @file(LOGFILE);
  $countline = count($line);
  $bgcol = 0; $all = 0;
  for($j = 0; $j < $countline; $j++) {
    $img_flag = FALSE;
    list($no,$now,$name,$email,$sub,$com,$url,
         $host,$pw,$ext,$w,$h,$time,$chk) = explode(",",$line[$j]);

    if(array_search($no, $tno)) {
      // フォーマット
      $now = preg_replace('#.{2}/(.*)$#', '\1', $now);
      $now = preg_replace('#\(.*\)#', ' ', $now);
      if(strlen($name) > 10) $name = substr($name, 0, 9).".";
      if(strlen($sub) > 10)  $sub  = substr($sub, 0, 9).".";
      if($email) $name = "<a href=\"mailto:".$email."\">".$name."</a>";
      $com = str_replace("<br>", " ", $com);
      if(PHP_VERSION_ID >= 50400){$com = htmlspecialchars($com, ENT_COMPAT | ENT_HTML401, 'UTF-8');} else {$com = htmlspecialchars($com);}     // ◆Yakuba PHP5.4.0以降対応
      if(strlen($com) > 20) $com = substr($com, 0, 18).".";

      $url = (stristr($url, '_tstop_')) ? 'スレスト' : '　';
      // 画像があるときはリンク
      if($ext && is_file($path.$time.$ext)) {
        $img_flag = TRUE;
        $clip = "<a href=\"".IMG_DIR.$time.$ext."\" target=\"_blank\">".$time.$ext."</a><br>";
        $size = filesize($path.$time.$ext);
      } else {
        $clip = "";
        $size = 0;
      }
      $bg = ($bgcol++ % 2) ? "d6d6f6" : "f6f6f6"; // 背景色

      echo "<tr bgcolor=\"",$bg,"\">\n",
           "<th><input type=\"checkbox\" name=\"",$no,"\" value=\"chgmod\"></th>",
           "<th>",$no,"</th><th>",$url,"</th><td><small>",$now,"</small></td>",
           "<td>",$sub,"</td><td><b>",$name,"</b></td><td><small>",$com,"</small></td>",
           "<td>",$host,"</td><td align=\"center\">",$clip,"(",$size,")</td>\n</tr>\n";
    }
  }
  $all = (int)($all / 1024);

  echo <<<__EOD__
</table>
<p><input type="submit" value="変更"> <input type="reset" value="リセット"></form>
</center>
</body></html>
__EOD__;
  die();
}
// hiro 追加 ここまで

function init(){
  $err="";
  // hage 追加 2004.8.1
  // $chkfile=array(LOGFILE,TREEFILE);
  $chkfile=array(LOGFILE,TREEFILE,HOSTFILE,IDHOSTFILE);
  // hage 追加ここまで
  if(!is_writable(realpath("./")))error("カレントディレクトリに書けません<br>");
  foreach($chkfile as $value){
    if(!file_exists(realpath($value))){
      $fp = fopen($value, "w");
      set_file_buffer($fp, 0);
      if($value==LOGFILE)fputs($fp,"1,2002/01/01(月) 00:00,名無し,,無題,本文なし,,,,,,,,,\n");
      if($value==TREEFILE)fputs($fp,"1\n");
      // hage 追加 2004.8.1
      if($value==HOSTFILE || $value==IDHOSTFILE)fputs($fp,"dummy");
      // hage 追加ここまで
      fclose($fp);
      if(file_exists(realpath($value)))@chmod($value,0666);
    }
    if(!is_writable(realpath($value)))$err.=$value."を書けません<br>";
    if(!is_readable(realpath($value)))$err.=$value."を読めません<br>";
  }
  @mkdir(IMG_DIR,0777);@chmod(IMG_DIR,0777);
  if(!is_dir(realpath(IMG_DIR)))$err.=IMG_DIR."がありません<br>";
  if(!is_writable(realpath(IMG_DIR)))$err.=IMG_DIR."を書けません<br>";
  if(!is_readable(realpath(IMG_DIR)))$err.=IMG_DIR."を読めません<br>";
  if(USE_THUMB){
    @mkdir(THUMB_DIR,0777);@chmod(THUMB_DIR,0777);
    if(!is_dir(realpath(THUMB_DIR)))$err.=THUMB_DIR."がありません<br>";
    if(!is_writable(realpath(THUMB_DIR)))$err.=THUMB_DIR."を書けません<br>";
    if(!is_readable(realpath(THUMB_DIR)))$err.=THUMB_DIR."を読めません<br>";
  }
  @mkdir(IMG_REF_DIR,0777);@chmod(IMG_REF_DIR,0777);
  if(!is_dir(realpath(IMG_REF_DIR)))$err.=IMG_REF_DIR."がありません<br>";
  if(!is_writable(realpath(IMG_REF_DIR)))$err.=IMG_REF_DIR."を書けません<br>";
  if(!is_readable(realpath(IMG_REF_DIR)))$err.=IMG_REF_DIR."を読めません<br>";
  if($err)error($err);
}
/*-----------Main-------------*/
$buf='';
$iniv=array('mode','name','email','sub','com','pwd','upfile','upfile_name','resto','pass','res','post','no');
foreach($iniv as $iniva){
  if(!isset($$iniva)){$$iniva="";}
}

// ▼Yakuba追加(しおあき様提供。これで無限更新の問題を回避します。ありがとうございました！)
// '/'があれば問答無用で空白にしてみる
$reqcheck = substr($_SERVER['REQUEST_URI'], strlen($_SERVER['SCRIPT_NAME']));
if (FALSE !== strpos($reqcheck, '/')) {
die('');
}
// ▲Yakuba追加

switch($mode){
  case 'regist':
    regist($name,$email,$sub,$com,'',$pwd,$upfile,$upfile_name,$resto);
    break;
  case 'admin':
    valid($pass);
    if($admin=="del") admindel($pass);
    if($admin=="post"){
      echo "</form>";
      form($post,$res,TRUE,FALSE);
      echo $post;
      die("</body></html>");
    }
    if(is_file($default_thumb) && $admin=="thumb") admin_chgthumb($pass);
    if(ADMIN_SAGE && $admin=="sage") admin_sage($pass);
	// hage 追加 2004.8.1
    if($admin == "reghost") regist_host($pass);
    if($admin == "delhost") delete_host($pass);
	// hage 追加ここまで
// hiro 追加 2005.03.24
    if(!strcmp($admin, "stop")) admin_threadstop($pass);
// hiro 追加 ここまで
    break;
  case 'usrdel':
    usrdel($no,$pwd);
  default:
    if($res){
      updatelog($res);
    }else{
      updatelog();
      echo "<META HTTP-EQUIV=\"refresh\" content=\"0;URL=".PHP_SELF2."\">";
    }
}
?>
