<?php

namespace App\Service;

class CodeGenerator
{
    /**
     * Generate a unique code.
     *
     * @param int $length
     * @return string
     */
    public function generate(int $length = 12): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';

        $code = substr(str_shuffle($characters), 0, $length);

        return $code;
    }
}
