<?php return array (
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => '12',
      'verify' => true,
      'limit' => NULL,
    ),
    'argon' => 
    array (
      'memory' => 65536,
      'threads' => 1,
      'time' => 4,
      'verify' => true,
    ),
    'rehash_on_login' => true,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/home/hamas/coding/TLC/resources/views',
    ),
    'compiled' => '/home/hamas/coding/TLC/storage/framework/views',
  ),
  'concurrency' => 
  array (
    'default' => 'process',
  ),
  'cors' => 
  array (
    'paths' => 
    array (
      0 => 'api/*',
      1 => 'sanctum/csrf-cookie',
    ),
    'allowed_methods' => 
    array (
      0 => '*',
    ),
    'allowed_origins' => 
    array (
      0 => '*',
    ),
    'allowed_origins_patterns' => 
    array (
    ),
    'allowed_headers' => 
    array (
      0 => '*',
    ),
    'exposed_headers' => 
    array (
    ),
    'max_age' => 0,
    'supports_credentials' => false,
  ),
  'app' => 
  array (
    'name' => 'Teaching and Learning Certification',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'frontend_url' => 'http://localhost:3000',
    'asset_url' => NULL,
    'timezone' => 'Asia/Jakarta',
    'locale' => 'id',
    'fallback_locale' => 'en',
    'faker_locale' => 'en_US',
    'cipher' => 'AES-256-CBC',
    'key' => 'base64:NbS2atocbAdv6T2Bjs4luClLvp2uNr4Ogs8zpfuPRhs=',
    'previous_keys' => 
    array (
    ),
    'maintenance' => 
    array (
      'driver' => 'file',
      'store' => 'database',
    ),
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Concurrency\\ConcurrencyServiceProvider',
      6 => 'Illuminate\\Cookie\\CookieServiceProvider',
      7 => 'Illuminate\\Database\\DatabaseServiceProvider',
      8 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      9 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      10 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      11 => 'Illuminate\\Hashing\\HashServiceProvider',
      12 => 'Illuminate\\Mail\\MailServiceProvider',
      13 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      14 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      15 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      16 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      17 => 'Illuminate\\Queue\\QueueServiceProvider',
      18 => 'Illuminate\\Redis\\RedisServiceProvider',
      19 => 'Illuminate\\Session\\SessionServiceProvider',
      20 => 'Illuminate\\Translation\\TranslationServiceProvider',
      21 => 'Illuminate\\Validation\\ValidationServiceProvider',
      22 => 'Illuminate\\View\\ViewServiceProvider',
      23 => 'App\\Providers\\AppServiceProvider',
      24 => 'App\\Providers\\MidtransServiceProvider',
      25 => 'App\\Providers\\RouteServiceProvider',
      26 => 'App\\Providers\\TelescopeServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Arr' => 'Illuminate\\Support\\Arr',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Benchmark' => 'Illuminate\\Support\\Benchmark',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Concurrency' => 'Illuminate\\Support\\Facades\\Concurrency',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Context' => 'Illuminate\\Support\\Facades\\Context',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'Date' => 'Illuminate\\Support\\Facades\\Date',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Http' => 'Illuminate\\Support\\Facades\\Http',
      'Js' => 'Illuminate\\Support\\Js',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Number' => 'Illuminate\\Support\\Number',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Process' => 'Illuminate\\Support\\Facades\\Process',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'RateLimiter' => 'Illuminate\\Support\\Facades\\RateLimiter',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schedule' => 'Illuminate\\Support\\Facades\\Schedule',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'Str' => 'Illuminate\\Support\\Str',
      'Uri' => 'Illuminate\\Support\\Uri',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Vite' => 'Illuminate\\Support\\Facades\\Vite',
    ),
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'sanctum' => 
      array (
        'driver' => 'sanctum',
        'provider' => NULL,
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_reset_tokens',
        'expire' => 60,
        'throttle' => 60,
      ),
    ),
    'password_timeout' => 10800,
  ),
  'broadcasting' => 
  array (
    'default' => 'log',
    'connections' => 
    array (
      'reverb' => 
      array (
        'driver' => 'reverb',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'host' => NULL,
          'port' => 443,
          'scheme' => 'https',
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => NULL,
        'secret' => NULL,
        'app_id' => NULL,
        'options' => 
        array (
          'cluster' => NULL,
          'useTLS' => true,
        ),
        'client_options' => 
        array (
        ),
      ),
      'ably' => 
      array (
        'driver' => 'ably',
        'key' => NULL,
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'database',
    'stores' => 
    array (
      'array' => 
      array (
        'driver' => 'array',
        'serialize' => false,
      ),
      'session' => 
      array (
        'driver' => 'session',
        'key' => '_cache',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'cache',
        'lock_connection' => NULL,
        'lock_table' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/home/hamas/coding/TLC/storage/framework/cache/data',
        'lock_path' => '/home/hamas/coding/TLC/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
        'lock_connection' => 'default',
      ),
      'dynamodb' => 
      array (
        'driver' => 'dynamodb',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'table' => 'cache',
        'endpoint' => NULL,
      ),
      'octane' => 
      array (
        'driver' => 'octane',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'stores' => 
        array (
          0 => 'database',
          1 => 'array',
        ),
      ),
    ),
    'prefix' => 'teaching_and_learning_certification_cache_',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'url' => NULL,
        'database' => 'tlc_new',
        'prefix' => '',
        'foreign_key_constraints' => true,
        'busy_timeout' => NULL,
        'journal_mode' => NULL,
        'synchronous' => NULL,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tlc_new',
        'username' => 'root',
        'password' => 'sandi123',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'mariadb' => 
      array (
        'driver' => 'mariadb',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tlc_new',
        'username' => 'root',
        'password' => 'sandi123',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => NULL,
        'options' => 
        array (
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tlc_new',
        'username' => 'root',
        'password' => 'sandi123',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'search_path' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'url' => NULL,
        'host' => '127.0.0.1',
        'port' => '3306',
        'database' => 'tlc_new',
        'username' => 'root',
        'password' => 'sandi123',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 
    array (
      'table' => 'migrations',
      'update_date_on_publish' => true,
    ),
    'redis' => 
    array (
      'client' => 'phpredis',
      'options' => 
      array (
        'cluster' => 'redis',
        'prefix' => 'teaching_and_learning_certification_database_',
        'persistent' => false,
      ),
      'default' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '0',
      ),
      'cache' => 
      array (
        'url' => NULL,
        'host' => '127.0.0.1',
        'username' => NULL,
        'password' => NULL,
        'port' => '6379',
        'database' => '1',
      ),
    ),
  ),
  'dompdf' => 
  array (
    'show_warnings' => true,
    'public_path' => NULL,
    'convert_entities' => true,
    'options' => 
    array (
      'font_dir' => '/home/hamas/coding/TLC/storage/fonts',
      'font_cache' => '/home/hamas/coding/TLC/storage/fonts',
      'temp_dir' => '/tmp',
      'chroot' => '/home/hamas/coding/TLC',
      'allowed_protocols' => 
      array (
        'data://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'file://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'http://' => 
        array (
          'rules' => 
          array (
          ),
        ),
        'https://' => 
        array (
          'rules' => 
          array (
          ),
        ),
      ),
      'artifactPathValidation' => NULL,
      'log_output_file' => NULL,
      'enable_font_subsetting' => false,
      'pdf_backend' => 'CPDF',
      'default_media_type' => 'screen',
      'default_paper_size' => 'a4',
      'default_paper_orientation' => 'landscape',
      'default_font' => 'arial',
      'fonts' => 
      array (
        'calibri' => 
        array (
          'normal' => '/home/hamas/coding/TLC/storage/fonts/calibri-bold-italic.ttf',
          'bold' => '/home/hamas/coding/TLC/storage/fonts/calibri-bold.ttf',
        ),
      ),
      'dpi' => 96,
      'enable_php' => false,
      'enable_javascript' => true,
      'enable_remote' => false,
      'allowed_remote_hosts' => NULL,
      'font_height_ratio' => 1.1,
      'enable_html5_parser' => true,
    ),
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'strict_null_comparison' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
        'output_encoding' => '',
        'test_auto_detect' => true,
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'ignore_empty' => false,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => NULL,
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'guess',
      ),
      'properties' => 
      array (
        'creator' => '',
        'lastModifiedBy' => '',
        'title' => '',
        'description' => '',
        'subject' => '',
        'keywords' => '',
        'category' => '',
        'manager' => '',
        'company' => '',
      ),
      'cells' => 
      array (
        'middleware' => 
        array (
        ),
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'cache' => 
    array (
      'driver' => 'memory',
      'batch' => 
      array (
        'memory_limit' => 60000,
      ),
      'illuminate' => 
      array (
        'store' => NULL,
      ),
      'default_ttl' => 10800,
    ),
    'transactions' => 
    array (
      'handler' => 'db',
      'db' => 
      array (
        'connection' => NULL,
      ),
    ),
    'temporary_files' => 
    array (
      'local_path' => '/home/hamas/coding/TLC/storage/framework/cache/laravel-excel',
      'local_permissions' => 
      array (
      ),
      'remote_disk' => NULL,
      'remote_prefix' => NULL,
      'force_resync_remote' => NULL,
    ),
  ),
  'filesystems' => 
  array (
    'default' => 'public',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/home/hamas/coding/TLC/storage/app/private',
        'serve' => true,
        'throw' => false,
        'report' => false,
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/home/hamas/coding/TLC/storage/app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
        'throw' => false,
        'report' => false,
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
        'bucket' => '',
        'url' => NULL,
        'endpoint' => NULL,
        'use_path_style_endpoint' => false,
        'throw' => false,
        'report' => false,
      ),
    ),
    'links' => 
    array (
      '/home/hamas/coding/TLC/public/storage' => '/home/hamas/coding/TLC/storage/app/public',
    ),
  ),
  'hashids' => 
  array (
    'default' => 'main',
    'connections' => 
    array (
      'main' => 
      array (
        'salt' => 'base64:NbS2atocbAdv6T2Bjs4luClLvp2uNr4Ogs8zpfuPRhs=',
        'length' => 10,
      ),
      'alternative' => 
      array (
        'salt' => 'your-salt-string',
        'length' => 'your-length-integer',
      ),
    ),
  ),
  'livewire' => 
  array (
    'class_namespace' => 'App\\Livewire',
    'view_path' => '/home/hamas/coding/TLC/resources/views/livewire',
    'layout' => 'components.layouts.app',
    'lazy_placeholder' => NULL,
    'temporary_file_upload' => 
    array (
      'disk' => NULL,
      'rules' => NULL,
      'directory' => NULL,
      'middleware' => NULL,
      'preview_mimes' => 
      array (
        0 => 'png',
        1 => 'gif',
        2 => 'bmp',
        3 => 'svg',
        4 => 'wav',
        5 => 'mp4',
        6 => 'mov',
        7 => 'avi',
        8 => 'wmv',
        9 => 'mp3',
        10 => 'm4a',
        11 => 'jpg',
        12 => 'jpeg',
        13 => 'mpga',
        14 => 'webp',
        15 => 'wma',
      ),
      'max_upload_time' => 5,
      'cleanup' => true,
    ),
    'render_on_redirect' => false,
    'legacy_model_binding' => false,
    'inject_assets' => true,
    'navigate' => 
    array (
      'show_progress_bar' => true,
      'progress_bar_color' => '#2299dd',
    ),
    'inject_morph_markers' => true,
    'smart_wire_keys' => false,
    'pagination_theme' => 'tailwind',
    'release_token' => 'a',
  ),
  'logging' => 
  array (
    'default' => 'stack',
    'deprecations' => 
    array (
      'channel' => NULL,
      'trace' => false,
    ),
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'single',
          1 => 'nightwatch',
        ),
        'ignore_exceptions' => false,
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/home/hamas/coding/TLC/storage/logs/laravel.log',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/home/hamas/coding/TLC/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => NULL,
        'username' => 'Laravel Log',
        'emoji' => ':boom:',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
          'connectionString' => 'tls://:',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
        'processors' => 
        array (
          0 => 'Monolog\\Processor\\PsrLogMessageProcessor',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
        'facility' => 8,
        'replace_placeholders' => true,
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
        'replace_placeholders' => true,
      ),
      'null' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\NullHandler',
      ),
      'emergency' => 
      array (
        'path' => '/home/hamas/coding/TLC/storage/logs/laravel.log',
      ),
      'payment' => 
      array (
        'driver' => 'single',
        'path' => '/home/hamas/coding/TLC/storage/logs/payment.log',
        'level' => 'debug',
      ),
      'exam' => 
      array (
        'driver' => 'single',
        'path' => '/home/hamas/coding/TLC/storage/logs/exam.log',
        'level' => 'debug',
      ),
      'level_b' => 
      array (
        'driver' => 'daily',
        'path' => '/home/hamas/coding/TLC/storage/logs/level_b.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'level_c' => 
      array (
        'driver' => 'daily',
        'path' => '/home/hamas/coding/TLC/storage/logs/level_c.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'grading' => 
      array (
        'driver' => 'daily',
        'path' => '/home/hamas/coding/TLC/storage/logs/grading.log',
        'level' => 'debug',
        'days' => 14,
        'replace_placeholders' => true,
      ),
      'nightwatch' => 
      array (
        'driver' => 'custom',
        'via' => 'Laravel\\Nightwatch\\Factories\\Logger',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'default' => 'smtp',
    'mailers' => 
    array (
      'smtp' => 
      array (
        'transport' => 'smtp',
        'scheme' => NULL,
        'url' => NULL,
        'host' => 'smtp.gmail.com',
        'port' => '587',
        'username' => 'lskhafecs@gmail.com',
        'password' => 'iqwv tvwo ufln snyi',
        'timeout' => NULL,
        'local_domain' => 'localhost',
      ),
      'ses' => 
      array (
        'transport' => 'ses',
      ),
      'postmark' => 
      array (
        'transport' => 'postmark',
      ),
      'resend' => 
      array (
        'transport' => 'resend',
      ),
      'sendmail' => 
      array (
        'transport' => 'sendmail',
        'path' => '/usr/sbin/sendmail -bs -i',
      ),
      'log' => 
      array (
        'transport' => 'log',
        'channel' => NULL,
      ),
      'array' => 
      array (
        'transport' => 'array',
      ),
      'failover' => 
      array (
        'transport' => 'failover',
        'mailers' => 
        array (
          0 => 'smtp',
          1 => 'log',
        ),
      ),
      'roundrobin' => 
      array (
        'transport' => 'roundrobin',
        'mailers' => 
        array (
          0 => 'ses',
          1 => 'postmark',
        ),
      ),
    ),
    'from' => 
    array (
      'address' => 'lskhafecs@gmail.com',
      'name' => 'Teaching and Learning Certification',
    ),
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/home/hamas/coding/TLC/resources/views/vendor/mail',
      ),
    ),
  ),
  'midtrans' => 
  array (
    'server_key' => 'SB-Mid-server-ZKtv_ZU-fK8ziit38faelY7l',
    'client_key' => 'SB-Mid-client-InAptMP-IiRIi7qB',
    'is_production' => false,
    'is_sanitized' => true,
    'is_3ds' => true,
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'role_pivot_key' => NULL,
      'permission_pivot_key' => NULL,
      'model_morph_key' => 'model_id',
      'team_foreign_key' => 'team_id',
    ),
    'register_permission_check_method' => true,
    'register_octane_reset_listener' => false,
    'events_enabled' => false,
    'teams' => false,
    'team_resolver' => 'Spatie\\Permission\\DefaultTeamResolver',
    'use_passport_client_credentials' => false,
    'display_permission_in_exception' => false,
    'display_role_in_exception' => false,
    'enable_wildcard_permission' => false,
    'cache' => 
    array (
      'expiration_time' => 
      \DateInterval::__set_state(array(
         'from_string' => true,
         'date_string' => '24 hours',
      )),
      'key' => 'spatie.permission.cache',
      'store' => 'default',
    ),
  ),
  'pulse' => 
  array (
    'domain' => NULL,
    'path' => 'pulse',
    'enabled' => true,
    'storage' => 
    array (
      'driver' => 'database',
      'trim' => 
      array (
        'keep' => '7 days',
      ),
      'database' => 
      array (
        'connection' => NULL,
        'chunk' => 1000,
      ),
    ),
    'ingest' => 
    array (
      'driver' => 'storage',
      'buffer' => 5000,
      'trim' => 
      array (
        'lottery' => 
        array (
          0 => 1,
          1 => 1000,
        ),
        'keep' => '7 days',
      ),
      'redis' => 
      array (
        'connection' => NULL,
        'chunk' => 1000,
      ),
    ),
    'cache' => NULL,
    'middleware' => 
    array (
      0 => 'web',
      1 => 'Laravel\\Pulse\\Http\\Middleware\\Authorize',
    ),
    'recorders' => 
    array (
      'Laravel\\Pulse\\Recorders\\CacheInteractions' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'ignore' => 
        array (
          0 => '/(^laravel_vapor_job_attemp(t?)s:)/',
          1 => '/^.+@.+\\|(?:(?:\\d+\\.\\d+\\.\\d+\\.\\d+)|[0-9a-fA-F:]+)(?::timer)?$/',
          2 => '/^[a-zA-Z0-9]{40}$/',
          3 => '/^illuminate:/',
          4 => '/^laravel:pulse:/',
          5 => '/^laravel:reverb:/',
          6 => '/^nova/',
          7 => '/^telescope:/',
        ),
        'groups' => 
        array (
          '/^job-exceptions:.*/' => 'job-exceptions:*',
        ),
      ),
      'Laravel\\Pulse\\Recorders\\Exceptions' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'location' => true,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Pulse\\Recorders\\Queues' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Pulse\\Recorders\\Servers' => 
      array (
        'server_name' => 'DESKTOP-CDQRM5S',
        'directories' => 
        array (
          0 => '/',
        ),
      ),
      'Laravel\\Pulse\\Recorders\\SlowJobs' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'threshold' => 1000,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Pulse\\Recorders\\SlowOutgoingRequests' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'threshold' => 1000,
        'ignore' => 
        array (
        ),
        'groups' => 
        array (
        ),
      ),
      'Laravel\\Pulse\\Recorders\\SlowQueries' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'threshold' => 1000,
        'location' => true,
        'max_query_length' => NULL,
        'ignore' => 
        array (
          0 => '/(["`])pulse_[\\w]+?\\1/',
          1 => '/(["`])telescope_[\\w]+?\\1/',
        ),
      ),
      'Laravel\\Pulse\\Recorders\\SlowRequests' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'threshold' => 1000,
        'ignore' => 
        array (
          0 => '#^/pulse$#',
          1 => '#^/telescope#',
        ),
      ),
      'Laravel\\Pulse\\Recorders\\UserJobs' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Pulse\\Recorders\\UserRequests' => 
      array (
        'enabled' => true,
        'sample_rate' => 1,
        'ignore' => 
        array (
          0 => '#^/pulse$#',
          1 => '#^/telescope#',
        ),
      ),
    ),
  ),
  'queue' => 
  array (
    'default' => 'database',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'connection' => NULL,
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
        'after_commit' => false,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => 0,
        'after_commit' => false,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => '',
        'secret' => '',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'default',
        'suffix' => NULL,
        'region' => 'us-east-1',
        'after_commit' => false,
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
        'after_commit' => false,
      ),
      'deferred' => 
      array (
        'driver' => 'deferred',
      ),
      'failover' => 
      array (
        'driver' => 'failover',
        'connections' => 
        array (
          0 => 'database',
          1 => 'deferred',
        ),
      ),
    ),
    'batching' => 
    array (
      'database' => 'mysql',
      'table' => 'job_batches',
    ),
    'failed' => 
    array (
      'driver' => 'database-uuids',
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'reverb' => 
  array (
    'default' => 'reverb',
    'servers' => 
    array (
      'reverb' => 
      array (
        'host' => '0.0.0.0',
        'port' => 8080,
        'path' => '',
        'hostname' => NULL,
        'options' => 
        array (
          'tls' => 
          array (
          ),
        ),
        'max_request_size' => 10000,
        'scaling' => 
        array (
          'enabled' => false,
          'channel' => 'reverb',
          'server' => 
          array (
            'url' => NULL,
            'host' => '127.0.0.1',
            'port' => '6379',
            'username' => NULL,
            'password' => NULL,
            'database' => '0',
            'timeout' => 60,
          ),
        ),
        'pulse_ingest_interval' => 15,
        'telescope_ingest_interval' => 15,
      ),
    ),
    'apps' => 
    array (
      'provider' => 'config',
      'apps' => 
      array (
        0 => 
        array (
          'key' => NULL,
          'secret' => NULL,
          'app_id' => NULL,
          'options' => 
          array (
            'host' => NULL,
            'port' => 443,
            'scheme' => 'https',
            'useTLS' => true,
          ),
          'allowed_origins' => 
          array (
            0 => '*',
          ),
          'ping_interval' => 60,
          'activity_timeout' => 30,
          'max_message_size' => 10000,
        ),
      ),
    ),
  ),
  'sanctum' => 
  array (
    'stateful' => 
    array (
      0 => 'localhost',
      1 => 'localhost:3000',
      2 => '127.0.0.1',
      3 => '127.0.0.1:8000',
      4 => '::1',
      5 => 'localhost',
    ),
    'guard' => 
    array (
      0 => 'web',
    ),
    'expiration' => NULL,
    'token_prefix' => '',
    'middleware' => 
    array (
      'authenticate_session' => 'Laravel\\Sanctum\\Http\\Middleware\\AuthenticateSession',
      'encrypt_cookies' => 'Illuminate\\Cookie\\Middleware\\EncryptCookies',
      'validate_csrf_token' => 'Illuminate\\Foundation\\Http\\Middleware\\ValidateCsrfToken',
    ),
  ),
  'services' => 
  array (
    'postmark' => 
    array (
      'token' => NULL,
    ),
    'resend' => 
    array (
      'key' => NULL,
    ),
    'ses' => 
    array (
      'key' => '',
      'secret' => '',
      'region' => 'us-east-1',
    ),
    'slack' => 
    array (
      'notifications' => 
      array (
        'bot_user_oauth_token' => NULL,
        'channel' => NULL,
      ),
    ),
    'google' => 
    array (
      'client_id' => '43530048660-2or88p3hbfodugmgvjpioa2qvfbiji3j.apps.googleusercontent.com',
      'client_secret' => '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',
      'redirect' => 'http://localhost:8000/auth/google/callback',
    ),
  ),
  'session' => 
  array (
    'driver' => 'database',
    'lifetime' => 120,
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/home/hamas/coding/TLC/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'teaching_and_learning_certification_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => NULL,
    'http_only' => true,
    'same_site' => 'lax',
    'partitioned' => false,
  ),
  'sweetalert' => 
  array (
    'theme' => 'default',
    'cdn' => NULL,
    'alwaysLoadJS' => false,
    'neverLoadJS' => false,
    'timer' => 5000,
    'width' => '32rem',
    'height_auto' => true,
    'padding' => '1.25rem',
    'background' => '#fff',
    'animation' => 
    array (
      'enable' => false,
    ),
    'animatecss' => 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css',
    'show_confirm_button' => true,
    'show_close_button' => false,
    'button_text' => 
    array (
      'confirm' => 'OK',
      'cancel' => 'Cancel',
    ),
    'toast_position' => 'top-end',
    'timer_progress_bar' => false,
    'middleware' => 
    array (
      'autoClose' => false,
      'toast_position' => 'top-end',
      'toast_close_button' => true,
      'timer' => 6000,
      'auto_display_error_messages' => true,
    ),
    'customClass' => 
    array (
      'container' => NULL,
      'popup' => NULL,
      'header' => NULL,
      'title' => NULL,
      'closeButton' => NULL,
      'icon' => NULL,
      'image' => NULL,
      'content' => NULL,
      'input' => NULL,
      'actions' => NULL,
      'confirmButton' => NULL,
      'cancelButton' => NULL,
      'footer' => NULL,
    ),
    'confirm_delete_confirm_button_text' => 'Yes, delete it!',
    'confirm_delete_confirm_button_color' => NULL,
    'confirm_delete_cancel_button_color' => '#d33',
    'confirm_delete_cancel_button_text' => 'Cancel',
    'confirm_delete_show_cancel_button' => true,
    'confirm_delete_show_close_button' => false,
    'confirm_delete_icon' => 'warning',
    'confirm_delete_show_loader_on_confirm' => true,
    'confirm_button_color' => '#3085d6',
  ),
  'telescope' => 
  array (
    'enabled' => true,
    'domain' => NULL,
    'path' => 'telescope',
    'driver' => 'database',
    'storage' => 
    array (
      'database' => 
      array (
        'connection' => 'mysql',
        'chunk' => 1000,
      ),
    ),
    'queue' => 
    array (
      'connection' => NULL,
      'queue' => NULL,
      'delay' => 10,
    ),
    'middleware' => 
    array (
      0 => 'web',
      1 => 'Laravel\\Telescope\\Http\\Middleware\\Authorize',
    ),
    'only_paths' => 
    array (
    ),
    'ignore_paths' => 
    array (
      0 => 'livewire*',
      1 => 'nova-api*',
      2 => 'pulse*',
      3 => '_boost*',
    ),
    'ignore_commands' => 
    array (
    ),
    'watchers' => 
    array (
      'Laravel\\Telescope\\Watchers\\BatchWatcher' => true,
      'Laravel\\Telescope\\Watchers\\CacheWatcher' => 
      array (
        'enabled' => true,
        'hidden' => 
        array (
        ),
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\ClientRequestWatcher' => 
      array (
        'enabled' => true,
        'ignore_hosts' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\CommandWatcher' => 
      array (
        'enabled' => true,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\DumpWatcher' => 
      array (
        'enabled' => true,
        'always' => false,
      ),
      'Laravel\\Telescope\\Watchers\\EventWatcher' => 
      array (
        'enabled' => true,
        'ignore' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\ExceptionWatcher' => true,
      'Laravel\\Telescope\\Watchers\\GateWatcher' => 
      array (
        'enabled' => true,
        'ignore_abilities' => 
        array (
        ),
        'ignore_packages' => true,
        'ignore_paths' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\JobWatcher' => true,
      'Laravel\\Telescope\\Watchers\\LogWatcher' => 
      array (
        'enabled' => true,
        'level' => 'error',
      ),
      'Laravel\\Telescope\\Watchers\\MailWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ModelWatcher' => 
      array (
        'enabled' => true,
        'events' => 
        array (
          0 => 'eloquent.*',
        ),
        'hydrations' => true,
      ),
      'Laravel\\Telescope\\Watchers\\NotificationWatcher' => true,
      'Laravel\\Telescope\\Watchers\\QueryWatcher' => 
      array (
        'enabled' => true,
        'ignore_packages' => true,
        'ignore_paths' => 
        array (
        ),
        'slow' => 100,
      ),
      'Laravel\\Telescope\\Watchers\\RedisWatcher' => true,
      'Laravel\\Telescope\\Watchers\\RequestWatcher' => 
      array (
        'enabled' => true,
        'size_limit' => 64,
        'ignore_http_methods' => 
        array (
        ),
        'ignore_status_codes' => 
        array (
        ),
      ),
      'Laravel\\Telescope\\Watchers\\ScheduleWatcher' => true,
      'Laravel\\Telescope\\Watchers\\ViewWatcher' => true,
    ),
  ),
  'debugbar' => 
  array (
    'enabled' => NULL,
    'hide_empty_tabs' => true,
    'except' => 
    array (
      0 => 'telescope*',
      1 => 'horizon*',
      2 => '_boost/browser-logs',
    ),
    'storage' => 
    array (
      'enabled' => true,
      'open' => NULL,
      'driver' => 'file',
      'path' => '/home/hamas/coding/TLC/storage/debugbar',
      'connection' => NULL,
      'provider' => '',
      'hostname' => '127.0.0.1',
      'port' => 2304,
    ),
    'editor' => 'phpstorm',
    'remote_sites_path' => NULL,
    'local_sites_path' => NULL,
    'include_vendors' => true,
    'capture_ajax' => true,
    'add_ajax_timing' => false,
    'ajax_handler_auto_show' => true,
    'ajax_handler_enable_tab' => true,
    'defer_datasets' => false,
    'error_handler' => false,
    'error_level' => 32767,
    'clockwork' => false,
    'collectors' => 
    array (
      'phpinfo' => false,
      'messages' => true,
      'time' => true,
      'memory' => true,
      'exceptions' => true,
      'log' => true,
      'db' => true,
      'views' => true,
      'route' => false,
      'auth' => false,
      'gate' => true,
      'session' => false,
      'symfony_request' => true,
      'mail' => true,
      'laravel' => true,
      'events' => false,
      'default_request' => false,
      'logs' => false,
      'files' => false,
      'config' => false,
      'cache' => false,
      'models' => true,
      'livewire' => true,
      'jobs' => false,
      'pennant' => false,
    ),
    'options' => 
    array (
      'time' => 
      array (
        'memory_usage' => false,
      ),
      'messages' => 
      array (
        'trace' => true,
        'capture_dumps' => false,
      ),
      'memory' => 
      array (
        'reset_peak' => false,
        'with_baseline' => false,
        'precision' => 0,
      ),
      'auth' => 
      array (
        'show_name' => true,
        'show_guards' => true,
      ),
      'gate' => 
      array (
        'trace' => false,
      ),
      'db' => 
      array (
        'with_params' => true,
        'exclude_paths' => 
        array (
        ),
        'backtrace' => true,
        'backtrace_exclude_paths' => 
        array (
        ),
        'timeline' => false,
        'duration_background' => true,
        'explain' => 
        array (
          'enabled' => false,
        ),
        'hints' => false,
        'show_copy' => true,
        'only_slow_queries' => true,
        'slow_threshold' => false,
        'memory_usage' => false,
        'soft_limit' => 100,
        'hard_limit' => 500,
      ),
      'mail' => 
      array (
        'timeline' => true,
        'show_body' => true,
      ),
      'views' => 
      array (
        'timeline' => true,
        'data' => false,
        'group' => 50,
        'inertia_pages' => 'js/Pages',
        'exclude_paths' => 
        array (
          0 => 'vendor/filament',
        ),
      ),
      'route' => 
      array (
        'label' => true,
      ),
      'session' => 
      array (
        'hiddens' => 
        array (
        ),
      ),
      'symfony_request' => 
      array (
        'label' => true,
        'hiddens' => 
        array (
        ),
      ),
      'events' => 
      array (
        'data' => false,
        'excluded' => 
        array (
        ),
      ),
      'logs' => 
      array (
        'file' => NULL,
      ),
      'cache' => 
      array (
        'values' => true,
      ),
    ),
    'inject' => true,
    'route_prefix' => '_debugbar',
    'route_middleware' => 
    array (
    ),
    'route_domain' => NULL,
    'theme' => 'auto',
    'debug_backtrace_limit' => 50,
  ),
  'localization-private' => 
  array (
    'plugins' => 
    array (
      '/home/hamas/coding/TLC/vendor/laravel-lang/actions' => 
      array (
        0 => 'LaravelLang\\Actions\\Plugins\\Main',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/attributes' => 
      array (
        0 => 'LaravelLang\\Attributes\\Plugins\\Laravel',
        1 => 'LaravelLang\\Attributes\\Plugins\\Lumen',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/http-statuses' => 
      array (
        0 => 'LaravelLang\\HttpStatuses\\Plugins\\Main',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/lang' => 
      array (
        0 => 'LaravelLang\\Lang\\Plugins\\Breeze\\Master',
        1 => 'LaravelLang\\Lang\\Plugins\\Breeze\\V2',
        2 => 'LaravelLang\\Lang\\Plugins\\Cashier\\Stripe\\Master',
        3 => 'LaravelLang\\Lang\\Plugins\\Cashier\\Stripe\\V15',
        4 => 'LaravelLang\\Lang\\Plugins\\Fortify\\Master',
        5 => 'LaravelLang\\Lang\\Plugins\\Fortify\\V1',
        6 => 'LaravelLang\\Lang\\Plugins\\Jetstream\\Master',
        7 => 'LaravelLang\\Lang\\Plugins\\Jetstream\\V5',
        8 => 'LaravelLang\\Lang\\Plugins\\Laravel\\Master',
        9 => 'LaravelLang\\Lang\\Plugins\\Laravel\\V11',
        10 => 'LaravelLang\\Lang\\Plugins\\Laravel\\V12',
        11 => 'LaravelLang\\Lang\\Plugins\\Nova\\DuskSuite\\Main',
        12 => 'LaravelLang\\Lang\\Plugins\\Nova\\LogViewer\\Main',
        13 => 'LaravelLang\\Lang\\Plugins\\Nova\\V4',
        14 => 'LaravelLang\\Lang\\Plugins\\Nova\\V5',
        15 => 'LaravelLang\\Lang\\Plugins\\Spark\\Paddle',
        16 => 'LaravelLang\\Lang\\Plugins\\Spark\\Stripe',
        17 => 'LaravelLang\\Lang\\Plugins\\UI\\Master',
        18 => 'LaravelLang\\Lang\\Plugins\\UI\\V4',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/moonshine' => 
      array (
        0 => 'LaravelLang\\MoonShine\\Plugins\\V3',
        1 => 'LaravelLang\\MoonShine\\Plugins\\V4',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/starter-kits' => 
      array (
        0 => 'LaravelLang\\StarterKits\\Plugins\\Livewire',
        1 => 'LaravelLang\\StarterKits\\Plugins\\React',
        2 => 'LaravelLang\\StarterKits\\Plugins\\Vue',
      ),
    ),
    'packages' => 
    array (
      '/home/hamas/coding/TLC/vendor/laravel-lang/actions' => 
      array (
        'class' => 'LaravelLang\\Actions\\Plugin',
        'name' => 'laravel-lang/actions',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/attributes' => 
      array (
        'class' => 'LaravelLang\\Attributes\\Plugin',
        'name' => 'laravel-lang/attributes',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/http-statuses' => 
      array (
        'class' => 'LaravelLang\\HttpStatuses\\Plugin',
        'name' => 'laravel-lang/http-statuses',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/lang' => 
      array (
        'class' => 'LaravelLang\\Lang\\Plugin',
        'name' => 'laravel-lang/lang',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/moonshine' => 
      array (
        'class' => 'LaravelLang\\MoonShine\\Plugin',
        'name' => 'moonshine/moonshine',
      ),
      '/home/hamas/coding/TLC/vendor/laravel-lang/starter-kits' => 
      array (
        'class' => 'LaravelLang\\StarterKits\\Plugin',
        'name' => 'laravel-lang/starter-kits',
      ),
    ),
    'models' => 
    array (
      'directory' => '/home/hamas/coding/TLC/app',
    ),
    'map' => 
    array (
      'af' => 
      array (
        'type' => 'Latn',
        'regional' => 'af_ZA',
      ),
      'sq' => 
      array (
        'type' => 'Latn',
        'regional' => 'sq_AL',
      ),
      'am' => 
      array (
        'type' => 'Ethi',
        'regional' => 'am_ET',
      ),
      'ar' => 
      array (
        'type' => 'Arab',
        'regional' => 'ar_AE',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'hy' => 
      array (
        'type' => 'Armn',
        'regional' => 'hy_AM',
      ),
      'as' => 
      array (
        'type' => 'Beng',
        'regional' => 'as_IN',
      ),
      'az' => 
      array (
        'type' => 'Latn',
        'regional' => 'az_AZ',
      ),
      'bm' => 
      array (
        'type' => 'Latn',
        'regional' => 'bm_ML',
      ),
      'bho' => 
      array (
        'type' => 'Deva',
        'regional' => 'bho_IN',
      ),
      'eu' => 
      array (
        'type' => 'Latn',
        'regional' => 'eu_ES',
      ),
      'be' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'be_BY',
      ),
      'bn' => 
      array (
        'type' => 'Beng',
        'regional' => 'bn_BD',
      ),
      'bs' => 
      array (
        'type' => 'Latn',
        'regional' => 'bs_BA',
      ),
      'bg' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'bg_BG',
      ),
      'en_CA' => 
      array (
        'type' => 'Latn',
        'regional' => 'en_CA',
      ),
      'ca' => 
      array (
        'type' => 'Latn',
        'regional' => 'ca_ES',
      ),
      'ceb' => 
      array (
        'type' => 'Latn',
        'regional' => 'ceb_PH',
      ),
      'km' => 
      array (
        'type' => 'Khmr',
        'regional' => 'km_KH',
      ),
      'zh_CN' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_CN',
      ),
      'zh_HK' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_HK',
      ),
      'zh_TW' => 
      array (
        'type' => 'Hans',
        'regional' => 'zh_TW',
      ),
      'hr' => 
      array (
        'type' => 'Latn',
        'regional' => 'hr_HR',
      ),
      'cs' => 
      array (
        'type' => 'Latn',
        'regional' => 'cs_CZ',
      ),
      'da' => 
      array (
        'type' => 'Latn',
        'regional' => 'da_DK',
      ),
      'doi' => 
      array (
        'type' => 'Deva',
        'regional' => 'doi_IN',
      ),
      'nl' => 
      array (
        'type' => 'Latn',
        'regional' => 'nl_NL',
      ),
      'en' => 
      array (
        'type' => 'Latn',
        'regional' => 'en_GB',
      ),
      'eo' => 
      array (
        'type' => 'Latn',
        'regional' => 'eo_001',
      ),
      'et' => 
      array (
        'type' => 'Latn',
        'regional' => 'et_EE',
      ),
      'ee' => 
      array (
        'type' => 'Latn',
        'regional' => 'ee_GH',
      ),
      'fi' => 
      array (
        'type' => 'Latn',
        'regional' => 'fi_FI',
      ),
      'fr' => 
      array (
        'type' => 'Latn',
        'regional' => 'fr_FR',
      ),
      'fy' => 
      array (
        'type' => 'Latn',
        'regional' => 'fy_NL',
      ),
      'gl' => 
      array (
        'type' => 'Latn',
        'regional' => 'gl_ES',
      ),
      'ka' => 
      array (
        'type' => 'Geor',
        'regional' => 'ka_GE',
      ),
      'de' => 
      array (
        'type' => 'Latn',
        'regional' => 'de_DE',
      ),
      'de_AT' => 
      array (
        'type' => 'Latn',
        'regional' => 'de_AT',
      ),
      'de_CH' => 
      array (
        'type' => 'Latn',
        'regional' => 'de_CH',
      ),
      'el' => 
      array (
        'type' => 'Grek',
        'regional' => 'el_GR',
      ),
      'gu' => 
      array (
        'type' => 'Gujr',
        'regional' => 'gu_IN',
      ),
      'ht' => 
      array (
        'type' => 'Latn',
        'regional' => 'fr_HT',
      ),
      'ha' => 
      array (
        'type' => 'Latn',
        'regional' => 'ha_NG',
      ),
      'haw' => 
      array (
        'type' => 'Latn',
        'regional' => 'haw',
      ),
      'he' => 
      array (
        'type' => 'Hebr',
        'regional' => 'he_IL',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'hi' => 
      array (
        'type' => 'Deva',
        'regional' => 'hi_IN',
      ),
      'hu' => 
      array (
        'type' => 'Latn',
        'regional' => 'hu_HU',
      ),
      'is' => 
      array (
        'type' => 'Latn',
        'regional' => 'is_IS',
      ),
      'ig' => 
      array (
        'type' => 'Latn',
        'regional' => 'ig_NG',
      ),
      'id' => 
      array (
        'type' => 'Latn',
        'regional' => 'id_ID',
      ),
      'ga' => 
      array (
        'type' => 'Latn',
        'regional' => 'ga_IE',
      ),
      'it' => 
      array (
        'type' => 'Latn',
        'regional' => 'it_IT',
      ),
      'ja' => 
      array (
        'type' => 'Jpan',
        'regional' => 'ja_JP',
      ),
      'kn' => 
      array (
        'type' => 'Knda',
        'regional' => 'kn_IN',
      ),
      'kk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'kk_KZ',
      ),
      'rw' => 
      array (
        'type' => 'Latn',
        'regional' => 'rw_RW',
      ),
      'ko' => 
      array (
        'type' => 'Hang',
        'regional' => 'ko_KR',
      ),
      'ku' => 
      array (
        'type' => 'Latn',
        'regional' => 'ku_TR',
      ),
      'ckb' => 
      array (
        'type' => 'Arab',
        'regional' => 'ckb_IQ',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'ky' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'ky_KG',
      ),
      'lo' => 
      array (
        'type' => 'Laoo',
        'regional' => 'lo_LA',
      ),
      'lv' => 
      array (
        'type' => 'Latn',
        'regional' => 'lv_LV',
      ),
      'ln' => 
      array (
        'type' => 'Latn',
        'regional' => 'ln_CD',
      ),
      'lt' => 
      array (
        'type' => 'Latn',
        'regional' => 'lt_LT',
      ),
      'lg' => 
      array (
        'type' => 'Latn',
        'regional' => 'lg_UG',
      ),
      'lb' => 
      array (
        'type' => 'Latn',
        'regional' => 'lb_LU',
      ),
      'mk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'mk_MK',
      ),
      'mai' => 
      array (
        'type' => 'Deva',
        'regional' => 'mai_IN',
      ),
      'mg' => 
      array (
        'type' => 'Latn',
        'regional' => 'mg_MG',
      ),
      'ml' => 
      array (
        'type' => 'Mlym',
        'regional' => 'ml_IN',
      ),
      'ms' => 
      array (
        'type' => 'Latn',
        'regional' => 'ms_MY',
      ),
      'mt' => 
      array (
        'type' => 'Latn',
        'regional' => 'mt_MT',
      ),
      'mr' => 
      array (
        'type' => 'Deva',
        'regional' => 'mr_IN',
      ),
      'mi' => 
      array (
        'type' => 'Latn',
        'regional' => 'mi_NZ',
      ),
      'mni_Mtei' => 
      array (
        'type' => 'Beng',
        'regional' => 'mni_IN',
      ),
      'mn' => 
      array (
        'type' => 'Mong',
        'regional' => 'mn_MN',
      ),
      'my' => 
      array (
        'type' => 'Mymr',
        'regional' => 'my_MM',
      ),
      'ne' => 
      array (
        'type' => 'Deva',
        'regional' => 'ne',
      ),
      'nb' => 
      array (
        'type' => 'Latn',
        'regional' => 'nb_NO',
      ),
      'nn' => 
      array (
        'type' => 'Latn',
        'regional' => 'nn_NO',
      ),
      'oc' => 
      array (
        'type' => 'Latn',
        'regional' => 'oc_FR',
      ),
      'or' => 
      array (
        'type' => 'Orya',
        'regional' => 'or_IN',
      ),
      'om' => 
      array (
        'type' => 'Latn',
        'regional' => 'om_ET',
      ),
      'ps' => 
      array (
        'type' => 'Arab',
        'regional' => 'ps_AF',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'fa' => 
      array (
        'type' => 'Arab',
        'regional' => 'fa_IR',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'fil' => 
      array (
        'type' => 'Latn',
        'regional' => 'fil_PH',
      ),
      'pl' => 
      array (
        'type' => 'Latn',
        'regional' => 'pl_PL',
      ),
      'pt' => 
      array (
        'type' => 'Latn',
        'regional' => 'pt_PT',
      ),
      'pt_BR' => 
      array (
        'type' => 'Latn',
        'regional' => 'pt_BR',
      ),
      'pa' => 
      array (
        'type' => 'Guru',
        'regional' => 'pa_IN',
      ),
      'qu' => 
      array (
        'type' => 'Latn',
        'regional' => 'qu_PE',
      ),
      'ro' => 
      array (
        'type' => 'Latn',
        'regional' => 'ro_RO',
      ),
      'ru' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'ru_RU',
      ),
      'sa' => 
      array (
        'type' => 'Deva',
        'regional' => 'sa_IN',
      ),
      'sc' => 
      array (
        'type' => 'Latn',
        'regional' => 'sc_IT',
      ),
      'gd' => 
      array (
        'type' => 'Latn',
        'regional' => 'gd_GB',
      ),
      'sr_Cyrl' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'sr_RS',
      ),
      'sr_Latn' => 
      array (
        'type' => 'Latn',
        'regional' => 'sr_RS',
      ),
      'sr_Latn_ME' => 
      array (
        'type' => 'Latn',
        'regional' => 'sr_Latn_ME',
      ),
      'sn' => 
      array (
        'type' => 'Latn',
        'regional' => 'sn_ZW',
      ),
      'sd' => 
      array (
        'type' => 'Arab',
        'regional' => 'sd_PK',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'si' => 
      array (
        'type' => 'Sinh',
        'regional' => 'si_LK',
      ),
      'sk' => 
      array (
        'type' => 'Latn',
        'regional' => 'sk_SK',
      ),
      'sl' => 
      array (
        'type' => 'Latn',
        'regional' => 'sl_SI',
      ),
      'so' => 
      array (
        'type' => 'Latn',
        'regional' => 'so_SO',
      ),
      'es' => 
      array (
        'type' => 'Latn',
        'regional' => 'es_ES',
      ),
      'su' => 
      array (
        'type' => 'Latn',
        'regional' => 'su_ID',
      ),
      'sw' => 
      array (
        'type' => 'Latn',
        'regional' => 'sw_KE',
      ),
      'sv' => 
      array (
        'type' => 'Latn',
        'regional' => 'sv_SE',
      ),
      'tl' => 
      array (
        'type' => 'Latn',
        'regional' => 'tl_PH',
      ),
      'tg' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tg_TJ',
      ),
      'ta' => 
      array (
        'type' => 'Taml',
        'regional' => 'ta_IN',
      ),
      'tt' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tt_RU',
      ),
      'te' => 
      array (
        'type' => 'Telu',
        'regional' => 'te_IN',
      ),
      'ti' => 
      array (
        'type' => 'Ethi',
        'regional' => 'ti_ET',
      ),
      'th' => 
      array (
        'type' => 'Thai',
        'regional' => 'th_TH',
      ),
      'tr' => 
      array (
        'type' => 'Latn',
        'regional' => 'tr_TR',
      ),
      'tk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'tk_TM',
      ),
      'ak' => 
      array (
        'type' => 'Latn',
        'regional' => 'ak_GH',
      ),
      'ug' => 
      array (
        'type' => 'Arab',
        'regional' => 'ug_CN',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'uk' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'uk_UA',
      ),
      'ur' => 
      array (
        'type' => 'Arab',
        'regional' => 'ur_PK',
        'direction' => 
        \LaravelLang\LocaleList\Direction::RightToLeft,
      ),
      'uz_Cyrl' => 
      array (
        'type' => 'Cyrl',
        'regional' => 'uz_UZ',
      ),
      'uz_Latn' => 
      array (
        'type' => 'Latn',
        'regional' => 'uz_UZ',
      ),
      'vi' => 
      array (
        'type' => 'Latn',
        'regional' => 'vi_VN',
      ),
      'cy' => 
      array (
        'type' => 'Latn',
        'regional' => 'cy_GB',
      ),
      'xh' => 
      array (
        'type' => 'Latn',
        'regional' => 'xh_ZA',
      ),
      'yi' => 
      array (
        'type' => 'Hebr',
        'regional' => 'yi_001',
      ),
      'yo' => 
      array (
        'type' => 'Latn',
        'regional' => 'yo_NG',
      ),
      'zu' => 
      array (
        'type' => 'Latn',
        'regional' => 'zu_ZA',
      ),
    ),
  ),
  'localization' => 
  array (
    'inline' => false,
    'align' => true,
    'aliases' => 
    array (
    ),
    'smart_punctuation' => 
    array (
      'enable' => false,
      'common' => 
      array (
        'double_quote_opener' => '“',
        'double_quote_closer' => '”',
        'single_quote_opener' => '‘',
        'single_quote_closer' => '’',
      ),
      'locales' => 
      array (
        'fr' => 
        array (
          'double_quote_opener' => '«&nbsp;',
          'double_quote_closer' => '&nbsp;»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'ru' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'uk' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
        'be' => 
        array (
          'double_quote_opener' => '«',
          'double_quote_closer' => '»',
          'single_quote_opener' => '‘',
          'single_quote_closer' => '’',
        ),
      ),
    ),
    'routes' => 
    array (
      'names' => 
      array (
        'parameter' => 'locale',
        'header' => 'Accept-Language',
        'cookie' => 'Accept-Language',
        'session' => 'Accept-Language',
        'column' => 'locale',
      ),
      'name_prefix' => 'localized.',
      'redirect_default' => false,
      'hide_default' => false,
      'group' => 
      array (
        'middlewares' => 
        array (
          'default' => 
          array (
            0 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByCookie',
            1 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByHeader',
            2 => 'LaravelLang\\Routes\\Middlewares\\LocalizationBySession',
            3 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByModel',
          ),
          'prefix' => 
          array (
            0 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByParameterPrefix',
            1 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByCookie',
            2 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByHeader',
            3 => 'LaravelLang\\Routes\\Middlewares\\LocalizationBySession',
            4 => 'LaravelLang\\Routes\\Middlewares\\LocalizationByModel',
          ),
        ),
      ),
    ),
    'models' => 
    array (
      'suffix' => 'Translation',
      'filter' => 
      array (
        'enabled' => true,
      ),
      'helpers' => '/home/hamas/coding/TLC/vendor/_laravel_lang',
    ),
    'translators' => 
    array (
      'channels' => 
      array (
        'google' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Google',
          'enabled' => true,
          'priority' => 1,
        ),
        'deepl' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Deepl',
          'enabled' => false,
          'priority' => 2,
          'credentials' => 
          array (
            'key' => '',
          ),
        ),
        'yandex' => 
        array (
          'translator' => '\\LaravelLang\\Translator\\Integrations\\Yandex',
          'enabled' => false,
          'priority' => 3,
          'credentials' => 
          array (
            'key' => '',
            'folder' => '',
          ),
        ),
      ),
      'options' => 
      array (
        'preserve_parameters' => true,
      ),
    ),
  ),
  'nightwatch' => 
  array (
    'enabled' => true,
    'token' => 'hwsJQSNRRHvidto0ywXXT9kNj6xiEKeJAjilo6ziN0Jc',
    'deployment' => NULL,
    'server' => 'DESKTOP-CDQRM5S',
    'capture_exception_source_code' => true,
    'capture_request_payload' => false,
    'redact_payload_fields' => 
    array (
      0 => '_token',
      1 => 'password',
      2 => 'password_confirmation',
    ),
    'redact_headers' => 
    array (
      0 => 'Authorization',
      1 => 'Cookie',
      2 => 'Proxy-Authorization',
      3 => 'X-XSRF-TOKEN',
    ),
    'sampling' => 
    array (
      'requests' => '0.1',
      'commands' => '1.0',
      'exceptions' => '1.0',
      'scheduled_tasks' => 1.0,
    ),
    'filtering' => 
    array (
      'ignore_cache_events' => false,
      'ignore_mail' => false,
      'ignore_notifications' => false,
      'ignore_outgoing_requests' => false,
      'ignore_queries' => false,
      'log_level' => 'debug',
    ),
    'ingest' => 
    array (
      'uri' => '127.0.0.1:2407',
      'timeout' => 0.5,
      'connection_timeout' => 0.5,
      'event_buffer' => 500,
    ),
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'alias' => 
    array (
    ),
    'dont_alias' => 
    array (
      0 => 'App\\Nova',
    ),
  ),
);
