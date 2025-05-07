@extends('admin.layouts.app')

@section('title')
    Size
@endsection

@section('content')
    <div class="row">
        @include('admin.layouts.sidebar')
        <div class="col-md-9">
            <div class="row mt-2">
                <div class="col-md-12">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <h3 class="mt-2">
                            Sizes ({{ $sizes->count() }})
                        </h3>
                        
                        <div class="d-flex">
                            <a href="{{ route('admin.size.trashed') }}" class="btn btn-sm btn btn-outline-secondary ms-2">
                                <i class="fas fa-trash-restore"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-primary ms-2" data-bs-toggle="modal" data-bs-target="#addSizeModal">
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
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($sizes as $key => $size)
                                    <tr>
                                        <td>{{ $key += 1 }}</td>
                                        <td>{{ $size->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.size.edit', $size->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="#" onclick="deleteItem({{ $size->id }})"
                                                class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            <form id="{{ $size->id }}"
                                                action="{{ route('admin.size.destroy', $size->id) }}"
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

    <div class="modal fade @if ($errors->any()) show @endif" id="addSizeModal" tabindex="-1" aria-labelledby="addSizeModalLabel" aria-hidden="true" @if ($errors->any()) style="display: block;" @endif>
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSizeModalLabel">Add New Size</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('admin.size.store') }}" method="post" id="addSizeForm">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name*</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                id="name" value="{{ old('name') }}" placeholder="Enter size name">
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
        document.addEventListener('DOMContentLoaded', function () {
            const addSizeModal = new bootstrap.Modal(document.getElementById('addSizeModal'));
            @if ($errors->any())
                addSizeModal.show();
            @endif
        });
    </script>
@endsection
