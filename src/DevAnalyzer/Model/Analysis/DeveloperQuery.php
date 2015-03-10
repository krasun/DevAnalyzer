<?php

namespace DevAnalyzer\Model\Analysis;

class DeveloperQuery
{
    /**
     * @var array
     */
    private $developerIds;

    public function __construct(array $developerIds)
    {
        $this->developerIds = $developerIds;
    }

    public function isValid()
    {
        return count($this->developerIds);
    }

    /**
     * @return array
     */
    public function getDeveloperIds()
    {
        return $this->developerIds;
    }

    /**
     * @param array $developerIds
     *
     * @return DeveloperQuery
     */
    public function setDeveloperIds($developerIds)
    {
        $this->developerIds = $developerIds;

        return $this;
    }
} 