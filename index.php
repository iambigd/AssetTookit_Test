

<?php
//composer
require "vendor/autoload.php";

$baseUrl = dirname($_SERVER['SCRIPT_NAME']);

//your app folder
$APPLICATION_ROOT = "/var/www/static";

//please use correct .assetkit.php file
$config = new AssetToolkit\AssetConfig( '.assetkit.php', array( 
    'root' => $APPLICATION_ROOT 
    ,'environment' => AssetToolkit\AssetConfig::PRODUCTION
    // ,'environment' => AssetToolkit\AssetConfig::DEVELOPMENT
));

// initialize an asset loader
$loader = new AssetToolkit\AssetLoader( $config );
$assets = array();
// $assets[] = $loader->load( 'jquery' );
$assets[] = $loader->load( 'iangel' );


$render = new AssetToolkit\AssetRender($config,$loader);

// Use AssetRender to compile and render the HTML tag
$compiler = $render->getCompiler();
$compiler->enableProductionFstatCheck();
// $compiler->defaultJsCompressor = 'uglifyjs';
// $compiler->defaultCssCompressor = 'cssmin';
$render->force();
?>
<html>
<head>
<?php
$render->renderAssets($assets,'bigd-asset');
?>
<style>
body { font-size: 12px; }
</style>
</head>
<body>
<?php echo "Hello AssetToolkit";?>
</body>
</html>
