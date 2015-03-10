<?php

namespace DevAnalyzer\Provider;

use DevAnalyzer\Model\Analysis\ProviderSummaryReport;
use DevAnalyzer\Model\Search\DeveloperQuery as SearchDeveloperQuery;
use DevAnalyzer\Model\Search\DeveloperProviderResult;

/**
 * Provides information about developers.
 */
interface DeveloperProviderInterface
{
    /**
     * Unique provider name for system.
     *
     * @return string
     */
    public function getName();

    /**
     * Searches developers via specified query.
     *
     * @param SearchDeveloperQuery $searchDeveloperQuery
     * @parma int $limit
     *
     * @return DeveloperProviderResult
     */
    public function search(SearchDeveloperQuery $searchDeveloperQuery, $limit = 10);

    /**
     * Analyzes developer and builds summary report.
     *
     * @param string $developerId
     *
     * @return ProviderSummaryReport
     */
    public function analyzeAndBuildSummaryReport($developerId);
} 