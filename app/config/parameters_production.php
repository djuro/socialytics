<?php

$db = parse_url(getenv('CLEARDB_DATABASE_URL'));

    $container->setParameter('database_driver', 'pdo_mysql');
    $container->setParameter('database_host', $db['host']);
    $container->setParameter('database_port', $db['port']);
    $container->setParameter('database_name', substr($db["path"], 1));
    $container->setParameter('database_user', $db['user']);
    $container->setParameter('database_password', $db['pass']);
    $container->setParameter('secret', getenv('SECRET'));
    $container->setParameter('locale', 'en');
    $container->setParameter('mailer_transport', null);
    $container->setParameter('mailer_host', null);
    $container->setParameter('mailer_user', null);
    $container->setParameter('mailer_password', null);
    $container->setParameter('twitter_access_token','55793305-T5DxxlRcLHkqLR7AJieBCuE5u1ynnQmXHjb9Tlyhj');
    $container->setParameter('twitter_token_secret','sunqh8Wm62gLgW8uvkk65Gx616AOPupDrSv8Gyccj8eHH');
    $container->setParameter('twitter_consumer_key','WjdCnrFSf9Odp23p6AJNLgeuI');
    $container->setParameter('twitter_consumer_secret','jLti0fnxELG9Ik6lHYHuUVDSsn7UvoQoOedQtObEJDEHMoatBg');
