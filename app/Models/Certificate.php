<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Certificate extends Model
{
    protected $fillable = [
        'user_id',
        'certificate_number',
        'name',
        'issue_date',
        'download_count',
        'last_downloaded_at',
        'level_id',
    ];

    protected $casts = [
        'issue_date' => 'date'
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public static function generateCertificateNumber()
    {
        return DB::transaction(function () {
            $year = date('Y');
            $prefix = $year . '/HAFECS/S-GCTLC/';

            $lastCertificate = self::where('certificate_number', 'LIKE', $prefix . '%')
                ->orderBy('certificate_number', 'desc')
                ->lockForUpdate()
                ->first();

            if ($lastCertificate) {
                $lastNumber = (int) substr($lastCertificate->certificate_number, -3);
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }

            $formattedNumber = str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            return $prefix . $formattedNumber;
        });
    }

    public static function hasIssuedThisYear($userId)
    {
        $year = date('Y');
        return self::where('user_id', $userId)
            ->whereYear('issue_date', $year)
            ->exists();
    }

    public static function getByUserThisYear($userId)
    {
        $year = date('Y');
        return self::where('user_id', $userId)
            ->whereYear('issue_date', $year)
            ->first();
    }

    public static function getLatest()
    {
        return self::orderBy('certificate_number', 'desc')->first();
    }

    public static function countThisYear()
    {
        return self::whereYear('issue_date', date('Y'))->count();
    }

    public static function countByMonth($year, $month)
    {
        return self::whereYear('issue_date', $year)
            ->whereMonth('issue_date', $month)
            ->count();
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}