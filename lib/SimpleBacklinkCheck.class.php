<?php

class SimpleBacklinkCheck
{
    private $target = '';
    private $urls = [];
    private $results = [];

    public function setTarget($target)
    {
        $this->target = $target;
    }

    public function getTarget()
    {
        return $this->target;
    }

    public function setUrls($urls)
    {
        $urls = array_map(function ($url) {
            return trim($url, "\r\t\n ");
        }, $urls);

        $urls = array_filter($urls, function ($url) {
            return filter_var($url, FILTER_VALIDATE_URL);
        });

        $this->urls = $urls;
    }

    public function process()
    {
        $results = [];
        foreach ($this->urls as $url) {
            $content = $this->fetchUrlContent($url);
            $xpath = $this->getXpathFromContent($content);
            $this->results[$url] = $this->searchTargetInLinks($xpath);
        }
    }

    public function getResults()
    {
        return $this->results;
    }

    private function fetchUrlContent($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        /* $verbose = fopen('./curl.log', 'w+');
        curl_setopt($ch, CURLOPT_STDERR, $verbose); */

        $content = curl_exec($ch);
        curl_close($ch);

        return $content;
    }

    private function getXpathFromContent($content)
    {
        $doc = new DOMDocument();
        @$doc->loadHTML($content);

        return new DOMXpath($doc);
    }

    private function searchTargetInLinks($xpath)
    {
        $links = $xpath->query('//a');

        foreach ($links as $link) {
            $href = $link->getAttribute('href');

            if (strpos($href, $this->target) !== false) {
                return true;
            }
        }
        return false;
    }
}
