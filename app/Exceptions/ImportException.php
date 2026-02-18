<?php

namespace App\Exceptions;

use Exception;

class ImportException extends Exception
{
    public static function invalidFormat(string $format = null): self
    {
        $message = $format 
            ? "Format file '{$format}' tidak didukung. Gunakan CSV atau Excel (XLSX)."
            : "Format file tidak didukung. Gunakan CSV atau Excel (XLSX).";
            
        return new self($message);
    }

    public static function fileParseError(string $message = null): self
    {
        $errorMsg = "Gagal membaca file. Pastikan format file sesuai template.";
        if ($message) {
            $errorMsg .= " Detail: " . $message;
        }
        return new self($errorMsg);
    }

    public static function missingPhpZip(): self
    {
        return new self("Ekstensi php-zip tidak tersedia. Silakan gunakan format CSV.");
    }

    public static function noDataFound(): self
    {
        return new self("File kosong atau tidak berisi data yang valid.");
    }

    public static function validationFailed(array $errors = []): self
    {
        $message = "Data tidak valid.";
        if (!empty($errors)) {
            $message .= " Terdapat " . count($errors) . " baris dengan kesalahan.";
        }
        return new self($message);
    }
}