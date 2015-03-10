<?php

namespace DevAnalyzer\Analysis;

use DevAnalyzer\Analysis\EssenceResolver\EssenceResolverInterface;
use DevAnalyzer\Model\Analysis\DeveloperQuery;
use DevAnalyzer\Model\Analysis\SummaryReport;
use DevAnalyzer\Provider\DeveloperProviderInterface;
use DevAnalyzer\Provider\ProviderRegistry;

class Analyzer
{
    /**
     * @var ProviderRegistry
     */
    private $providerRegistry;

    /**
     * @var EssenceResolverInterface
     */
    private $essenceResolver;

    /**
     * @param ProviderRegistry $providerRegistry
     */
    public function __construct(ProviderRegistry $providerRegistry, EssenceResolverInterface $essenceResolver)
    {
        $this->providerRegistry = $providerRegistry;
        $this->essenceResolver = $essenceResolver;
    }

    /**
     * Analyzes developer via specified query and builds summary report.
     *
     * @param DeveloperQuery $analysisQuery
     *
     * @return SummaryReport
     */
    public function analyzeAndBuildSummaryReport(DeveloperQuery $analysisQuery)
    {
        $providerReports = [];
        foreach ($analysisQuery->getDeveloperIds() as $providerName => $developerId) {
            /** @var DeveloperProviderInterface $provider */
            if ($provider = $this->providerRegistry->get($providerName)) {
                $providerReports[$providerName] = $provider->analyzeAndBuildSummaryReport($developerId);
            }
        }

        $summaryEssence = $this->essenceResolver->resolve($providerReports);
        $summaryReport = new SummaryReport($summaryEssence, $providerReports);

        return $summaryReport;
    }
} 