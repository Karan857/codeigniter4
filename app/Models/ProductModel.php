<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';
    protected $allowedFields = [
        'name',
        'desc',
        'price',
        'year',
        'brand',
        'image'
    ];
}