<?php

namespace DevAnalyzer\Search;

use DevAnalyzer\Model\Search\DeveloperQuery;
use DevAnalyzer\Model\Search\SearchResult;
use DevAnalyzer\Provider\DeveloperProviderInterface;
use DevAnalyzer\Provider\ProviderRegistry;

class SearchEngine
{
    /**
     * @var ProviderRegistry
     */
    private $providerRegistry;

    public function __construct(ProviderRegistry $providerRegistry)
    {
        $this->providerRegistry = $providerRegistry;
    }

    /**
     * Registers new provider.
     *
     * @param DeveloperProviderInterface $provider
     *
     * @return DeveloperProviderInterface
     */
    public function registerProvider(DeveloperProviderInterface $provider)
    {
        $this->providers[$provider->getName()] = $provider;

        return $this;
    }

    /**
     * Search players over all registered developer providers
     * and then returns merged result.
     *
     * @param DeveloperQuery $query
     * @param int $limit
     *
     * @return \DevAnalyzer\Model\Search\SearchResult
     */
    public function search(DeveloperQuery $query, $limit = 10)
    {
        $results = [];
        /** @var DeveloperProviderInterface $provider */
        foreach ($this->providerRegistry->all() as $providerName => $provider) {
            $results[$providerName] = $provider->search($query, $limit);
        }

        return new SearchResult($results);
    }
} 