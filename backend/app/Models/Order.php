<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        "qty",
        "total",
        "delivered_at",
        "user_id",
        "coupon_id"
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    /**
     * Chuyển đổi giá trị cột created_at thành chuỗi thời gian tương đối (ví dụ: "2 hours ago").
     *
     * @param  string|null  $value Giá trị gốc của cột created_at
     * @return string Chuỗi thời gian tương đối
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    /**
     * Chuyển đổi giá trị cột delivered_at thành chuỗi thời gian tương đối (ví dụ: "1 day ago").
     * Trả về null nếu delivered_at chưa có giá trị.
     *
     * @param  string|null  $value Giá trị gốc của cột delivered_at
     * @return string|null Chuỗi thời gian tương đối hoặc null nếu không có giá trị
     */
    public function getDeliveredAtAttribute($value)
    {
        if ($value) {
            return Carbon::parse($value)->diffForHumans();
        } else {
            return null;
        }
    }
}
