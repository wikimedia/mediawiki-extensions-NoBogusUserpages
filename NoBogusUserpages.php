<?php
/**
 * The NoBogusUserpages exension to MediaWiki allows only privileged users to create userpages
 * for non-existent users
 *
 * @link https://www.mediawiki.org/wiki/Extension:NoBogusUserpages Documentation
 * @link https://www.mediawiki.org/wiki/Extension_talk:NoBogusUserpages Support
 * @link https://git.wikimedia.org/summary/mediawiki%2Fextensions%2FNoBogusUserpages.git Source Code
 *
 * @file
 * @ingroup Extensions
 * @package MediaWiki
 *
 * @author Daniel Friesen (Dantman) <mediawiki@danielfriesen.name>
 *
 * @license https://www.gnu.org/copyleft/gpl.html GNU General Public License 2.0 or later
 */

// Ensure that the script cannot be executed outside of MediaWiki
if ( !defined( 'MEDIAWIKI' ) ) {
	die( "This is an extension to MediaWiki and cannot be run standalone." );
}

// Display extension's information on "Special:Version"
$wgExtensionCredits['antispam'][] = array(
	'path' => __FILE__,
	'name' => 'NoBogusUserpages',
	'version' => '1.1.0',
	'url' => 'https://www.mediawiki.org/wiki/Extension:NoBogusUserpages',
	'author' => array(
		'[https://www.mediawiki.org/wiki/User:Dantman Daniel Friesen]',
		'...'
	),
	'descriptionmsg' => 'nobogususerpages-desc',
	'license-name' => 'GPL-2.0+'
);

// Load extension's class
$wgAutoloadClasses['NoBogusUserpages'] = __DIR__ . '/NoBogusUserpages.class.php';

// Load internationalization files
$wgMessagesDirs['NoBogusUserpages'] = __DIR__ . '/i18n';

// Add user permission
$wgAvailableRights[] = 'createbogususerpage';
$wgGroupPermissions['sysop']['createbogususerpage'] = true;

// Register hook
$wgHooks['getUserPermissionsErrors'][] = 'NoBogusUserpages::onGetUserPermissionsErrors';
