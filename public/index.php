<?php
ini_set('date.timezone', 'Europe/Kiev');
ini_set('display_errors',1);
error_reporting(E_ALL);

//print_r($_SERVER['REQUEST_URI'] ); exit;
try {

    $loader = new \Phalcon\Loader();

    $loader->registerNamespaces(
        array(
            'Meetingroom' => "../Meetingroom/"
        )
    );

    $loader->registerDirs(
        array(
            '../Meetingroom/',
        )
    );

    $loader->register();

    //Create a DI
    $di = new Phalcon\DI\FactoryDefault();


    $application = new \Phalcon\Mvc\Application($di);
    $bootstrapper = new \Meetingroom\Bootstrapper\BaseBootstrapper();
    $bootstrapper->bootstrap($application);


    echo $application->handle()->getContent();
} catch (\Phalcon\Exception $e) {
    echo "PhalconException: ", $e->getMessage();
}
