<?php

namespace DevAnalyzer\Model\Analysis;

class ProviderSummaryReport 
{
    /**
     * @var Essence
     */
    private $essence;

    /**
     * @param Essence $essence
     *
     * @return ProviderSummaryReport
     */
    public function setEssence($essence)
    {
        $this->essence = $essence;

        return $this;
    }

    /**
     * @return Essence
     */
    public function getEssence()
    {
        return $this->essence;
    }
}