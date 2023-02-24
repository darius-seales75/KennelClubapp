<?php

use Elgg\SystemLog\LogEventCache;
use Elgg\SystemLog\SystemLog;

return [
	LogEventCache::name() => \DI\create(LogEventCache::class),

	SystemLog::name() => \DI\create(SystemLog::class)
		->constructor(\DI\get(LogEventCache::name()), \DI\get('db')),
];
