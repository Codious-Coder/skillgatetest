@extends('backend.app') {{-- Using the base layout --}}

@section('title', 'Edit Category')  {{-- Title section --}}

@push('css')   {{-- Page-specific styles go here --}}
    <style>
        /* custom dashboard styles */
    </style>
@endpush


@section('content') {{-- Main dashboard content area --}}
    
@endsection


@push('scripts')   {{-- Page-specific scripts go here --}}
    <script>
        // JS for charts, tables, etc.
    </script>
@endpush