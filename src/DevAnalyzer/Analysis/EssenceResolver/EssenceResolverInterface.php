<?php

namespace DevAnalyzer\Analysis\EssenceResolver;

use DevAnalyzer\Model\Analysis\Essence;
use DevAnalyzer\Model\Analysis\ProviderSummaryReport;

interface EssenceResolverInterface
{
    /**
     * Tries to resolve developer essence from provider reports.
     *
     * @param ProviderSummaryReport $providerReports
     *
     * @return Essence
     */
    public function resolve(array $providerReports);
} 