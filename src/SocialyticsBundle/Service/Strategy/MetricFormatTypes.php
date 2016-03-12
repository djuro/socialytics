<?php

namespace SocialyticsBundle\Service\Strategy;

/**
 * Enumerator class, documents Twitter metric format types
 *
 * @author djuro
 */
class MetricFormatTypes
{
    const NUMERIC = 'Numeric';
    
    const GRAPH = 'Graphic';
    
    
    private static $names = [
                        'NUMERIC' => self::NUMERIC,
                        'GRAPH' => self::GRAPH,
    ];
    
    public static function names()
    {
        return self::$names;
    }
    
    public function name($key)
    {
        return self::$names[$key];
    }
}
