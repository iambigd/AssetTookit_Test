

<?php
//composer
require "vendor/autoload.php";

$baseUrl = dirname($_SERVER['SCRIPT_NAME']);

//應用程式的目錄
define('ROOT', dirname(__DIR__) );
// echo ROOT;

//please use correct .assetkit.php file
//使用絕對路徑參照
// In production mode, the asset compiler squashes the loaded asset files to the minified files.
// In development mode, the asset compiler simply render the include paths.
$config = new AssetToolkit\AssetConfig( '.assetkit.php', array( 
    // 'root' => ROOT, 
    'environment' => AssetToolkit\AssetConfig::PRODUCTION
    // 'environment' => AssetToolkit\AssetConfig::DEVELOPMENT
));

// initialize an asset loader
$loader = new AssetToolkit\AssetLoader( $config );
$assets = array();

//指定本頁會用到的assets
$assets[] = $loader->load( 'jquery' );
$assets[] = $loader->load( 'iangel' );

//產生asset的render
$render = new AssetToolkit\AssetRender($config,$loader);

// Use AssetRender to compile and render the HTML tag
// 動態產生,如果指定的asset有改變,會自動產生新版本,但先前的版本不會自動砍掉
$compiler = $render->getCompiler();
$compiler->enableProductionFstatCheck();
// $compiler->defaultJsCompressor = 'uglifyjs';
// $compiler->defaultCssCompressor = 'cssmin';
$render->force();
?>
<html>
<head>
<?php
$render->renderAssets($assets);
?>
<style>
body { font-size: 12px; }
</style>
</head>
<body>
<?php echo "Hello AssetToolkit";?>
</body>
</html>
