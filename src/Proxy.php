<?php

namespace muyomu\inject;
use muyomu\inject\client\ProxyClient;

class Proxy implements ProxyClient
{
    public function getProxyInstance(mixed $classOrInstance): object
    {
        $type = gettype($classOrInstance);
    }
}