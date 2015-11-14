<?
// This is a template for a PHP scraper on morph.io (https://morph.io)
// including some code snippets below that you should find helpful
require 'scraperwiki.php';
require 'scraperwiki/simple_html_dom.php';

// Setup scraping parameters
$keywords = "4894128028666";

$url = "https://www.google.co.uk/search?q=".$keywords;

$params = array(
  );
  
$userAgent = "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36";

// Read in a page
$html = scraperwiki::scrape($url, $params, $userAgent);

// Find something on the page using css selectors
$dom = new simple_html_dom();
$dom->load($html);
//print_r($dom->find(".r a"));
$items = $dom->find(".r a"));

foreach($items AS $i=>$item) {
   echo $i.': '.$item->attr['href'].'<br />';
}

//
// // Write out to the sqlite database using scraperwiki library
// scraperwiki::save_sqlite(array('name'), array('name' => 'susan', 'occupation' => 'software developer'));
//
// // An arbitrary query against the database
// scraperwiki::select("* from data where 'name'='peter'")

// You don't have to do things with the ScraperWiki library.
// You can use whatever libraries you want: https://morph.io/documentation/php
// All that matters is that your final data is written to an SQLite database
// called "data.sqlite" in the current working directory which has at least a table
// called "data".
?>
