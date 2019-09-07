<?php declare(strict_types=1);
/**
 * @author  Jonas Hartmann <mail@inoas.com>
 * @license For full copyright and license information, please see the LICENSE.txt.
 * @since   1.0.0
 */

return [
    /**
     * Debug Level:
     *
     * Production Mode:
     * false: No error messages, errors, or warnings shown.
     *
     * Development Mode:
     * true: Errors and warnings shown.
     */
    'debug' => filter_var(env('DEBUG', true), FILTER_VALIDATE_BOOLEAN),

    /*
     * Security and encryption configuration
     *
     * - salt - A random string used in security hashing methods.
     *   The salt value is also used as the encryption key.
     *   You should treat it as extremely sensitive data.
     */
    'Security' => [
        'salt' => env('SECURITY_SALT', '__REPLACE_ME_FOR_PRODUCTION__'),
    ],

    /*
     * Connection information used by the ORM to connect
     * to your application's datastores.
     *
     * ### Notes
     * - Drivers include Mysql Postgres Sqlite Sqlserver
     *   See vendor\cakephp\cakephp\src\Database\Driver for complete list
     * - Do not use periods in database name - it may lead to error.
     *   See https://github.com/cakephp/cakephp/issues/6471 for details.
     * - 'encoding' is recommended to be set to full UTF-8 4-Byte support.
     *   E.g set it to 'utf8mb4' in MariaDB and MySQL and 'utf8' for any
     *   other RDBMS.
     */
    'Datasources' => [
        'default' => [
            'host' => 'mariadb-cake',
            'log' => false,
        ],
    ],

    /*
     * Configure the cache adapters.
     */
    'Cache' => [
        'default' => [
            'className' => \Cake\Cache\Engine\RedisEngine::class,
            'serialize' => true, // 'php' for MemcachedEngine, literal true for FileEngine or RedisEngine
            //'servers' => ['localhost'], // List of Memcached servers, usually ['localhost'] for production, ['memcached-cake:11212'] for Docker env
            'host' => 'redis-cake', // Redis host
            'port' => 16379, // Redis port, usually 16379 for dev and 6379 for prod
        ],

        /*
         * Configure the cache used for general framework caching.
         * Translation cache files are stored with this configuration.
         * If you set 'className' => 'Null' core cache will be disabled.
         */
        '_cake_core_' => [
            'className' => \Cake\Cache\Engine\MemcachedEngine::class,
            'servers' => ['memcached-cake:11212'], // List of Memcached servers, usually 'localhost' for production, 'memcached-cake:11212' for Docker env
            'serialize' => 'php', // 'php' for MemcachedEngine, literal true for FileEngine
        ],

        /*
         * Configure the cache for model and datasource caches. This cache
         * configuration is used to store schema descriptions, and table listings
         * in connections.
         */
        '_cake_model_' => [
            'className' => \Cake\Cache\Engine\MemcachedEngine::class,
            'servers' => ['memcached-cake:11212'], // List of Memcached servers, usually 'localhost' for production, 'memcached-cake:11212' for Docker env
            'serialize' => 'php', // 'php' for MemcachedEngine, literal true for FileEngine
        ],

        /*
         * Configure the cache for routes. The cached routes collection is built the
         * first time the routes are processed via `config/routes.php`.
         */
        '_cake_routes_' => [
            'className' => \Cake\Cache\Engine\MemcachedEngine::class,
            'servers' => ['memcached-cake:11212'], // List of Memcached servers, usually 'localhost' for production, 'memcached-cake:11212' for Docker env
            'serialize' => 'php', // 'php' for MemcachedEngine, literal true for FileEngine
        ],

        /*
         * Configure the cache for flexi flat cms routes.
         */
        'flexi_flat_cms' => [
            'className' => \Cake\Cache\Engine\RedisEngine::class,
            'serialize' => true, // 'php' for MemcachedEngine, literal true for FileEngine or RedisEngine
            //'servers' => ['localhost'], // List of Memcached servers, usually ['localhost'] for production, ['memcached-cake:11212'] for Docker env
            'host' => 'redis-cake', // Redis host
            'port' => 16379, // Redis port, usually 16379 for dev and 6379 for prod
        ],
    ],

    /*
     * Email configuration.
     *
     * By defining transports separately from delivery profiles you can easily
     * re-use transport configuration across multiple profiles.
     *
     * You can specify multiple configurations for production, development and
     * testing.
     *
     * Each transport needs a `className`. Valid options are as follows:
     *
     *  Mail   - Send using PHP mail function
     *  Smtp   - Send using SMTP
     *  Debug  - Do not send the email, just return the result
     *
     * You can add custom transports (or override existing transports) by adding the
     * appropriate file to src/Mailer/Transport. Transports should be named
     * 'YourTransport.php', where 'Your' is the name of the transport.
     */
    'EmailTransport' => [
        'default' => [
            'className' => Cake\Mailer\Transport\SmtpTransport::class,
            /*
             * The following keys are used in SMTP transports:
             */
            'host' => 'mailhog-cake', // probably 'localhost' for production
            'port' => 1026, // probably 25 for production, 1026 for docker / on docker: http://domain:8026 for mailhog UI
        ],
    ],
];
