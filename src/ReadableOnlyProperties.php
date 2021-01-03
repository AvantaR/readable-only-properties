<?php

namespace ReadableOnlyProperties;

use ReadableOnlyProperties\Exceptions\PropertyNotFoundException;
use ReadableOnlyProperties\Exceptions\PropertyIsReadOnlyException;

trait ReadableOnlyProperties
{
    public function __get($property)
    {
        if (!property_exists($this, $property)) {
            throw new PropertyNotFoundException(sprintf('Property %s not found', $property));
        }

        return $this->$property;
    }

    public function __set($property, $value)
    {
        if (!property_exists($this, $property)) {
            throw new PropertyNotFoundException(sprintf('Property %s not found', $property));
        }

        throw new PropertyIsReadOnlyException(sprintf('Property %s is read only', $property));
    }

    public function __isset($property)
    {
        if (!property_exists($this, $property)) {
            throw new PropertyNotFoundException(sprintf('Property %s not found', $property));
        }
    }
}
