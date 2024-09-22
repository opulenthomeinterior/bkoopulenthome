<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class YoutubeValidLink implements Rule
{
    public function passes($attribute, $value)
    {
        // Check if the URL is a valid YouTube video URL
        $pattern = '/^(https?\:\/\/)?(www\.youtube\.com|youtu\.?be)\/.+$/';
        return preg_match($pattern, $value);
    }

    public function message()
    {
        return 'The :attribute must be a valid YouTube video URL.';
    }
}
