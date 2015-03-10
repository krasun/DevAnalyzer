<?php

// Initialize container
$app = new Silex\Application([
    'debug' => true
]);

$parameters = require_once __DIR__.'/../app/parameters.php';
// Copy parameters to container
foreach ($parameters as $key => $value) {
    $app[$key] = $value;
}

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../app/views',
));
$app->register(new Silex\Provider\UrlGeneratorServiceProvider());

$app['mapper'] = function () {
    return new \DevAnalyzer\Mapper\ArrayMapper();
};

$app['provider_registry'] = function ($c) {
    $registry = new \DevAnalyzer\Provider\ProviderRegistry();
    $registry
        ->registerProvider($c['dummy_provider'])
        ->registerProvider($c['github_provider'])
    ;

    return $registry;
};

$app['dummy_provider'] = function () {
    return new \DevAnalyzer\Provider\Dummy\DummyProvider();
};

$app['github_provider'] = function ($c) {
    return new \DevAnalyzer\Provider\Github\GithubDeveloperProvider($c['github_api']);
};

$app['search_engine'] = function ($c) {
    return new \DevAnalyzer\Search\SearchEngine($c['provider_registry']);
};

$app['essence_resolver'] = function ($c) {
    return new \DevAnalyzer\Analysis\EssenceResolver\SimpleConcatenationEssenceResolver();
};

$app['analyzer'] = function ($c) {
    return new \DevAnalyzer\Analysis\Analyzer($c['provider_registry'], $c['essence_resolver']);
};

$app['github_api'] = function ($c) {
    $github = new \Github\Client();
    $github->authenticate($c['github_api_token'], \Github\Client::AUTH_URL_TOKEN);

    return $github;
};

$app['controller'] = function ($c) {
    return new \DevAnalyzer\Controller\DevAnalyzerController(
        $c['search_engine'],
        $c['analyzer'],
        $c['twig'],
        $c['mapper']
    );
};

// Do not remove this line!
return $app;