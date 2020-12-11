<?php

$config = [
	'sourcesDir'			=> __DIR__ . '/../development',
	'releaseFile'			=> __DIR__ . '/../release/index.php',
	// do not include script or file, where it's relative path from sourceDir match any of these rules:
	'excludePatterns'		=> [
		
		// Common excludes for every MvcCore app using composer:
		"/\.",											// Everything started with '.' (.git, .htaccess ...)
		"^/web\.config",								// Microsoft IIS .rewrite rules
		"^/Var/Logs/.*",								// App development logs
		"composer\.(json|lock)",						// composer.json and composer.lock
		"composer/installed\.json",						// composer installed json
		"(LICEN(C|S)E\.(txt|TXT|md|MD))|(LICEN(C|S)E)",	// libraries licence files
		"\.(bak|BAK`bat|BAT|md|MD|phpt|PHPT|cmd|CMD)$",

		// Exclude specific PHP libraries
		"^/vendor/tracy/.*",							// - tracy library (https://tracy.nette.org/)
		"^/vendor/tracy/tracy/(.*)/assets/",			//   excluded everything except staticly
		"^/vendor/tracy/tracy/tools/",					//   loaded PHP scripts by composer - added later
		"^/vendor/mvccore/ext-debug-tracy.*",			// - mvccore tracy adapter and all tracy panel extensions
		"^/vendor/mrclay/.*",							// HTML/JS/CSS minify library
	],
	// include all scripts or files, where it's relative path from sourceDir match any of these rules:
	// (include paterns always overides exclude patterns)
	'includePatterns'		=> [
	],
	// process simple strings replacements on all readed PHP scripts before saving into result package:
	// (replacements are executed before configured minification in RAM, they don't affect anythin on hard drive)
	'stringReplacements'	=> [
		// Switch MvcCore application back from SFU mode to automatic compile mode detection
		'->Run(1);'		=> '->Run();',
		// Remove tracy debug library extension usage (optional):
		"class_exists('\MvcCore\Ext\Debugs\Tracy')"	=> 'FALSE',
	],
	'minifyTemplates'		=> 0,// Remove non-conditional comments and whitespaces
	'minifyPhp'				=> 1,// Remove comments and whitespaces
];
