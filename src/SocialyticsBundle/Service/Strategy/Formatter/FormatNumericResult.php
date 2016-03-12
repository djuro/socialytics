<?php

namespace SocialyticsBundle\Service\Strategy\Formatter;

use \stdClass;

/**
 * 
 * @author djuro
 */
class FormatNumericResult implements FormatterInterface
{

    public function formatResult(stdClass $retrievedData)
    {
        $ids = $retrievedData->ids;
        
        return count($ids);
    }
}
