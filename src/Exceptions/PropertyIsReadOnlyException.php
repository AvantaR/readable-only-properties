<?php

namespace ReadableOnlyProperties\Exceptions;

use Exception;

class PropertyIsReadOnlyException extends Exception
{
    protected $message = 'Property is read only';
}
