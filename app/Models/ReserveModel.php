<?php

namespace App\Models;

use CodeIgniter\Model;

class ReserveModel extends Model
{
    protected $table = 'reserve';
    protected $allowedFields = ['product_id', 'user_id'];
}