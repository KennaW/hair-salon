<?php

    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Stylist.php";
    //require_once __DIR__."/../src/Client.php";

    $app = new Silex\Application();

    $DB = new PDO('pgsql:host=localhost;dbname=hair_salon');

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.twig', array('categories' => Stylist::getAll()));
    });

    $app->post("/stylist", function() use ($app) {
        $stylist = new Stylist($_POST['name']);
        $stylist->save();
        return $app['twig']->render('stylist.twig', array('stylists' => Stylist::getAll()));
    });

    $app->get("/stylist/{id}", function($id) use ($app){
        $stylist = Stylist::find($id);
        return $app['twig']->('stylist.twig', array('stylist' => $stylist, 'clients' => $stylists->getClient()));

    });

    $app->post("/clients", function() use ($app) {
    $name = $_POST['name'];
    $stylist_id = $_POST['stylist_id'];
    $client = new Client($name, $id = null, $stylist_id);
    $client->save();
    $stylist = Stylist::find($stylist_id);
    return $app['twig']->render('stylist.twig', array('stylist' => $stylist, 'tasks' => Client::getAll()));
});

?>
