<?php

require_once __DIR__ . '/../path-to-jf-folder.php';
use JustField\Authorization;

$account_manager = new Authorization\Manager($orm, 'users', '/', '../login');