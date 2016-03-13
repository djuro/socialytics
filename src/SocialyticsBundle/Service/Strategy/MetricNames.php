<?php

namespace SocialyticsBundle\Service\Strategy;

/**
 * Enumerator class, documents Twitter metric names
 *
 * @author djuro
 */
class MetricNames
{
    const TWITTER_FOLLOWERS = 'Twitter followers';
    
    const TWITTER_FRIENDS = 'Twitter following';
    
    //const TWEETS = 'Tweets';
    
    //const RETWEETS = 'Retweets';
    
    private static $names = [
                        'TWITTER_FOLLOWERS' => self::TWITTER_FOLLOWERS,
                        'TWITTER_FRIENDS' => self::TWITTER_FRIENDS,
                        //'TWEETS' => self::TWEETS,
                        //'RETWEETS' => self::RETWEETS
    ];
    
    public static function names()
    {
        return self::$names;
    }
}
