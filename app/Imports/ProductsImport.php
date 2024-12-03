<?php

namespace App\Imports;

use App\Models\Assembly;
use App\Models\Category;
use App\Models\Colour;
use App\Models\Product;
use App\Models\Style;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class ProductsImport implements ToCollection, WithChunkReading
{

    public $productId;

    public function __construct($productId) {
        $this->productId = $productId;
    }

    /**
     * @param Collection $collection
     */
    public function collection(Collection $rows)
    {
        try {
            foreach ($rows as $index => $row) {
                if (empty($row[21])) {
                    continue;
                }

                if ($row[0] == 'Product Code (0)') {
                    continue;
                }
    
                if (empty($row[0])) {
                    continue;
                }
                // $product = Product::where('product_code', $row[0])->first();
    
                // if (!empty($product)) {
                //     continue;
                // }
    
                // echo "<pre>";
                // print_r($row[1]);
                // echo "</pre>";
    
                $row[1] = trim($row[1]);
                $parent_category = Category::find($row[1]);
                $category = Category::where('name', $row[2])->first();
                if (!empty($parent_category) && !empty($row[1])) {
                    if (empty($category) && !empty($row[2])) {
                        $category = new Category();
                        $category->name = $row[2];
                        $category->slug = str_replace(' ', '-', strtolower($row[2]));
                        $category->description = $row[18];
                        $category->parent_category_id = $parent_category->id;
                        if (!empty($row[20])) {
                            $file = $row[20];
                            $category->image_path = $file;
                            // $category->image_path = mmadev_store_and_get_image_path_from_url('categories', $file);
                        }
                        $category->save();
                    }
                } else {
                    // continue;
                }
                $row[7] = trim($row[7]);
                $style = Style::where('name', $row[7])->first();
    
                if (empty($style) && !empty($row[7])) {
                    $style = new Style();
                    $style->name = $row[7];
                    $style->slug = str_replace(' ', '-', strtolower($row[7]));
                    $style->save();
                }
    
                if (!empty($row[8])) {
                    $trade_colour = null;
                    $finishing = '';
    
                    if ($row[9] === 'Gloss') {
                        $trade_colour = "SuperGloss $row[8]";
                        $finishing = 'Gloss';
                    } elseif ($row[9] === 'Matt') {
                        $trade_colour = "UltraMatt $row[8]";
                        $finishing = 'Matt';
                    } elseif ($row[9] === 'Standard MFC') {
                        $trade_colour = "Standard $row[8]";
                        $finishing = 'Standard MFC';
                    }
    
                    if (!empty($finishing)) {
                        $trade_colour = trim($trade_colour);
                        $colour = Colour::where('trade_colour', $trade_colour)->first();
    
                        if (empty($colour)) {
                            $colour = new Colour();
                            $colour->name = $row[8];
                            $colour->finishing = $finishing;
                            $colour->trade_colour = $trade_colour;
                            $colour->save();
                        }
                    } else {
                        $colour = Colour::where('name', $row[8])->first();
                        if (empty($colour)) {
                            $colour = new Colour();
                            $colour->name = $row[8];
                            $colour->save();
                        }
                    }
                }
    
                $row[10] = trim($row[10]) == 'Flatpack' ? 'Flat Pack' : trim($row[10]);
                $assembly = Assembly::where('name', $row[10])->first();
    
                if (empty($assembly) && !empty($row[10])) {
                    $assembly = new Assembly();
                    $assembly->name = $row[10];
                    $assembly->slug = str_replace(' ', '-', strtolower($row[10]));
                    $assembly->save();
                }
    
                $row[4] = trim($row[4]);
                $product = Product::where('serial_number', $row[21])->where('product_code', $row[0])->first();
    
                if (empty($product)) {
                    $product = new Product();
                    $product->product_code = $row[0];
                    $product->serial_number = $row[21];
                    $product->slug = str_replace(' ', '-', strtolower($row[3]));
                    $product->short_title = $row[4];
                    $product->full_title = $row[3];
                    $product->product_description = $row[18];
                    if (empty(trim($row[5]))) {
                        $product->price = 0;
                        // skip this row
                        // continue;
                    } else {
                        $price = $row[5];
                        // Remove anything that is not a number or a decimal point
                        $sanitized_price = preg_replace('/[^0-9.]/', '', $price);
                        // Optionally, you can cast it to a float or integer
                        $sanitized_price = (float) $sanitized_price;
                        $product->price = $sanitized_price;
                    }
                    // $product->price = $row[5];
                    $product->discounted_percentage = empty(trim($row[6])) ? 0 : $row[6];
    
                    if ($row[6] >= 0 && $row[6] <= 100) {
                        $discountPercentage = $row[6];
                        $discountedPrice = $product->price * (1 - ($discountPercentage / 100));
                        $product->discounted_price = $discountedPrice;
                    } else {
                        $product->discounted_price = $row[5];
                    }
                    
                    $product->parent_category_id = $parent_category ? $parent_category->id : null;
                    $product->category_id = $category ? $category->id : null;
                    $product->style_id = $style ? $style->id : null;
                    $product->colour_id = isset($colour) && $colour ? $colour->id : null;
    
                    $product->assembly_id = $assembly ? $assembly->id : null;
                    $product->height = trim(preg_replace('/[^0-9]/', '', $row[12]));
                    $product->width = trim(preg_replace('/[^0-9]/', '', $row[13]));
                    $product->depth = trim(preg_replace('/[^0-9]/', '', $row[14]));
                    $product->length = trim(preg_replace('/[^0-9]/', '', $row[15]));
                    $product->weight = trim(preg_replace('/[^0-9]/', '', $row[16]));
                    $product->dimensions = $row[11];
                    // if (!empty($row[19])) {
                        // $file = $row[19];
                        // $product->image_path = mmadev_store_and_get_image_path_from_url('products', $file);
                    // }
                    $product->image_path = $row[19] ?? null;
                    $product->status = (!empty($row[22]) && ($row[22] == 'in_active' || $row[22] == 'In_Active')) ? 'in_active' : 'active';
                    $product->product_file_id = $this->productId;
                    $product->save();
                } else {
                    $product->product_code = $row[0];
                    // $product->serial_number = $row[21];
                    $product->slug = str_replace(' ', '-', strtolower($row[3]));
                    $product->short_title = $row[4];
                    $product->full_title = $row[3];
                    $product->product_description = $row[18];
                    if (empty(trim($row[5]))) {
                        $product->price = 0;
                        // skip this row
                        // continue;
                    } else {
                        $price = $row[5];
                        // Remove anything that is not a number or a decimal point
                        $sanitized_price = preg_replace('/[^0-9.]/', '', $price);
                        // Optionally, you can cast it to a float or integer
                        $sanitized_price = (float) $sanitized_price;
                        $product->price = $sanitized_price;
                    }
                    // $product->price = $row[5];
                    $product->discounted_percentage = empty(trim($row[6])) ? 0 : $row[6];
    
                    if ($row[6] >= 0 && $row[6] <= 100) {
                        $discountPercentage = $row[6];
                        $discountedPrice = $product->price * (1 - ($discountPercentage / 100));
                        $product->discounted_price = $discountedPrice;
                    } else {
                        $product->discounted_price = $row[5];
                    }
                    
                    $product->parent_category_id = $parent_category ? $parent_category->id : null;
                    $product->category_id = $category ? $category->id : null;
                    $product->style_id = $style ? $style->id : null;
                    $product->colour_id = isset($colour) && $colour ? $colour->id : null;
    
                    $product->assembly_id = $assembly ? $assembly->id : null;
                    $product->height = trim(preg_replace('/[^0-9]/', '', $row[12]));
                    $product->width = trim(preg_replace('/[^0-9]/', '', $row[13]));
                    $product->depth = trim(preg_replace('/[^0-9]/', '', $row[14]));
                    $product->length = trim(preg_replace('/[^0-9]/', '', $row[15]));
                    $product->weight = trim(preg_replace('/[^0-9]/', '', $row[16]));
                    $product->dimensions = $row[11];
                    // if (!empty($row[19])) {
                        // $file = $row[19];
                        // $product->image_path = mmadev_store_and_get_image_path_from_url('products', $file);
                    // }
                    $product->image_path = $row[19] ?? null;
                    $product->status = (!empty($row[22]) && ($row[22] == 'in_active' || $row[22] == 'In_Active')) ? 'in_active' : 'active';
                    $product->product_file_id = $this->productId;
                    $product->save();
                }
            }
    
            return;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function chunkSize(): int
    {
        return 100;
    }
}
