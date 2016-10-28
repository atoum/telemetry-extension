<?php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'autoloader.php';

use mageekguy\atoum;

$runner->addExtension(new atoum\telemetry\extension($script));
