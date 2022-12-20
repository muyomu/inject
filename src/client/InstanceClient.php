<?php

namespace muyomu\inject\client;

interface InstanceClient
{
    public function getInstance(string $className):object;
}