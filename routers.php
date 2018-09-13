<?php
global $routes;
$routes = array();

$routes['/produto/{anuncio_id}'] = '/produto/open/:anuncio_id';
$routes['/edit/{anuncio_id}'] = '/edit/index/:anuncio_id';