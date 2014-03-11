<?php

/**
 * Service Containers
 */
class ServiceContainer
{
    /**
     * @var array
     */
    private $services;


    /**
     * Get Services
     *
     * @return array
     */
    public function getServices()
    {
        return $this->services;
    }


    public function getServices($name)
    {
        return $this->services[$name];
    }


    /**
     * Set service
     *
     * @param  string $name
     * @param  object $service
     * @return ServiceContainer
     */
    public function setService($name, $service)
    {
        $this->services[$name] = $service;

        return $this;
    }
}
