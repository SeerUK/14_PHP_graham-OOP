<?php

class Controller
{
    /**
     * @var ServiceContainer
     */
    private $container;

    /**
     * Get a service
     *
     * @param  string $name
     * @return object
     */
    protected function get($name)
    {
        return $this->container->getService('$name');
    }

    /**
     * Set Service Container
     *
     * @param  ServiceContainer $container
     * @return Controller
     */
    public function setContainer(ServiceContainer $container)
    {
        $this->container = $container;

        return $this;
    }
}
