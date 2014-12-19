<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>test phaser</title>
    <style>
        body {
            padding: 10px;
            margin: 0;
            font: 400 14px/22px "微软雅黑"
        }
        a,a:visited,a:active {
            text-decoration: none;
            color: #33a;
        }
        a:hover {
            color: #99f;
        }
        .wrap {
            list-style: none;
            border: 1px solid #999;
            border-radius: 10px;
            width: 95%;
            padding: 20px;
            margin: 50px auto;
            display: flex;
            flex-wrap: wrap;
        }
        .wrap li {
            width: 300px;
            display: block;
        }
    </style>
</head>
<body>
<h1>phaser demo</h1>
<hr/>
<ul class="wrap">
     <?php
      
     function u_g($path){
         return  iconv("UTF-8", "GB2312", $path);
     }
     function g_u($path){
         return  iconv("GB2312", "UTF-8", $path);
     }
     
     function my_scandir($rootPath){
         $targetDeck = u_g($rootPath);
         if(is_dir($targetDeck)){
             scanIt($targetDeck); 
         }else{
             echo g_u($rootPath)."  文件夹不存在";
         }
     }
     
     function scanIt($targetDeck){
         if ($handle = @opendir($targetDeck)) { 
             while (false !== ($file = @readdir($handle))) {
                 if($file=='.' || $file=='..'){
                     continue;
                 } 
                 $nextDeck = $targetDeck."".$file;
                 if(is_dir($nextDeck)){
//                     scanIt($nextDeck);
//                     echo "dir: ".g_u($nextDeck)."<br/>";
                 }else{
                     if($file !=="Thumbs.db" && $file !=="index.php"){
//                         echo "file: ".g_u($nextDeck)."<br/>";
                        echo "<li><a href='".$file."'>".$file."</a></li>";
                     }
                 }
             }
             @closedir($handle);
         }
         return;
     }
     
     my_scandir( $_SERVER['DOCUMENT_ROOT']."./");
     
     ?>
     </ul>
</body>
</html>