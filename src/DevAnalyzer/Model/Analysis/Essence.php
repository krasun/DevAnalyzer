<?php

namespace DevAnalyzer\Model\Analysis;

class Essence 
{
    /**
     * @var string
     */
    private $summarySentence;

    public function __construct($summarySentence = '')
    {
        $this->summarySentence = $summarySentence;
    }

    /**
     * @return string
     */
    public function getSummarySentence()
    {
        return $this->summarySentence;
    }
} 