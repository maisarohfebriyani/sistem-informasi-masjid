<?php

namespace App\Libraries;

use CodeIgniter\Exceptions\PageNotFoundException;

/**
 * CustomException untuk menangani error jika file atau direktori tidak valid.
 */
class CustomException extends PageNotFoundException
{
    /**
     * Untuk menangani error jika file tidak valid.
     *
     * @param string $path Path file yang tidak valid.
     * @return static
     */
    public static function forInvalidFile(string $path)
    {
        return new static(lang('Core.invalidFile', [$path]));
    }

    /**
     * Untuk menangani error jika direktori tidak valid.
     *
     * @param string $path Path direktori yang tidak valid.
     * @return static
     */
    public static function forInvalidDirectory(string $path)
    {
        return new static(lang('Core.invalidDirectory', [$path]));
    }
}
