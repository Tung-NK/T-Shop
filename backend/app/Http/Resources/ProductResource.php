<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Đảm bảo dữ liệu của sản phẩm được trả về theo một cấu trúc nhất quán, dễ hiểu, và phù hợp với yêu cầu của API.
     * Cho phép chọn lọc các trường cần trả về, loại bỏ các dữ liệu không cần thiết hoặc nhạy cảm.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array //Hàm này chuyển đổi dữ liệu của model Product thành một mảng, sau đó Laravel tự động chuyển mảng này thành JSON.
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'qty' => $this->qty,
            'price' => $this->price,
            'desc' => $this->desc,
            'category' => $this->category,
            'brand' => $this->brand,
            'colors' => $this->colors,
            'sizes' => $this->sizes,
            'reviews' => $this->reviews,
            'status' => $this->status,
            'thumbnail' => url($this->thumbnail),
            'first_image' => $this->first_image ? asset($this->first_image) : null,
            'second_image' => $this->second_image ? asset($this->second_image) : null,
            'third_image' => $this->third_image ? asset($this->third_image) : null,
        ];
    }
}
