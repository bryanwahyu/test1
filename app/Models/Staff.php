<?php
namespace App\Models;

use CodeIgniter\Model;

class Staff extends Model{
    
    protected $table="staff";
    
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;
    
    protected $allowedFields = ['name','staff_pict', 'email'];
}