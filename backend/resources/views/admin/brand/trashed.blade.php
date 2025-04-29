@extends('admin.layouts.app')

@section('title')
    Trashed Brand
@endsection

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="mt-2">
                            Trashed Brand ({{ $brands->count() }})
                        </h3>
                        <a href="{{ route('admin.brand.index') }}" class="btn btn-sm btn-secondary">
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
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $key => $brand)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>{{ $brand->slug }}</td>
                                        <td>
                                            <form action="{{ route('admin.brand.restore', $brand->slug) }}" method="post" style="display: inline-block;">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-success">
                                                    <i class="fas fa-undo"></i> Restore
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.brand.forceDelete', $brand->slug) }}" method="post" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE') <!-- Chỉ định phương thức DELETE -->
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i> Delete Permanently
                                                </button>
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
