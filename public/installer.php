<?php

$root = dirname(dirname(__FILE__));


$appName = $_POST['appName'];
$authorName = $_POST['authorName'];
$appURL = $_POST['appURL'];

$needsDBMS = $_POST['needsDBMS'];
$dbType = $_POST['dbType'];
$dbHost = $_POST['dbHost'];
$dbUser = $_POST['dbUser'];
$dbPass = $_POST['dbPass'];
$dbName = $_POST['dbName'];

$content = "[development]".PHP_EOL.PHP_EOL;
$content .= ";Remove the leading semicolon to decomment".PHP_EOL.PHP_EOL;

if($needsDBMS==true) {
  $content .= 'db.type="'.$dbType.'"'.PHP_EOL;
  $content .= 'db.user="'.$dbUser.'"'.PHP_EOL;
  $content .= 'db.pass="'.$dbPass.'"'.PHP_EOL;
  $content .= 'db.name="'.$dbName.'"'.PHP_EOL;
  $content .= 'db.host="'.$dbHost.'"'.PHP_EOL.PHP_EOL;
} else {
  $content .= '; If your app uses a database decomment and edit all the next db.* fields.'.PHP_EOL;
  $content .= ';db.type=mysql'.PHP_EOL;
  $content .= ';db.user=root'.PHP_EOL;
  $content .= ';db.pass="https://xato.net/passwords/more-top-worst-passwords"'.PHP_EOL;
  $content .= ';db.name="awesomedb"'.PHP_EOL;
  $content .= ';db.host=127.0.0.1'.PHP_EOL.PHP_EOL;
}

$content .= 'app.name="'.$appName.'"'.PHP_EOL;
$content .= 'app.author="'.$authorName.'"'.PHP_EOL;
$content .= 'app.url="'.$appURL.'"'.PHP_EOL.PHP_EOL;
$content .= '[production : development]'.PHP_EOL;

$file = $root.DIRECTORY_SEPARATOR."app.ini";

if(!is_dir($file)) {
  if(!file_put_contents($file, $content)) {
    header("Location: install.php?error=ko");
  } else {
    header("Location: install.php?success=ok");
  }
}
