<?php

namespace DevAnalyzer\Provider\Github;

use DevAnalyzer\Model\Analysis\Essence;
use DevAnalyzer\Model\Search\DeveloperProviderResult;
use DevAnalyzer\Model\Search\DeveloperQuery as SearchDeveloperQuery;
use DevAnalyzer\Provider\DeveloperProviderInterface;
use DevAnalyzer\Provider\Github\Model\GithubDeveloper;
use DevAnalyzer\Provider\Github\Model\Analysis\GithubSummaryReport;
use Github\Client;

class GithubDeveloperProvider implements DeveloperProviderInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * {@inheritdoc}
     */
    public function search(SearchDeveloperQuery $searchDeveloperQuery, $limit = 10)
    {
        $searchKeyword = $this->extractKeywordFromQuery($searchDeveloperQuery);
        if (empty($searchKeyword)) {
            return new DeveloperProviderResult($this->getName(), []);
        }

        $result = $this->client->users()->find($searchKeyword);

        $developers = [];
        foreach ($result['users'] as $user) {
            $developers[] = $this->createDeveloperFromUser($user);
        }

        return new DeveloperProviderResult($this->getName(), $developers);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'github';
    }

    /**
     * {@inheritdoc}
     */
    public function analyzeAndBuildSummaryReport($developerId)
    {
        $summarySentence = '';

        $result = $this->client->user()->find($developerId);
        $user = $result['users'][0];

        switch (true) {
            case ($user['public_repo_count'] < 5):
                $summarySentence = 'Junior';
                break;
            case ($user['public_repo_count'] < 20):
                $summarySentence = 'Middle';
                break;
            case ($user['public_repo_count'] < 1000):
                $summarySentence = 'Senior';
                break;
            default:
                $summarySentence = 'God';
                break;
        }

        return (new GithubSummaryReport())
            ->setEssence(new Essence($summarySentence))
            ->setCreatedAt($user['created_at'])
            ->setPublicRepoCount($user['public_repo_count'])
            ->setFollowers($user['followers'])
        ;
    }

    /**
     * @param array $user
     */
    private function createDeveloperFromUser(array $user)
    {
        // username is unique id
        return (new GithubDeveloper($user['username'], $this->getName()))
            ->setFullName($user['fullname'])
            ->setLocation(isset($user['location']) ? $user['location'] : '')
            ->setNickName($user['username'])
            ->setLanguage(isset($user['language']) ? $user['language'] : '')
        ;
    }

    private function extractKeywordFromQuery(SearchDeveloperQuery $searchDeveloperQuery)
    {
        if ($searchDeveloperQuery->getNickname()) {
            return $searchDeveloperQuery->getNickname();
        }

        if ($searchDeveloperQuery->getFullName()) {
            return $searchDeveloperQuery->getFullName();
        }

        if ($searchDeveloperQuery->getEmail()) {
            return $searchDeveloperQuery->getEmail();
        }

        if ($searchDeveloperQuery->getLocation()) {
            return $searchDeveloperQuery->getLocation();
        }

        return $searchDeveloperQuery->getPhoneNumber();
    }
}