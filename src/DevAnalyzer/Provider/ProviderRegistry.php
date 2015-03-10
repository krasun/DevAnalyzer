<?php

namespace DevAnalyzer\Provider;

class ProviderRegistry 
{
    /**
     * @var array
     */
    private $providers = [];

    public function registerProvider(DeveloperProviderInterface $provider)
    {
        $this->providers[$provider->getName()] = $provider;

        return $this;
    }

    public function all()
    {
        return $this->providers;
    }

    public function get($providerName)
    {
        if (isset($this->providers[$providerName])) {
            return $this->providers[$providerName];
        }

        return null;
    }
} 