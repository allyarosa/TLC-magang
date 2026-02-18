<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class ImportCacheService
{
    private const CACHE_PREFIX = 'import_preview_';
    private const CACHE_TTL = 3600; // 1 hour

    public function store(string $sessionId, array $data): string
    {
        $cacheKey = $this->getCacheKey($sessionId);
        
        Log::info('Storing import preview data in cache', [
            'cache_key' => $cacheKey,
            'data_size' => count($data)
        ]);

        Cache::put($cacheKey, $data, self::CACHE_TTL);
        
        return $cacheKey;
    }

    public function retrieve(string $sessionId): ?array
    {
        $cacheKey = $this->getCacheKey($sessionId);
        $data = Cache::get($cacheKey);
        
        if ($data) {
            Log::debug('Retrieved import preview data from cache', [
                'cache_key' => $cacheKey,
                'data_size' => count($data)
            ]);
        } else {
            Log::warning('Import preview data not found in cache', ['cache_key' => $cacheKey]);
        }
        
        return $data;
    }

    public function forget(string $sessionId): void
    {
        $cacheKey = $this->getCacheKey($sessionId);
        
        Log::info('Removing import preview data from cache', ['cache_key' => $cacheKey]);
        
        Cache::forget($cacheKey);
    }

    public function generateSessionId(): string
    {
        return 'import_' . uniqid() . '_' . time();
    }

    private function getCacheKey(string $sessionId): string
    {
        return self::CACHE_PREFIX . $sessionId;
    }
}