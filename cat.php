<?php
/* -------------------------------------------------------------------------
 Catalog Mode
futaba.php & gazou.php & thumbnail.php
----------------------------------------------------------------------------
このスクリプトはレッツPHP!<http://php.s3.to/>のgazou.phpを改造したものを
更に改造したふたば★ちゃんねる<http://www.2chan.net/script/>のfutaba.phpの
表現部分を抜き取り取って付けたfutaba.php専用のカタログです。

設置法：（オリジナルのfutaba.phpが稼働している事を前提として説明します）
1) thumbsディレクトリを作り、パーミッションを777(707)にします
2) 後はcat.phpファイルをftp転送し、cat.phpにアクセスするだけです。

  public_html (ホームディレクトリ)
      |
      +-- futaba [777(707)] スクリプトフォルダ
             |  futaba.php [644(604)] 本体スクリプト
             |  cat.php    [644(604)] Catalog Mode <<**
             |  repng2jpeg [755(705)] 必要の場合のみ導入 <<**
             |
             +-- src       [777(707)] 元画像用フォルダ
             |
             +-- thumb     [777(707)] 本体サムネイルフォルダ
             |
             +-- thumbs    [777(707)] Catalog Mode用サムネイルフォルダ <<**


【洗浄モード】：cat.php の末尾に「?clean」と付けて呼び出す
　　　　　　　　例　http://～～/futaba/cat.php?clean
　　　　　　　　洗浄モードが正常ならば、不用サムネイル消去してから cat.php に戻ります。
　　　　　　　　「不用サムネイルが増えたかな？」と思われた時に洗浄して下さい。

【下部枚数表示について】
   実測ログ値を算出していますので、
     目に見える見かけ上弾かれているログ値とは違います。

このインチキ臭い改造スクリプトを使用したいかなる損害に対して作者は一切の責任を負いません。
　自己責任スクリプトです。サポートは無いと思って下さい。
　自己解決出来なければ、この無保証スクリプトは諦めて下さい。
　　　絶対にオリジナル配布元のサイトで質問などしないように！
　　　改造物に関しての質問などはド迷惑となります。
 
1. このcat.phpの転載配布を禁止とさせて頂きます。
　　　但し、更に改造や改善改良された物に関しては可です。
　　　（改造配布の場合は、スクリプトを把握して迷惑にならないようにして下さい。）
2. 無責任配布なので改造著作権表示は記述していませんが、
　　　更に改造及びルーチンの一部の移植でcat.phpの著作権表示が必要と思う場合は
　　　各自で記入して下さい。（スクリプト内にコメントアウト記述でも構いません。）
3. cat.phpに関しての規約は、各オリジナル配布元に準じます。
4. 利用の前に、必ず各改造前配布元の規約に目を通して守る事。


■てすとｊｕｎっぽい仕様 by Yakuba
・カタログ表示でサムネイル有の場合は本文なし
・カタログ表示でサムネイル無の場合は本文４字
・レス数付き
以上の様式にするため、以下の点を注意すること。
・72行目付近の"本文を挿入"の値を1のままにする(0の場合はバグあり)
・上記に伴って268行目を改造すること(改造済)
------------------------------------------------------------------------- */

// 基本設定-----------------------------------------------------------------
define("LOGFILE", 'img.cgi');                   //ログファイル名
define("TREEFILE", 'tree.cgi');                 //ログファイル名
define("TITLE", '画像掲示板');                  //タイトル
define("HOME",  '../index.html');               //「ホーム」へのリンク
define("PHP_SELF", 'futaba.php');               //本体スクリプト名
define("PHP_SELF2", 'index.html');              //入り口ファイル名
define("LIMIT", 50);                            //スレ本数
define("REGZCUN", 10);                          //カタログモード時の画像行数
define("MESSAGE", 1);                           //本文を挿入 (n=0 y=1)
define("SYNTHETIC_COUNT", 0);                   //下部にカウントを出す (n=0 y=1)

// カラー設定---------------------------------------------------------------
define("COL_BODY", '<body bgcolor="#ffffee" text="#800000" link="#0000ee" vlink="#0000ee" alink="#0000ee">'); //ボディカラー

