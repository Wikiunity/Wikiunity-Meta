<?php
if( !defined( 'MEDIAWIKI' ) ) {
    echo( "This file is an extension to the MediaWiki software and cannot be used standalone.\n" );
    die( 1 );
}
 
$wgExtensionCredits['other'][] = array (

	'name' => 'WikiunityMetadata',
	'version' => '2.1a',
	'author' => '[http://de.community.wikiunity.com/wiki/User:McCouman <span style="color:#000;">Michael McCouman jr.</span>]',
    'url' => 'http://www.wikiunity.com',
    'description' => 'Add some custom metas to www.Wikiunity.com wikipages.',
);
 
$wgHooks['OutputPageBeforeHTML'][] = 'wfAddMetas';
 
function wfAddMetas( &$out, &$text ) {
  global $wgTitle, $wgParser, $wgRequest, $action;
  if(
          $action !== 'edit'
       && $action !== 'history'
       && $action !== 'delete'
       && $action !== 'watch'
       #&& strpos( $wgParser->mTitle->mPrefixedText, 'Special:' ) == false
       #&& $wgParser->mTitle->mNamespace !== 8
  )
  {
    $name = $wgTitle->getPrefixedDBKey();
 
    $out->addMeta( 'Description', 'Wikiunity ist ein Wiki Freehoster, MediaWiki, Wikiunity is a free Wiki hoster');
    
	$out->addMeta( 'Keywords', $name.', Wikiunity, Wiki, Hoster, free, Freehoster, Gemeinschaft' );
    
	$out->addMeta( 'Author', 'Wikiunity, www.Wikiunity.com, de.Wikiunity.com, Michael McCouman jr., Tim Weyer, Bob Weinand');
    
	$out->addMeta( 'Copyright', 'Copyright 2011 by Wikiunity. Diese Seite darf nach Bestimmungen der CC-by-sa Lizenz genutzt und bearbeitet werden. Produced by Michael McCouman jr. (CEO), Tim Weyer (COO), Bob Weinand (CTO)');
	
	$out->addMeta( 'Generator', 'www.Wikiunity.com');
	
	$out->addMeta( 'Content-Language', 'de');
	$out->addMeta( 'Content-Language', 'en');
	$out->addMeta( 'Content-Language', 'us');
	
	$out->addMeta( 'Content-Style-Type', 'text/css');
	
	$out->addMeta( 'Made', 'mailto:kontakt@wikiunity.com');
	$out->addMeta( 'Made', 'mailto:contact@wikiunity.com');
	
	$out->addMeta( 'Reply-to', 'mccouman@wikiunity.com (Michael McCouman jr.)');
	$out->addMeta( 'Reply-to', 'svg@wikiunity.com (Tim Weyer)');

	
	$out->addMeta( 'Page-Topic', 'Wikis, Wikiunity, Wiki');
	$out->addMeta( 'Page-Type', 'Wiki');
	
	$out->addMeta( 'Audience', 'Wikiisten');
	$out->addMeta( 'Audience', 'Wikianer');
	$out->addMeta( 'Audience', 'Wikipedianer'); 
	$out->addMeta( 'Audience', 'Wiki'); 
	$out->addMeta( 'Audience', 'Wikis');
	
	$out->addMeta( 'Rating', 'General');
    
	$out->addMeta( 'Revisit', '1 DAYS');
    
	$out->addMeta( "revisit-after", "2 days");
  }
  return true;
}