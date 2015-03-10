<?php

namespace DevAnalyzer\Model\Analysis;

class SummaryReport 
{
    /**
     * @var Essence
     */
    private $essence;

    /**
     * @var array|ProviderSummaryReport[]
     */
    private $providerReports;

    /**
     * @param Essence $essence
     * @param ProviderSummaryReport[] $providerReports
     */
    public function __construct(Essence $essence, array $providerReports)
    {
        $this->essence = $essence;
        $this->providerReports = $providerReports;
    }

    /**
     * @return Essence
     */
    public function getEssence()
    {
        return $this->essence;
    }

    /**
     * @return array|ProviderSummaryReport[]
     */
    public function getProviderReports()
    {
        return $this->providerReports;
    }

    /**
     * @return bool
     */
    public function isEmpty()
    {
        return count($this->providerReports) == 0;
    }
} 