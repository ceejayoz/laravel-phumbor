<?php

return array(
	// the path to your Thumbor server
	// if it runs on a port other than 80, be sure to include it
	'server' => env('PHUMBOR_SERVER', 'http://example.com:8888'),

	// your Thumbor server's secret key
	'key' => env('PHUMBOR_KEY', 'YOUR_KEEY'),
);
