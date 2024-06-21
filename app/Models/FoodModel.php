<?php

namespace App\Models;

use CodeIgniter\Model;

class FoodModel extends Model
{
    protected $table = 'food';
    protected $primaryKey = 'food_id';
    protected $allowedFields = [
        'name',
        'desc',
        'location'
    ];
}