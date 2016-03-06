<?php

namespace SocialyticsBundle\Service\Strategy;

/**
 * Defines behaviors of formatting a metric result in a particular way.
 * 
 * @author djuro
 */
interface Formatter
{
    public function formatResult();
}
