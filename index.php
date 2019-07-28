<?php
session_start();
require_once("vendor/autoload.php");

use \Slim\Slim;
use \Hcode\Page;
use \Hcode\PageAdmin;
use \Hcode\Model\User;

$app = new Slim();

$app->config('debug', true);
//Configurando rota do template do site
$app->get('/', function() {

   $page = new Page();

   $page->setTpl('index');

});
//Configurando rota do Template do Admin
$app->get('/admin', function() {

   User::verifyLogin();

   $page = new PageAdmin();

   $page->setTpl('index');

});
//Configurando rota do template para acessar Admin
$app->get('/admin/login', function() {

   $page = new PageAdmin([
      "header"=>false,
      "footer"=>false
   ]);

   $page->setTpl('login');

});
//Configurando acesso ao Admin
$app->post('/admin/login', function() {

   User::login($_POST['login'], $_POST['password']);

   header('Location: /admin');
   exit;

});
//Configurando logout do Admin
$app->get('/admin/logout', function() {

   User::logout();

   header('Location: /admin');
   exit;

});

$app->run();

