@extends('admin.layouts.app')

@section('title')
    Trashed Products
@endsection

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="mt-2">
                            Trashed Products ({{ $products->count() }})
                        </h3>
                        <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-arrow-left"></i> Back
                        </a>
                    </div>
                    <hr>

                    <div class="card-body">
                        <table class="table table-striped table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Name</th>
                                    <th class="text-center">Slug</th>
                                    <th class="text-center">Category</th>
                                    <th class="text-center">Brand</th>
                                    <th class="text-center">Colors</th>
                                    <th class="text-center">Sizes</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">Image</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $key => $product)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->slug }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ $product->brand->name }}</td>
                                        <td>
                                            @foreach ($product->colors as $color)
                                                <span class="badge rounded-pill text-bg-primary">{{ $color->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($product->sizes as $size)
                                                <span class="badge rounded-pill text-bg-primary">{{ $size->name }}</span>
                                            @endforeach
                                        </td>
                                        <td>{{ $product->qty }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>
                                            <img src="{{ asset($product->thumbnail) }}" alt="{{ $product->name }}"
                                                class="img-fluid rounded mb-1" style="width: 50px; height: 50px;">
                                            @if ($product->first_image)
                                                <img src="{{ asset($product->first_image) }}" alt="{{ $product->name }}"
                                                    class="img-fluid rounded mb-1" style="width: 50px; height: 50px;">
                                            @endif
                                            @if ($product->second_image)
                                                <img src="{{ asset($product->second_image) }}" alt="{{ $product->name }}"
                                                    class="img-fluid rounded mb-1" style="width: 50px; height: 50px;">
                                            @endif
                                            @if ($product->third_image)
                                                <img src="{{ asset($product->third_image) }}" alt="{{ $product->name }}"
                                                    class="img-fluid rounded mb-1" style="width: 50px; height: 50px;">
                                            @endif
                                        </td>
                                        <td>
                                            <form action="{{ route('admin.product.restore', $product->slug) }}"
                                                method="post" style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="fas fa-undo"></i> Restore
                                                </button>
                                            </form>

                                            <a href="#" onclick="deleteItem({{ $product->id }})"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i> Delete Permanently
                                            </a>

                                            <form id="{{ $product->id }}"
                                                action="{{ route('admin.product.forceDelete', $product->slug) }}"
                                                method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE') <!-- Chỉ định phương thức DELETE -->
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
