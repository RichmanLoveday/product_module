@extends('layouts.master')
@section('content')
    <div class="content">
        <div class="page-header">
            <div class="page-title">
                <h4>Product List</h4>
                <h6>Manage your Product</h6>
            </div>
            <div class="page-btn">
                <a href="#" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img"
                        class="me-1">Add New Team
                    Member</a>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Photo</th>
                                <th>Date Added</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ Str::limit($product->description, 50) }}</td>
                                    <td>
                                        <div style="width: 50px; height:50px;">
                                            <img src="{{ $product->image }}" alt="product"
                                                style="width:100%; height:100%; object-fit:cover;">
                                        </div>
                                    </td>
                                    <td>{{ $product->created_at->format('jS M, Y') }}</td>

                                    <td class="text-center">
                                        <a class="action-set" href="javascript:void(0);" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ route('products.edit', $product->id) }}"
                                                    class="dropdown-item"><img
                                                        src="{{ asset('assets/img/icons/edit.svg') }}" class="me-2"
                                                        alt="img">Edit</a>
                                            </li>

                                            <li>
                                                <a href="sales-details.html" class="dropdown-item"><img
                                                        src="{{ asset('assets/img/icons/eye1.svg') }}" class="me-2"
                                                        alt="img">Delete</a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @empty
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
