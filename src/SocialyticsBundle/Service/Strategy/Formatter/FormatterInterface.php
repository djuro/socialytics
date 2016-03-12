<?php

namespace SocialyticsBundle\Service\Strategy\Formatter;

use \stdClass;

/**
 * Defines behaviors of concrete Formatter class implementations.
 * 
 * @author djuro
 */
interface FormatterInterface
{
    public function formatResult(stdClass $retrievedData);
}
