<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Brand.php";
    require_once __DIR__."/../src/Store.php";

     date_default_timezone_set('America/New_York');

    $server = 'mysql:host=localhost:8889;dbname=shoes';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use($app){
        return $app['twig']->render('index.html.twig');
    });

    //STORES
    $app->get("/stores", function() use($app){
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    $app->post("/stores", function() use($app){
        $name = $_POST['store_name'];
        $new_store = new Store($name);
        $new_store->save();
        return $app['twig']->render('stores.html.twig', array('stores' => Store::getAll()));
    });

    $app->get("/store/{store_id}", function($store_id) use($app){
        return $app['twig']->render('store.html.twig', array('stores' => Store::getAll()));
    });

    //BRANDS
    $app->get("/brands", function() use($app){
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    $app->post("/brands", function() use($app){
        $name = $_POST['brand_name'];
        $new_brand = new Brand($name);
        $new_brand->save();
        return $app['twig']->render('brands.html.twig', array('brands' => Brand::getAll()));
    });

    return $app;
?>
