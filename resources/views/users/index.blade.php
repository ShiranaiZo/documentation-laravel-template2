@extends('layout')

@section('css')
    <style type="text/css">

        /* style "datatable-column-width" is set according to the number of conditions "th" */
        .datatable-column-width{
             width: 140px;
        }

        .datatable-column-action-width{
            width: 145px;
        }

        .datatable-column-number-width{
            width: 40px;
        }
    </style>
@endsection

@section('header')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Users</h3>
        </div>

        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Dashboard</a></li>
                    <li class="breadcrumb-item {{ (request()->is('users*')) ? 'active' : '' }} " aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
    </div>
@endsection

@section('content')
    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('users.create') }}" class="btn btn-success rounded-pill">
                    <i class="fas fa-user-plus me-2"></i>Create
                </a>
            </div>

            @if ( session('success'))
                <div class="card-body pt-0">
                    <div class="alert alert-success alert-dismissible show fade">
                        <i class="bi bi-check-circle"></i> {{ session('success') }}

                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="card-body">
                <table class="table table-striped table-hover" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @if ($users->isNotEmpty())
                            @foreach ($users as $user)
                                <tr>
                                    <td>
                                        <div class="datatable-column-number-width">
                                            {{ $loop->iteration }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="datatable-column-width">
                                            {{ $user->name }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="datatable-column-width">
                                            {{ $user->username }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="datatable-column-width">
                                            {{ $user->email }}
                                        </div>
                                    </td>

                                    <td>
                                        <div class="datatable-column-width">
                                           {{ config('custom.role.'.$user->role)  }}
                                        </div>
                                    </td>

                                    <td align="center">
                                        <div class="datatable-column-action-width">
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning float-start px-3">Edit</a>

                                            <button class="btn btn-danger float-end deleteButton" data-bs-toggle="modal" data-bs-target="#delete" type="button" data-uri="{{ route('users.destroy', $user->id) }}">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="6" align="center">No Data Available!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </section>

    {{-- Modal Delete--}}
        <section id="modal-themes">
            <div class="modal fade text-left" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel120" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header bg-danger">
                            <h5 class="modal-title white" id="myModalLabel120">
                                Delete
                            </h5>

                            <button type="button" class="close"
                                data-bs-dismiss="modal" aria-label="Close">
                                <i data-feather="x"></i>
                            </button>
                        </div>

                        <div class="modal-body">
                            <h2 align="center">Are you sure you want to delete this data?</h2>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                                <i class="bi bi-x d-block d-sm-none"></i>

                                <span class="d-none d-sm-block">No</span>
                            </button>

                            <form action="" method="post" id="deleteForm">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger ml-1">
                                    <i class="bi bi-check d-block d-sm-none"></i>

                                    <span class="d-none d-sm-block">Yes</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    {{-- /Modal Delete --}}
@endsection

@section('js')
    <script>
        $(document).ready(function () {
			$('.deleteButton').click(function(){
                var url = $(this).data('uri');

                $("#deleteForm").attr("action", url);
			})
		});
    </script>

    <script>
        // Datatable
        let table1 = document.querySelector('#table1');

        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
@endsection

