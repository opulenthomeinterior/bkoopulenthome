<?php
use Illuminate\Support\Facades\File;
use Akaunting\Money\Currency;
use Akaunting\Money\Money;

/**
 * Get Upload Directory (Monthly Directory)
 *
 * @param  mixed $module
 * @return $uploads_dir
 */
if (!function_exists('mmadev_get_uploads_directory_monthly')) {
    function mmadev_get_uploads_directory_monthly($module = '')
    {
        $uploads_dir = public_path('/uploads/' . $module . '/');

        // create monthly directory if not exists
        if (!file_exists($uploads_dir)) {
            mkdir($uploads_dir, 0777, true);
        }

        return $uploads_dir;
    }
}

/**
 *  Get Image Path Attachments
 */
if (!function_exists('mmadev_store_and_get_image_path')) {
    function mmadev_store_and_get_image_path($module, $file)
    {
        $image_path = str_replace(' ', '', $file->getClientOriginalName());

        $unique_id  = uniqid();
        $image_path = $unique_id . '-' . $image_path;
        $timestamp  = now()->format('d_m_Y_His');
        $image_path = "{$timestamp}_{$image_path}";

        $uploads_directory = mmadev_get_uploads_directory_monthly($module);

        $file->move($uploads_directory, $image_path);

        return $image_path;
    }
}

/**
 *  Get Image Path Attachments
 */
if (!function_exists('mmadev_store_and_get_image_path_from_url')) {
    function mmadev_store_and_get_image_path_from_url($module, $file)
    {
        // If it's a URL, generate a unique filename
        $filename = uniqid() . '-' . basename($file);
        $timestamp  = now()->format('d_m_Y_His');
        $filename = "{$timestamp}_{$filename}";
        $imageContent = file_get_contents($file);

        // Store the image in the 'products' directory
        $uploads_directory = mmadev_get_uploads_directory_monthly($module);
        file_put_contents($uploads_directory . '/' . $filename, $imageContent);

        // Return the downloaded image path
        return $filename;
    }
}

/**
 *  Delete attachment from directory
 */
if (!function_exists('mmadev_delete_attachment_from_directory')) {
    function mmadev_delete_attachment_from_directory($file, $module)
    {
        $upload_dir = 'uploads/' . $module . '/';

        // delete from directory
        if (File::exists($upload_dir . $file)) {
            // Delete from the directory
            File::delete($upload_dir . $file);
        }
    }
}

// Function to calculate luminance from RGB values
if (!function_exists('calculateLuminance')) {
    function calculateLuminance($red, $green, $blue)
    {
        return (0.299 * $red + 0.587 * $green + 0.114 * $blue) / 255;
    }
}

// Extract RGB values from the hexadecimal color code
if (!function_exists('hexToRgb')) {
    function hexToRgb($hex)
    {
        $hex = ltrim($hex, '#');
        return [
            'red' => hexdec(substr($hex, 0, 2)),
            'green' => hexdec(substr($hex, 2, 2)),
            'blue' => hexdec(substr($hex, 4, 2)),
        ];
    }
}

if (!function_exists('mmadev_get_currency_and_amount')) {
    function mmadev_get_currency_and_amount($currency, $amount, $status = true)
    {
        $value = new Money($amount, new Currency($currency), $status);

        return $value;
    }
}

if (!function_exists('mmadev_get_currency_symbol')) {
    function mmadev_get_currency_symbol($currency)
    {
        $value = (new Currency($currency))->getSymbol();

        return $value;
    }
}