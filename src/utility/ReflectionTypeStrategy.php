<?php

namespace muyomu\inject\utility;

use muyomu\inject\annotation\AutoWired;
use muyomu\inject\annotation\Value;
use muyomu\inject\client\InstanceClient;
use ReflectionClass;
use ReflectionException;

class ReflectionTypeStrategy implements InstanceClient
{
    private string $status;

    /**
     * @param string $status
     */
    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @throws ReflectionException
     */
    public function getInstance(mixed $classOrInstance): object
    {
        if ($this->status == "string"){
            return $this->getInstanceWithNoInstance($classOrInstance);
        }else{
            return $this->getInstanceWithInstance($classOrInstance::class,$classOrInstance);
        }
    }

    /**
     * @throws ReflectionException
     */
    public function getInstanceWithNoInstance(string $className): object
    {
        class_exists($className);

        $reflectionClass = new ReflectionClass($className);

        $reflectionInstance = $reflectionClass->newInstance();

        $properties = $reflectionClass->getProperties();

        if (!empty($properties)){

            foreach ($properties as $property){
                $type = $property->getType()->getName();
                $attributes = $property->getAttributes();
                if (!in_array($type,array("string","int","bool","flot"))){
                    foreach ($attributes as $attribute) {
                        $attrName = $attribute->getName();
                        if ($attrName == AutoWired::class) {
                            $value  = $attribute->newInstance()->getValue();
                            $this->getInstanceWithInstance($value,$property,$reflectionInstance);
                        }
                    }
                }else{
                    foreach ($attributes as $attribute){
                        $attrName = $attribute->getName();
                        if ($attrName == Value::class){
                            $value  = $attribute->newInstance()->getValue();
                            $property->setValue($reflectionInstance,$value);
                        }
                    }
                }
            }
        }
        return $reflectionInstance;
    }

    /**
     * @throws ReflectionException
     */
    public function getInstanceWithInstance(string $className,\ReflectionProperty $reflectionProperty, object $instance): void
    {
        $object = $this->getInstanceWithNoInstance($className);
        $reflectionProperty->setValue($instance,$object);
    }
}