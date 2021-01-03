<?php

namespace ReadableOnlyProperties\Exceptions;

use Exception;

class PropertyNotFoundException extends Exception
{
    protected $message = 'Property not found in class';
}