// スタイルシート-----------------------------------------------------------
$css_collis='<style type="text/css">
<!--
body,tr,td,th { font-size:12pt; }
a:hover { color:#dd0000; }
span { font-size:20pt; }
small { font-size:10pt; }
-->
</style>';

// サムネイル設定-----------------------------------------------------------
define("IMGDIR", 'src/');                       //画像の保存してあるフォルダ
define("THUMBDIR", 'thumbs/');                  //サムネイルを保存するフォルダ
define("THUMB_DIR",'thumb/');                   //大元のサムネイルを保存してあるフォルダ
define("IMG_W", 50);                            //出力する画像（サムネイル）の幅
define("IMG_H", 50);                            //出力する画像（サムネイル）の高さ
define("S_IMG_JPG" , 60);                       //サムネイルJPGの圧縮率
define("SCRIPT_NAME", 'cat.php');               // このスクリプトのファイル名

//菅処のrepng2jpegでサムネイルを作る (n=0 y=1)
//菅処: http://sugachan.dip.jp/download/
//1に設定されても exec コマンドが使えないサーバの場合、自動的にGDで処理されます。
//尚、判別は確実性はありません。サーバ側の変則的な設定で、
//  何かしらのエラーやサムネイル発生しない場合は0として運営して下さい。
define("SUGA_DOCORO", 0);
// -------------------------------------------------------------------------

/* 記事表示 */
$path = realpath("./").'/'.IMGDIR;
$buf = Washing($_SERVER{'QUERY_STRING'});
$natural=FALSE;
$re_meta='<html><META HTTP-EQUIV="refresh" content="0;'.
         'URL='.SCRIPT_NAME.'"><body>画面を切り換えます...</body></html>';
switch($buf){
  case '': updatelog(); exit;
  case 'natural': $natural=TRUE; updatelog(); exit;
  case 'clean': Clean(); echo $re_meta; exit;
  default: echo $re_meta; exit;
}

/* ヘッダ */
function head(&$dat){
  global $css_collis;
  $dat.='<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="ja">
<head>
<META HTTP-EQUIV="Content-type" CONTENT="text/html; charset=Shift_JIS">
<meta name="robots" content="noindex,nofollow,noarchive">
<!-- meta HTTP-EQUIV="pragma" CONTENT="no-cache" -->
'.$css_collis.'
<title>'.TITLE.'</title>
</head>
'.COL_BODY.'
<!--◆アナライズなど-->
';
}

/* 記事部分 */
function updatelog($resno=0){
  global $path,$natural;$p=0;

  $tree = file(TREEFILE);
  $find = false;
  if($resno){
    $counttree=count($tree);
    for($i=0; $i<$counttree; $i++){
      list($artno,)=explode(",", rtrim($tree[$i]));
      if($artno==$resno){ $st=$i;$find=true;break; } //レス先検索
    }
    if(!$find){echo"<html><body><hr>該当記事がみつかりません<hr></body></html>";exit;}
  }
  $line = file(LOGFILE);
  $countline=count($line);
  for($i=0; $i<$countline; $i++){
    list($no,) = explode(",", $line[$i]);
    $lineindex[$no]=$i + 1; //逆変換テーブル作成
  }

  $counttree = count($tree);

      if($natural){
        for($i=0; $i<$counttree; $i++){
          if(empty($tree[$i])) continue;
          $tree_sort = explode(",", rtrim($tree[$i]));
          $disp_sort[] = $tree_sort[0];
        }
        natsort($disp_sort);
        $disp_sort = array_reverse($disp_sort);
      }

  for($page=0; $page<$counttree; $page+=LIMIT){
    $dat='';
    head($dat);
    if(!$resno){
      $st = $page;

      if($natural){
        $nsw = '投稿順';
        $rnsw = '昇降順';
        $nlink = SCRIPT_NAME;
        $ntd = '#e04066';
          }else{
        $nsw = '昇降順';
        $rnsw = '投稿順';
        $nlink = SCRIPT_NAME.'?natural';
        $ntd = '#0040e0';
      }

      $dat.='<font color="#800000" size="5">
<b><div style="font-size: 20pt;text-align: center;">'.TITLE.'</div></b></font>
<hr>
[<a href="'.PHP_SELF2.'">掲示板に戻る</a>]
[<a href="'.HOME.'" target="_top">ホーム</a>]
[<a href="javascript:location.reload()">再読込</a>]
<!--[<a href="'.$nlink.'">'.$rnsw.'</a>]-->
<table width="100%"><tr><th bgcolor="'.$ntd.'">
<font color="#FFFFFF">カタログモード<!-- ('.$nsw.')--></font>
</th></tr></table>
';

      $dat.="<table border=1 align=center><tr>\n\n";
      for($i=0; $i<$counttree; $i++){
        if($natural){
          $sortline = explode(",", rtrim($disp_sort[$i]));
          $disptree = $sortline[0];
            }else{
          if(empty($tree[$i])) continue;
          $treeline = explode(",", rtrim($tree[$i]));
          $disptree = $treeline[0];
        }
        $j=$lineindex[$disptree] - 1;    //該当記事を探して$jにセット
        if(empty($line[$j])) continue;   //$jが範囲外なら次の行
        list($no,,,,,$com,,,,$ext,$w,$h,$time,) = explode(",", $line[$j]);

        if($natural){
          for($x=0; $x<$counttree; $x++){
            $ar=explode(",", rtrim($tree[$x]));
            if($ar[0]==$disptree) $treeline = $ar;
          }
        }

        $jlc=count($treeline)-1;
        // 画像ファイル名
        $img = $path.$time.$ext;
        $src = IMGDIR.$time.$ext;
        //サムネイル制作指令
        if(is_file($src) && !is_file(THUMBDIR.$time.'s.jpg')){
          if(!is_file(THUMB_DIR.$time.'s.jpg')){
            MakeHakusi($time);
              }else{
            MakeThumbnail($src, $time);
          }
        }

        // <imgタグ作成
        $imgsrc = "";
        if($ext && is_file($img)){
          $whpx=GetImageSize(THUMBDIR.$time.'s.jpg');
          $whpixs=$whpx[3];
          if($w && $h){ //サイズがある時
            if(@is_file(THUMBDIR.$time.'s.jpg')){
              $imgsrc = "<a href=\"".PHP_SELF."?res=$no\" target=_blank>".
                "<img src=".THUMBDIR.$time.'s.jpg'." border=0 $whpixs></a>";
                }else{
              $imgsrc = "<a href=\"".PHP_SELF."?res=$no\" target=_blank>".
                "<img src=".$src." border=0 $whpixs></a>";
            }
              }else{ //それ以外
            $imgsrc = "<a href=\"".$src."\" target=_blank><img src=".$src.
              " border=0></a>";
          }
        }

        $com = preg_replace("/<[^>]*>/","",$com);
        $com = preg_replace("/(　| )/","",$com);
        if(MESSAGE){
          if(function_exists("mb_substr") && function_exists("mb_strlen") && function_exists("mb_internal_encoding")){
            mb_internal_encoding("SJIS"); $mbline = TRUE;
              }else{
            $mbline = FALSE;
          }
          if($mbline){
            if(function_exists("mb_convert_kana")) $com = mb_convert_kana($com, "KV");
            if(mb_strlen($com) > 4) $com = mb_substr($com,0,4);
              }else{
            if(strlen($com) > 8) $com = substr($com,0,8).".";
          }
        }
        if($i>=LIMIT) break;

        if(!isset($gzim)){$gzim = "";}
        $gzim++;$gzcom = ($gzim % REGZCUN) ? "" : "</tr>\n<tr>";
        if($imgsrc){
          if(MESSAGE) $mes="$com<br>"; else $mes="";
//次行が改造箇所          $imgsrc = "<td nowrap>$imgsrc<br><small>$mes$jlc</small></td>$gzcom\n";
          $imgsrc = "<td nowrap>$imgsrc<br><small>$jlc</small></td>$gzcom\n";
          if(LIMIT==$gzim) $imgsrc = preg_replace("/</tr>\n<tr>\n$/","",$imgsrc);
          $dat.="$imgsrc";
            } else {
          $commz = "<td nowrap><small><a href=\"".PHP_SELF.
            "?res=$no\" target=_blank>$com</a><br>$jlc</small></td>$gzcom\n";
          if(LIMIT==$gzim) $commz = preg_replace("/</tr>\n<tr>\n$/","",$commz);
          $dat.="$commz";
        }
      }
      $dat.="\n</tr></table>\n";
      clearstatcache(); //ファイルのstatをクリア
      if($resno) break; //res時はtree1行だけ
    }

    if(SYNTHETIC_COUNT){
      $gcnt=0;$tct=count($tree);$tcl=count($line);
      $dir = opendir(IMGDIR);
      while(false !== ($file=readdir($dir))){
        if(preg_match("/\.(jpe?g|gif|png)$/i", $file)) $gcnt++;
      }
      closedir($dir);
      clearstatcache();
      $dat.='<center><table border="1" cellspacing="0" cellpadding="3"><tr>
<td bgcolor="#d6d6f6" nowrap>画像総数</td><td bgcolor="#f6f6f6" nowrap>'.$gcnt.'</td>
<td bgcolor="#d6d6f6" nowrap>スレ本数</td><td bgcolor="#f6f6f6" nowrap>'.$tct.'</td>
<td bgcolor="#d6d6f6" nowrap>記事件数</td><td bgcolor="#f6f6f6" nowrap>'.$tcl.'</td>
</tr></table></center>';
    }

    $dat.='<hr>
<center>
<!-- ◆広告など -->
<small>- <a href="http://php.s3.to/" target="_top">GazouBBS</a>+<a href="http://www.2chan.net/" target="_top">futaba</a>+<a href="http://t-jun.kemoren.com" target="_top">Yakuba</a> -</small><br>
</center>';
    $dat.='</body></html>';
    echo $dat;break;
  }
}

/* サムネイルサイズ取得 */
function MakeThumbnail($src, $f){
  $fthumb = THUMBDIR.$f.'s.jpg';
  $size = getimagesize($src); //サイズ取得
  if($size[0] > IMG_W || $size[1] > IMG_H) { //アスペクト比
    $W = IMG_W / $size[0];
    $H = IMG_H / $size[1];
    $key = ($W < $H) ? $W : $H;
    $resize[0] = $size[0] * $key;
    $resize[1] = $size[1] * $key;
      }else{
    $resize[0] = $size[0];
    $resize[1] = $size[1];
  }

  if(SUGA_DOCORO &&
    ((stristr(PHP_OS, "WIN") &&
      file_exists(realpath("./repng2jpeg.exe"))) ||
     (file_exists(realpath("./repng2jpeg")) &&
      is_executable(realpath("./repng2jpeg"))))){
    // png2jpegサムネイル画像を保存
    if(file_exists(realpath("./repng2jpeg"))){
      $suga_path = realpath("./repng2jpeg");
        }else{
      $suga_path = realpath("./repng2jpeg.exe");
    }
    @exec($suga_path." $src $fthumb $resize[0] $resize[1] ".S_IMG_J);
      }else{
    //GDのバージョンごとに処理
    $thu = (function_exists("ImageCreateTrueColor") && get_gd_ver()=="2") ? TRUE : FALSE;
    if($thu){
      $img_t = ImageCreateTrueColor($resize[0],$resize[1]);	
        }else{
      $img_t = ImageCreate($resize[0],$resize[1]);
    }
    switch($size[2]){
      case 1: $img_i = ImageCreateFromGIF($src);  break;
      case 2: $img_i = ImageCreateFromJPEG($src); break;
      case 3: $img_i = ImageCreateFromPNG($src);  break;
    }

    if($thu){
      ImageCopyResampled($img_t,$img_i,0,0,0,0,$resize[0],$resize[1],$size[0],$size[1]);
        }else{
      ImageCopyResized($img_t,$img_i,0,0,0,0,$resize[0],$resize[1],$size[0],$size[1]);
    }
    //サムネイルは全てjpgになります・・・
    ImageJpeg($img_t, $fthumb, S_IMG_JPG);
    //破棄
    ImageDestroy($img_i);
    ImageDestroy($img_t);
  }
}

//リソースオーバーのフォロー用 (ダミー画像発生)
function MakeHakusi($f) {
  //GDのバージョンごとに処理
  if(function_exists("ImageCreateTrueColor") && get_gd_ver()=="2"){
    $img = ImageCreateTruecolor(50,50);
      }else{
    $img = ImageCreate(50,50);
  }
  $white = ImageColorAllocate($img, 255, 255, 255);
  $black = ImageColorAllocate($img, 0, 0, 0);
  ImageFill($img, 0, 0, $white);
  ImageString($img, 3, 1, 17, 'NoImage', $black);
  ImageJpeg($img, THUMBDIR.$f.'s.jpg',S_IMG_JPG);
  ImageDestroy($img);
}

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

//洗浄
function Washing($clean){
  $clean = trim($clean);
  $clean = htmlspecialchars($clean, ENT_QUOTES);
  $clean = str_replace("\0", "", $clean);
  $clean = str_replace("\t", "", $clean);
  $clean = str_replace("\r", "", $clean);
  $clean = str_replace("\n", "", $clean);
  return $clean;
}

//ファイルを洗浄する
function Clean() {
  $dir = realpath("./").'/'.IMGDIR;
  $thu = realpath("./").'/'.THUMBDIR;
  $fp=opendir($thu);
  while(FALSE !== ($file = readdir($fp))){
    $un = preg_replace("/([0-9]+)s\.jpg$/", "\\1", $file);
    if($file != "." && $file != ".."){
      if(preg_match("/\.jpg$/", $file)){
        if((!file_exists($dir.$un.'.jpg') &&
          !file_exists($dir.$un.'.gif') &&
          !file_exists($dir.$un.'.png')) &&
           file_exists($thu.$file)) unlink($thu.$file);
      }
    }
  }
  closedir($fp);
  clearstatcache();
}

?>
