@extends('layouts.admin')

@section('title', 'Customer Management')
@section('content-header', 'Customer Management')
@section('content-actions')
<a href="{{route('customers.create')}}" class="btn btn-success"><i class="fas fa-plus"></i> Add New Customer</a>
@endsection
@section('css')
<link rel="stylesheet" href="{{ asset('plugins/sweetalert2/sweetalert2.min.css') }}">
<style>
    /* Additional custom styling */
    .avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
    }

    .action-btn {
        padding: 8px;
        margin: 2px;
    }
</style>
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                    <tr>
                        <td>{{$customer->id}}</td>
                        <td>
                            <img src="{{$customer->getAvatarUrl()}}" alt="Avatar" class="avatar">
                        </td>
                        <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                        <td>{{$customer->email}}</td>
                        <td>{{$customer->phone}}</td>
                        <td>{{$customer->address}}</td>
                        <td>{{$customer->created_at}}</td>
                        <td>
                            <a href="{{ route('customers.edit', $customer) }}" class="btn btn-primary action-btn" title="Edit"><i class="fas fa-edit"></i></a>
                            <button class="btn btn-danger action-btn btn-delete" data-url="{{route('customers.destroy', $customer)}}" title="Delete"><i class="fas fa-trash"></i></button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{ $customers->render() }}
    </div>
</div>
@endsection

@section('js')
<script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.btn-delete', function() {
            $this = $(this);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "Do you really want to delete this customer?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    $.post($this.data('url'), {
                        _method: 'DELETE',
                        _token: '{{csrf_token()}}'
                    }, function(res) {
                        $this.closest('tr').fadeOut(500, function() {
                            $(this).remove();
                        })
                    })
                }
            })
        })
    })
</script>
@endsection