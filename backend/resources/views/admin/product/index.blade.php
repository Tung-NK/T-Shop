@extends('admin.layouts.app')

@section('title')
    Products
@endsection

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="mt-2">
                            Products ({{ $products->count() }})
                        </h3>

                        <div class="d-flex">
                            <a href="{{ route('admin.product.trashed') }}" class="btn btn-sm btn btn-outline-secondary ms-2">
                                <i class="fas fa-trash-restore"></i>
                            </a>
                            {{-- <a href="#" class="btn btn-sm btn-primary ms-2" data-bs-toggle="modal"
                                data-bs-target="#addCategoryModal">
                                <i class="fas fa-plus"></i>
                            </a> --}}

                            <a href="{{route('admin.product.create')}}" class="btn btn-sm btn-primary ms-2">
                                <i class="fas fa-plus"></i>
                            </a>
                        </div>
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
                                    <th class="text-center">Status</th>
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
                                            @if ($product->status)
                                                <span class="badge bg-success p-2">
                                                    In Stock
                                                </span>
                                            @else
                                                <span class="badge bg-danger p-2">
                                                    Out of Stock
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.product.edit', $product->slug) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="deleteItem({{ $product->id }})"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="{{ $product->id }}"
                                                action="{{ route('admin.product.destroy', $product->slug) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
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

    {{-- <div class="modal fade @if ($errors->any()) show @endif" id="addCategoryModal" tabindex="-1"
        aria-labelledby="addCategoryModalLabel" aria-hidden="true"
        @if ($errors->any()) style="display: block;" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.category.store') }}" method="post" id="addCategoryForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name') }}" placeholder="Enter category name">
                            @error('name')
                                <span class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-dark">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const addCategoryModal = new bootstrap.Modal(document.getElementById('addCategoryModal'));
            @if ($errors->any())
                addCategoryModal.show();
            @endif
        });
    </script> --}}
@endsection
