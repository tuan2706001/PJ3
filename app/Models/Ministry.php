<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ministry extends Model
{
    use HasFactory;

    protected $table = "ministry";

    public $timestamps = false;

    public $primaryKey = "mi_id";

    public function getRoleNameAttribute()
    {
        if ($this->mi_permission == 0) {
            return "Quản lý";
        } else {
            return  "Giáo vụ";
        }
    }
    public function getBlockNameAttribute()
    {
        if ($this->mi_status == 0) {
            return "Hoạt động";
        } else {
            return  "Khóa";
        }
    }
}
