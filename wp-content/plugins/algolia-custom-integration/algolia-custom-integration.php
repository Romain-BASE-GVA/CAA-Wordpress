<?php
/**
 * Plugin Name:     Algolia Custom Integration
 * Description:     Add Algolia Search feature
 * Text Domain:     algolia-custom-integration
 * Version:         1.0.0
 *
 * @package         Algolia_Custom_Integration
 */

// Your code starts here.

require_once __DIR__ . '/api-client/autoload.php';
// If you're using Composer, require the Composer autoload
// require_once __DIR__ . '/vendor/autoload.php';

global $algolia;

$whitelist = ['127.0.0.1', '::1', 'localhost', '', 'caa']; 
$isLocalHost = in_array($_SERVER['REMOTE_ADDR'], $whitelist);
$algoliaAppId = $isLocalHost ? 'B98TMUO56H' : 'H4335KHPRJ'; 
$adminApiKey = $isLocalHost ? '9be8a054d376f67fdee89d21a448f5c9' : 'a36d6dcef4af00e247d7eff38344fd4d';

$algolia = \Algolia\AlgoliaSearch\SearchClient::create($algoliaAppId, $adminApiKey);

require_once __DIR__ . '/wp-cli.php';

