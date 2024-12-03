<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'colour_code', 'finishing', 'trade_colour', 'image_path'];

    // Define the "creating" event
    protected static function boot()
    {
        parent::boot();

        // On creating a new Colour model instance
        static::creating(function ($colour) {
            // Set the trade_colour based on finishing and name
            $colour->setTradeColour();
        });

        static::updating(function ($colour) {
            // Check if finishing or name has changed, and update trade_colour accordingly
            if ($colour->isDirty(['finishing', 'name'])) {
                $colour->setTradeColour();
            }
        });
    }

    // Function to set trade_colour based on finishing and name
    public function setTradeColour()
    {
        $colourName = $this->name;
        $colourName = trim($colourName);

        switch ($this->finishing) {
            case 'Gloss':
                $this->trade_colour = "SuperGloss $colourName";
                $this->slug = str_replace(' ', '-', strtolower("SuperGloss$colourName"));
                break;
            case 'Matt':
                $this->trade_colour = "UltraMatt $colourName";
                $this->slug = str_replace(' ', '-', strtolower("UltraMatt$colourName"));
                break;
            case 'Standard MFC':
                $this->trade_colour = "Standard $colourName";
                $this->slug = str_replace(' ', '-', strtolower("Standard$colourName"));
                break;
            default:
                $this->trade_colour = null;
                $this->slug = str_replace(' ', '-', strtolower($colourName));
        }
    }
}
