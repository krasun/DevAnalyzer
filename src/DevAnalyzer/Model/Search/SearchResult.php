<?php

namespace DevAnalyzer\Model\Search;

class SearchResult
{
    /**
     * @param DeveloperProviderResult[] $results
     */
    private $results;

    /**
     * @var bool
     */
    private $isEmpty;

    /**
     * @param DeveloperProviderResult[] $results
     */
    public function __construct(array $results)
    {
        $this->results = $results;

        $hasAtLeastOneProviderWithDevelopers = count(array_filter($results, function (DeveloperProviderResult $r) {
            return count($r->getDevelopers()) > 0;
        })) > 0;
        $this->isEmpty = ! $hasAtLeastOneProviderWithDevelopers;
    }

    public function getProviderNames()
    {
        return array_keys($this->results);
    }

    public function getResultByProviderName($providerName)
    {
        if (! isset($this->results[$providerName])) {
            return null;
        }

        return $this->results[$providerName];
    }

    /**
     * @return boolean
     */
    public function isEmpty()
    {
        return $this->isEmpty;
    }
} 