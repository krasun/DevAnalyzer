<?php

namespace DevAnalyzer\Model\Search;

class DeveloperProviderResult
{
    /**
     * @var string
     */
    private $providerName;

    /**
     * @var array
     */
    private $developers;

    public function __construct($providerName, $developers = [])
    {
        $this->providerName = $providerName;
        $this->developers = $developers;
    }

    /**
     * @return string
     */
    public function getProviderName()
    {
        return $this->providerName;
    }

    /**
     * @return array
     */
    public function getDevelopers()
    {
        return $this->developers;
    }
} 