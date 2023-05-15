<?php

namespace App\View\Helper;

use Cake\View\Helper;
use DOMDocument;
use DOMXPath;

class SvgHelper extends Helper
{
    public $helpers = ['Url'];

    /**
     * Return SVG icon as HTML string
     * 
     * By default, the SVG file is expected to be in webroot/img folder.
     * 
     * Example:
     * 
     * ```
     *  SvgHelper::getSvgIcon("img/icons/arrow.svg", "svg-icon-2x");
     * ```
     *
     * @param string $path Relative path to SVG files in webroot/img
     * @param string $iconClass Class name for span element
     * @param string $svgClass Class name for svg element
     * 
     * @return string HTML string
     */
    public function getSvgIcon($path, $iconClass = "", $svgClass = "")
    {
        // Check if $path is a relative path to webroot/img
        if (strpos($path, "img/") !== 0) {
            $path = "img/" . $path;
        }

        $full_path = WWW_ROOT . $path;
        if ($this->_View->getTheme()) {
            $full_path = APP_PLUGINS . $this->_View->getTheme(). DS . 'webroot' . DS . $path;
        }

        \Cake\Log\Log::error(print_r($full_path, true));
        if (!file_exists($full_path)) {
            return "<!-- SVG file not found: " . $path . " -->";
        }

        $svg_content = file_get_contents($full_path);

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query("//comment()") as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if (!empty($svgClass)) {
            foreach ($dom->getElementsByTagName("svg") as $element) {
                $element->setAttribute("class", $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName("title");
        if ($title["length"]) {
            $dom->documentElement->removeChild($title[0]);
        }

        $desc = $dom->getElementsByTagName("desc");
        if ($desc["length"]) {
            $dom->documentElement->removeChild($desc[0]);
        }

        $defs = $dom->getElementsByTagName("defs");
        if ($defs["length"]) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g =  $dom->getElementsByTagName("g");
        foreach ($g as $el) {
            $el->removeAttribute("id");
        }

        $mask =  $dom->getElementsByTagName("mask");
        foreach ($mask as $el) {
            $el->removeAttribute("id");
        }

        $rect =  $dom->getElementsByTagName("rect");
        foreach ($rect as $el) {
            $el->removeAttribute("id");
        }

        $path =  $dom->getElementsByTagName("path");
        foreach ($path as $el) {
            $el->removeAttribute("id");
        }

        $circle =  $dom->getElementsByTagName("circle");
        foreach ($circle as $el) {
            $el->removeAttribute("id");
        }

        $use =  $dom->getElementsByTagName("use");
        foreach ($use as $el) {
            $el->removeAttribute("id");
        }

        $polygon =  $dom->getElementsByTagName("polygon");
        foreach ($polygon as $el) {
            $el->removeAttribute("id");
        }

        $ellipse =  $dom->getElementsByTagName("ellipse");
        foreach ($ellipse as $el) {
            $el->removeAttribute("id");
        }

        $svgXml = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $svgXml = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $svgXml);

        $cls = array("svg-icon");
        if (!empty($iconClass)) {
            $cls = array_merge($cls, explode(" ", $iconClass));
        }

        return '<span class="' . implode(" ", $cls) . '">' . $svgXml . '</span>';
    }
}
