<?php

namespace DevAnalyzer\Analysis\EssenceResolver;

use DevAnalyzer\Model\Analysis\Essence;
use DevAnalyzer\Model\Analysis\ProviderSummaryReport;

class SimpleConcatenationEssenceResolver implements EssenceResolverInterface
{
    /**
     * Just concatenates provider report essences.
     *
     * @param ProviderSummaryReport $providerReports
     *
     * @return Essence
     */
    public function resolve(array $providerReports)
    {
        $providerSummarySentences = array_filter(array_map(function (ProviderSummaryReport $r) {
            return ucfirst(trim(
                ($essence = $r->getEssence()) ? $essence->getSummarySentence() : ''
            ));
        }, $providerReports));

        $summarySentence = join('. ', $providerSummarySentences);
        if (! empty($summarySentence)) {
            $summarySentence .= '.';
        }

        return new Essence($summarySentence);
    }
} 