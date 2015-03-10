<?php

namespace DevAnalyzer\Provider\Dummy;

use DevAnalyzer\Model\Analysis\Essence;
use DevAnalyzer\Model\Analysis\ProviderSummaryReport;
use DevAnalyzer\Model\Developer;
use DevAnalyzer\Model\Search\DeveloperProviderResult;
use DevAnalyzer\Model\Search\DeveloperQuery;
use DevAnalyzer\Provider\DeveloperProviderInterface;

class DummyProvider implements DeveloperProviderInterface
{
    /**
     * Unique provider name for system.
     *
     * @return string
     */
    public function getName()
    {
        return 'dummy';
    }

    /**
     * Searches developers via specified query.
     *
     * @param DeveloperQuery $searchQuery
     * @param int $limit
     *
     * @return DeveloperProviderResult
     */
    public function search(DeveloperQuery $searchQuery, $limit = 10)
    {
        $developers = [];
        for ($i = 0; $i <= mt_rand(10, 20); $i++) {
            $developers[] = (new Developer(uniqid(), $this->getName()))
                ->setFullName(uniqid('fullName_'))
                ->setPhoneNumber(uniqid('phoneNumber_'))
                ->setAge(uniqid('age_'))
                ->setNickName(uniqid('nickname_'))
                ->setEmail(uniqid('email_'))
            ;
        }

        return new DeveloperProviderResult($this->getName(), array_slice($developers, 0, $limit));
    }

    /**
     * Analyzes developer and builds summary report.
     *
     * @param string $developerId
     *
     * @return ProviderSummaryReport
     */
    public function analyzeAndBuildSummaryReport($developerId)
    {
        $providerReport = new ProviderSummaryReport($this->getName());
        $providerReport->setEssence(new Essence('Very cool developer'));

        return $providerReport;
    }
} 