<?php

namespace DevAnalyzer\Provider\Github\Model\Analysis;

use DevAnalyzer\Model\Analysis\ProviderSummaryReport;

class GithubSummaryReport extends ProviderSummaryReport
{
    private $createdAt;

    private $publicRepoCount;

    private $followers;

    /**
     * @param mixed $createdAt
     *
     * @return GithubSummaryReport
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return mixed
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * @param mixed $followers
     *
     * @return GithubSummaryReport
     */
    public function setFollowers($followers)
    {
        $this->followers = $followers;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublicRepoCount()
    {
        return $this->publicRepoCount;
    }

    /**
     * @param mixed $publicRepoCount
     *
     * @return GithubSummaryReport
     */
    public function setPublicRepoCount($publicRepoCount)
    {
        $this->publicRepoCount = $publicRepoCount;

        return $this;
    }
}