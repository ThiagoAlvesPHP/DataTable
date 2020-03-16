<?php
$config = array();
$config['dbname'] = 'data_table';
$config['host'] = 'localhost';
$config['dbuser'] = 'root';
$config['dbpass'] = '';
$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass']);