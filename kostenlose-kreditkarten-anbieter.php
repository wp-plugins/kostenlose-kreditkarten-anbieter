<?php
/*
Plugin Name: Kostenlose Kreditkarten-Anbieter
Plugin URI: http://www.kreditkarten-1a.de/
Description: Mit diesem Plugin k&ouml;nnen Sie einfach eine Tabelle mit den besten kostenlosen Kreditkarten-Anbieter in Seiten oder Artikeln anzeigen lassen. Support: [http://www.kreditkarten-1a.de/](http://www.kreditkarten-1a.de/)
Version: 1.0
Author: Ulrich Fielitz
Author URI: http://www.kreditkarten-1a.de/
License: GPL3
*/


/*  get table-data */
function kostenlosekreditkarten()
{   
	$s = "";
	$file = dirname(__FILE__) . "\data.html";

	if(file_exists($file))
	{
		$s = file_get_contents($file); 
	} 
  return $s;
}


/* function to add to filter */
function Kreditkarten_Anbieter($content)
{
		if (strpos($content, "<!-- kostenlosekreditkarten -->") !== false) {
        $content = preg_replace('/<p>\s*<!--(.*)-->\s*<\/p>/i', "<!--$1-->", $content);
        $content = str_replace('<!-- kostenlosekreditkarten -->', kostenlosekreditkarten(), $content);
    }
    return $content;
}


add_filter('the_content', 'Kreditkarten_Anbieter');


?>