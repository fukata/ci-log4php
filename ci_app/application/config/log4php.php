<?php
return array(
    'rootLogger' => array(
        'level' => 'DEBUG',
        'appenders' => array('default'),
    ),
    'appenders' => array(
        'default' => array(
            'class' => 'LoggerAppenderDailyFile',
            'layout' => array(
                'class' => 'LoggerLayoutPattern',
                'params' => array(
                    'conversionPattern' => "%d [%p] %c: %m (at %F line %L)%n"
                )

            ),
            'params' => array(
                'file' => '/tmp/my.log',
                'datePattern' => 'YmdH',
                'append' => true
            )
        )
    )
);
