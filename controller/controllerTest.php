<?php
require_once(realpath(__DIR__ . '/../view/part/head.php'));

function Test($params){
    require_once(realpath(__DIR__ . '/../model/modelClient.php'));
    echo getNumClientByEmail("kilian.audouin@sfr.fr");
}