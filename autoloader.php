<?php
namespace mageekguy\atoum\reports;

use mageekguy\atoum;

$directories = [
	__DIR__ . DIRECTORY_SEPARATOR . 'vendor',
	__DIR__ . DIRECTORY_SEPARATOR . '../..'
];
$vendorDir = null;


foreach ($directories as $directory)
{
	if (is_dir($directory))
	{
		$vendorDir = $directory;

		break;
	}
}

if ($vendorDir === null)
{
	throw new \Exception('Unable to find the vendor directory');
}

atoum\autoloader::get()
	->addNamespaceAlias('atoum\reports', __NAMESPACE__)
	->addDirectory(__NAMESPACE__, __DIR__ . DIRECTORY_SEPARATOR . 'classes')
	->addDirectory('Symfony\Component\Filesystem', $filesystemDir)
;

require_once __DIR__ . DIRECTORY_SEPARATOR .'tests' . DIRECTORY_SEPARATOR . 'autoloader.php';
