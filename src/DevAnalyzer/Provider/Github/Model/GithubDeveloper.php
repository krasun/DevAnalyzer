<?php

namespace DevAnalyzer\Provider\Github\Model;

use DevAnalyzer\Model\Developer;

class GithubDeveloper extends Developer
{
    /**
     * @var string
     */
    private $language;

    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }
} 