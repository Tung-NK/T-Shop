<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Size;
use Illuminate\Http\Request;

class ProductBrowseController extends Controller
{
    /**
     * Lấy danh sách tất cả sản phẩm (sắp xếp mới nhất),
     * kèm theo thông tin các màu sắc, kích cỡ, thương hiệu và danh mục đang được sử dụng.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return ProductResource::collection(
            Product::with(['colors', 'sizes', 'category', 'brand'])->latest()->get()
        )->additional($this->getFilterData());
    }

    /**
     * Hiển thị chi tiết 1 sản phẩm theo route model binding (slug hoặc id).
     * Bao gồm các mối quan hệ như màu sắc, kích cỡ, đánh giá, danh mục, thương hiệu.
     */
    public function show(Product $product)
    {
        if (!$product) {
            abort(404);
        }

        return ProductResource::make(
            $product->load(['colors', 'sizes', 'reviews', 'category', 'brand'])
        );
    }

    /**
     * Lọc sản phẩm theo danh mục.
     * Trả về danh sách sản phẩm thuộc danh mục đó + các bộ lọc đang có.
     */
    public function filterProductsByCategory(Category $category)
    {
        return ProductResource::collection(
            $category->products()->with(['colors', 'sizes', 'category', 'brand'])->latest()->get()
        )->additional(
            array_merge($this->getFilterData(), ['filter' => $category->name]) //Gửi tên lên bộ lọc để áp dụng
        );
    }

    /**
     * Lọc sản phẩm theo thương hiệu.
     */
    public function filterProductsByBrand(Brand $brand)
    {
        return ProductResource::collection(
            $brand->products()->with(['colors', 'sizes', 'category', 'brand'])->latest()->get()
        )->additional(
            array_merge($this->getFilterData(), ['filter' => $brand->name])
        );
    }

    /**
     * Lọc sản phẩm theo màu sắc.
     */
    public function filterProductsByColor(Color $color)
    {
        return ProductResource::collection(
            $color->products()->with(['colors', 'sizes', 'category', 'brand'])->latest()->get()
        )->additional(
            array_merge($this->getFilterData(), ['filter' => $color->name])
        );
    }

    /**
     * Lọc sản phẩm theo kích cỡ.
     */
    public function filterProductsBySize(Size $size)
    {
        return ProductResource::collection(
            $size->products()->with(['colors', 'sizes', 'category', 'brand'])->latest()->get()
        )->additional(
            array_merge($this->getFilterData(), ['filter' => $size->name])
        );
    }

    /**
     * Tìm sản phẩm theo từ khóa (search term) trong tên sản phẩm.
     */
    public function findProductsByTerm($searchTerm)
    {
        return ProductResource::collection(
            Product::where('name', 'LIKE', '%' . $searchTerm . '%')
                ->with(['colors', 'sizes', 'category', 'brand'])
                ->latest()
                ->get()
        )->additional($this->getFilterData());
    }


    /**
     * Trả về dữ liệu lọc chung: màu, kích cỡ, thương hiệu, danh mục có sản phẩm.
     */
    private function getFilterData()
    {
        return [
            'colors' => Color::has('products')->get(),
            'sizes' => Size::has('products')->get(),
            'brands' => Brand::has('products')->get(),
            'categories' => Category::has('products')->get(),
        ];
    }
}
