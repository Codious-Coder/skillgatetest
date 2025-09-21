@extends('backend.app') {{-- Using the base layout --}}

@section('title', 'Create Category')  {{-- Title section --}}

@push('css')   {{-- Page-specific styles go here --}}
    <style>
        /* custom dashboard styles */
    </style>
@endpush



@section('content') {{-- Main dashboard content area --}}
    
    <form action="{{ route('categories.store') }}" method="POST" class="card p-3">
        @csrf
        <div class="col-xl-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Create A New Category</h5>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                        @error('name')<small class="text-danger">{{ $message }}</small>@enderror
                    </div>
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" name="is_active" value="1" checked id="is_active">
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                    <button class="btn btn-primary">Save</button>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div>
    </form>
@endsection


@push('scripts')   {{-- Page-specific scripts go here --}}
    <script>
        // JS for charts, tables, etc.
    </script>
@endpush