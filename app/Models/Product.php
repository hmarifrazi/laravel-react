<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    public function category(){
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function manufacturer(){
        return $this->belongsTo(manufacturer::class,'manufacturer_id','id');
    }


    public function subcategory(){
        return $this->belongsTo(subcategory::class,'subcategory_id','id');

    }
    protected $fillable = [
        'name',
        'sku',
        'model_no',
        'product_title',
        'manufacturer_id',
        'category_id',
        'subcategory_id',
        'short_description',
        'long_description',
        'specification',
        'price',
        'discount',
        'vat_status',
        'warranty',
        'product_condition',
        'qty',
        'max_qty',
    ];


}
 // 'manufacturer',
        // 'category',
        // 'subcategory',
