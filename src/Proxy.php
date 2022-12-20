<?php

namespace muyomu\inject;
use muyomu\inject\client\ProxyClient;
use muyomu\inject\utility\ReflectionTypeStrategy;

class Proxy implements ProxyClient
{
    private ReflectionTypeStrategy $reflectionTypeStrategy;

    public function __construct()
    {
        $this->reflectionTypeStrategy = new ReflectionTypeStrategy();
    }

    public function getProxyInstance(mixed $classOrInstance): object
    {
        $type = gettype($classOrInstance);
        $this->reflectionTypeStrategy->setStatus($type);
        return $this->reflectionTypeStrategy->getInstance($classOrInstance);
    }
}