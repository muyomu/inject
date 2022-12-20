<?php

namespace muyomu\inject\config;

use muyomu\config\annotation\Configuration;
use muyomu\config\GenericConfig;

#[Configuration("muyomu_inject")]
class InjectDefaultConfig extends GenericConfig
{
    protected string $configClass=self::class;

    protected array $configData = [];
}