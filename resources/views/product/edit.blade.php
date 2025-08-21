@extends('ayouts.master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product Management</h4>
                <h6>Edit Product</h6>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.update', $product->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" value="{{ old('firstName') }}"
                                    class="@error('firstName') is-invalid @enderror form-control" name="firstName">
                                @error('firstName')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-submit me-2">Update</button>
                            <a href="{{ route('products.index') }}" class="btn btn-cancel">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @if (session('status'))
        <script>
            $(document).ready(function() {
                toastr.success("{{ session('status') }}");
            });
        </script>
    @endif
@endsection
