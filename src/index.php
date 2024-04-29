<?php

declare(strict_types=1);
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use Module\Core\View;
use Module\Core\Globals\Session;
use Module\Core\Globals\Post;

View::page('index');
Session::set('sadf', 1);

