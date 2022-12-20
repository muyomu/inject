<?php

namespace muyomu\inject\client;

use ReflectionClass;
use ReflectionProperty;

interface InstanceClient
{
    public function getInstance(mixed $classOrInstance):object;

    public function getInstanceWithNoInstance(string $className):object;

    public function getInstanceWithInstance(string $className, ReflectionProperty $reflectionProperty, object $instance):void;
}