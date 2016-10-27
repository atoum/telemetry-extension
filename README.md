# atoum telemetry extension [![Build Status](https://travis-ci.org/atoum/telemetry-extension.svg?branch=master)](https://travis-ci.org/atoum/telemetry-extension)

![atoum](http://atoum.org/images/logo/atoum.png)

## Install it

Install extension using [composer](https://getcomposer.org):

```json
{
    "require-dev": {
        "atoum/reports-extension": "~1.0"
    }
}

```

Enable the extension using atoum configuration file:

```php
<?php

// .atoum.php

require_once __DIR__ . DIRECTORY_SEPARATOR . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

use mageekguy\atoum\telemetry;

$extension = new telemetry\extension($script);

$extension->addToRunner($runner);
```

## Use it

### Telemetry report

The telemetry report allow us to collect metrics from your test suites. If you want to help us improve atoum, please send us your reports.

To enable the telemetry report, add the following code to your configuration file:

```php
<?php

// .atoum.php

use mageekguy\atoum\reports;
use mageekguy\atoum\reports\telemetry;
use mageekguy\atoum\writers\std;

$script->addDefaultReport();

$telemetry = new telemetry();
$telemetry->addWriter(new std\out());
$runner->addReport($telemetry);
```

Now, each time your run your test suite, atoum will collect data and send them to the telemetry. By default, **everything is
sent anonymously**: a random project name will be generated and we'll only collect metrics. 

If you want to let us know who you are, add the following lines to your configuration file:

```php
<?php 

$telemetry->readProjectNameFromComposerJson(__DIR__ . '/composer.json');

// Or

$telemetry->setProjectName('my/project');
```

_The project name **must** be composer compliant._

With this configuration, atoum will send us everything about your project: the vendor name and the project name. If 
you want to keep the latter secret so we only collect the vendor name, you can add the following line:

```php
<?php

$telemetry->sendAnonymousProjectName();
```

