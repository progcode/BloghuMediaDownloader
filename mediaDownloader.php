<?php
/**
 * Blog.hu media downloader from XML
 *
 * @category  WebPositive
 * @copyright 2018. WebPositive (https://progweb.hu)
 * @license   https://progweb.hu/license
 * @link      https://progweb.hu
 * @version   1.0.0
 */

if(PHP_SAPI !== 'cli' || isset($_SERVER['HTTP_USER_AGENT'])):
    die('Please run only from cli');
endif;

try {
    $exportFile = 'bloghu_export.xml';

    if(!file_exists($exportFile)) {
        die('Import file not exists!');
    }

    $feed = new DOMDocument();
    $feed->load($exportFile);
    $items = $feed->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');

    foreach($items as $key => $item):
        preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $item->getElementsByTagName('encoded')->item(0)->firstChild->nodeValue, $contentImg);

        $imageFileName = basename($contentImg[1]);
        echo $contentImg[1]."\n";

        copy($contentImg[1], $imageFileName);
    endforeach;

} catch (Exception $e) {
    echo 'Downloader error: ' . $e->getMessage();
    exit(1);
}
