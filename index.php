<?php
include('simple_html_dom.php');

$html = file_get_html('https://msk.kassir.ru/koncert/voleybolno-sportivnyiy-kompleks/lyube-odintsovo_2019-05-23');
$data = [];
$index = 0;
foreach ($html->find('#prices tbody') as $val) {
	foreach ($val->children as $v) {
		foreach ($v->children as $value) {
			if ($value->attr['class']=='col-buy') {
				$index++; 
				continue;
			}
			$data[$index][$value->attr['class']] = current($value->nodes[0]->_);
		}
	}
}

var_dump($data);

