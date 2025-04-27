<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'discount',
        'valid_until',
    ];

    public function setNameAttribute($value) // Chuyển đổi tên mã giảm giá thành chữ hoa
    {
        $this->attributes['name'] = Str::upper($value);
    }

    public function checkIfValid() // Kiểm tra mã giảm giá có hợp lệ hay không
    {
        if ($this->valid_until > Carbon::now()) {
            return true;
        }else {
            return false;
        }
    }
}
