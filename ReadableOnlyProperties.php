<?php

trait ReadableOnlyProperties
{
    public function __get($property)
    {
        if (!property_exists($this, $property)) {
            throw new Exception(sprintf('Property %s not found', $property));
        }

        return $this->$property;
    }

    public function __set($property, $value)
    {
        if (!property_exists($this, $property)) {
            throw new Exception(sprintf('Property %s not found', $property));
        }
        
        throw new Exception(sprintf('Property %s is read only', $property));
    }
}