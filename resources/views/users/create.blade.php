@extends('layout')

@section('content')
    <section id="basic-horizontal-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Add New Data</h4>
                    </div>

                    <div class="card-content">
                        @if ($errors->any())
                            <div class="card-body pt-0">
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible show fade">
                                        <i class="bi bi-file-excel"></i> {{ $error }}

                                        <button type="button" class="btn-close" data-bs-dismiss="alert"
                                            aria-label="Close"></button>
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <div class="card-body pt-0">
                            <form class="form form-horizontal" method="post" action="{{ route('users.store') }}">
                                @csrf

                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="inputGroupSelect01">Role</label>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="inputGroupSelect01" style="padding-right: 0.6rem;padding-left: 0.6rem;"><i class="bi bi-person-badge "></i></label>

                                                <select class="form-select ps-1  @error('role') is-invalid @enderror" id="inputGroupSelect01" name="role">
                                                    <option disabled {{ old('role') ? '' : 'selected' }}>Select Role</option>

                                                    @foreach(config('custom.role') as $key => $value)
                                                        <option value="{{$key}}" {{ (old('role') == $key ) ? 'selected' : '' }}>{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label>Email</label>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" id="email" name="email" value="{{ old('email') }}">

                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="name">Name</label>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" id="name">

                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person-bounding-box"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="username">Username</label>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" name="username" value="{{ old ('username') }}" id="username">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-3">
                                            <label for="password">Password</label>
                                        </div>

                                        <div class="col-md-9">
                                            <div class="form-group has-icon-left">
                                                <div class="position-relative">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror password"
                                                        placeholder="Password" name="password" value="{{ old('password') }}" id="password">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group col-md-9 offset-md-3 mt-1">
                                            <div class='form-check'>
                                                <div class="checkbox">
                                                    <input type="checkbox" id="checkbox2"
                                                        class='form-check-input'>
                                                    <label for="checkbox2">Show Password</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <a href="{{ route('users.index') }}" class="btn btn-light-secondary me-2 mb-1 px-3">Back</a>

                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
			$('#checkbox2').click(function(){
				if($(this).is(':checked')){
                    $('.password').attr('type','text');
                }else{
                    $('.password').attr('type','password');
                }
			})

            $("#username").keyup(function() {
                var username = $(this).val();
                    username = $.trim(username);

                $(this).val(username);
            });

			$("#password").keyup(function() {
                var password = $(this).val();
                    password = $.trim(password);

                $(this).val(password);
            });

			$("#email").keyup(function() {
                var email = $(this).val();
                    email = $.trim(email);

                $(this).val(email);
            });
		});
    </script>
@endsection
