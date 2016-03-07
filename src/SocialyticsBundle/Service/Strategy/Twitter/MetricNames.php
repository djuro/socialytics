<?php

namespace SocialyticsBundle\Service\Strategy\Twitter;

/**
 * Enumerator class, documents Twitter metric names
 *
 * @author djuro
 */
class MetricNames
{
    const FOLLOWERS = 'Twitter followers';
    
    const FRIENDS = 'Twitter friends';
    
    const TWEETS = 'Tweets';
    
    const RETWEETS = 'Retweets';
    
    private static $names = [
                        'FOLLOWERS' => self::FOLLOWERS,
                        'FRIENDS' => self::FRIENDS,
                        'TWEETS' => self::TWEETS,
                        'RETWEETS' => self::RETWEETS
    ];
    
    public static function names()
    {
        return self::$names;
    }
}
