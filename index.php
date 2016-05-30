<?php
include_once 'megaindex.php';

$key = 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx'; // Ваш API ключ !!!
$mi = new MegaIndex($key);

echo '<h1>Получение юнитов аккаунта</h1>';
$array = $mi->get('user/units');
var_dump($array);

echo '<h1>Баланс аккаунта</h1>';
$array = $mi->get('user/balance');
var_dump($array);

echo '<h1>Обратные ссылки</h1>';
$param = array('domain' => 'megaindex.com', 'count' => 1);
$array = $mi->get('backlinks', $param);
var_dump($array);

echo '<h1>Обратные ссылки(общие данные)</h1>';
$param = array('domain' => 'megaindex.com');
$array = $mi->get('backlinks/total', $param);
var_dump($array);

echo '<h1>Обратные ссылки(информация по поддоменам)</h1>';
$param = array('domain' => 'megaindex.com', 'count' => 1);
$array = $mi->get('backlinks/subdomains', $param);
var_dump($array);

echo '<h1>Изменение ссылочной массы</h1>';
$param = array('domain' => 'megaindex.com');
$array = $mi->get('backlinks/changes', $param);
var_dump($array);

echo '<h1>Исходящие ссылки</h1>';
$param = array('domain' => 'megaindex.com', 'count' => 1);
$array = $mi->get('outlinks', $param);
var_dump($array);

echo '<h1>Исходящие ссылки(общие данные)</h1>';
$param = array('domain' => 'megaindex.com', 'count' => 1);
$array = $mi->get('outlinks/total', $param);
var_dump($array);

echo '<h1>Определение тематики LDA для сайта</h1>';
$param = array('domain' => array('https://ru.megaindex.com'), 'count' => 2);
$array = $mi->get('visrep/lda_site', $param);
var_dump($array);

echo '<h1>Определение тематики LDA для контента</h1>';
$param = array('domain' => array('https://ru.megaindex.com'), 'count' => 2);
$post = array('content' => 'текст об продаже автомобилей и автодилерах и автосервисе и вообще авто и автолюбителях');
$array = $mi->get('visrep/lda_content', $param, $post);
var_dump($array);

echo '<h1>Видимость сайта</h1>';
$param = array('domain' => 'megaindex.com', 'ser_id' => 1, 'count' => 1);
$array = $mi->get('visrep', $param);
var_dump($array);

echo '<h1>Получение поисковых систем для видимости</h1>';
$param = array();
$array = $mi->get('visrep/get_se', $param);
var_dump($array);

echo '<h1>Получение регионов для поисковых систем</h1>';
$param = array('region_id' => 1, 'operation' => 'get_children' );
$array = $mi->get('visrep/get_region', $param);
var_dump($array);