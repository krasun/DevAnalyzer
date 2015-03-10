<?php

namespace DevAnalyzer\Controller;

use DevAnalyzer\Analysis\Analyzer;
use DevAnalyzer\Mapper\ArrayMapper;
use DevAnalyzer\Model\Analysis\DeveloperQuery as AnalysisDeveloperQuery;
use DevAnalyzer\Model\Search\DeveloperQuery as SearchDeveloperQuery;
use DevAnalyzer\Search\SearchEngine;
use Symfony\Component\HttpFoundation\Request;

class DevAnalyzerController
{
    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * @var Analyzer
     */
    private $analyzer;
    /**
     * @var ArrayMapper
     */
    private $mapper;
    /**
     * @var SearchEngine
     */
    private $searchEngine;

    public function __construct(
        SearchEngine $searchEngine,
        Analyzer $analyzer,
        \Twig_Environment $twig,
        ArrayMapper $mapper
    )
    {
        $this->twig = $twig;
        $this->analyzer = $analyzer;
        $this->mapper = $mapper;
        $this->searchEngine = $searchEngine;
    }

    public function searchAction(Request $request)
    {
        /** @var SearchDeveloperQuery $searchQuery */
        $searchQuery = $this->mapper->createFromArray(SearchDeveloperQuery::class, $request->query->all());
        $limit = $request->query->getInt('limit', 5);

        $searchResult = null;
        if ($valid = $searchQuery->isValid()) {
            $searchResult = $this->searchEngine->search($searchQuery, $limit);
        }

        return $this->twig->render(
            'index.html.twig',
            compact('valid', 'limit', 'searchQuery', 'searchResult')
        );
    }

    public function reportAction(Request $request)
    {
        $analysisQuery = new AnalysisDeveloperQuery($request->query->get('developer', []));

        $summaryReport = null;
        if ($valid = $analysisQuery->isValid()) {
            $summaryReport = $this->analyzer->analyzeAndBuildSummaryReport($analysisQuery);
        }

        return $this->twig->render(
            'summary_report.html.twig',
            compact('valid', 'summaryReport')
        );

    }
} 