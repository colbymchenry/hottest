@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">Dashboard</div>
                </div>

                <div class="card" style="margin-top: 2em;">
                    <div class="card-header">Create Data Server</div>
                    <div class="card-body">
                        <form action="/create_data_server" method="POST">
                            @csrf
                            @honeypot
                            <div class="form-group row">
                                <label for="ip_address" class="col-md-4 col-form-label text-md-right">IP Address</label>

                                <div class="col-md-6">
                                    <input id="ip_address" type="text" class="form-control{{ $errors->has('ip_address') ? ' is-invalid' : '' }}" name="ip_address">

                                    @if ($errors->has('ip_address'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ip_address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="size_gb" class="col-md-4 col-form-label text-md-right">Size (GB)</label>

                                <div class="col-md-6">
                                    <input id="size_gb" type="text" class="form-control{{ $errors->has('size_gb') ? ' is-invalid' : '' }}" name="size_gb">

                                    @if ($errors->has('size_gb'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('size_gb') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>

                                <div class="col-md-6">
                                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username">

                                    @if ($errors->has('username'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <div class="col-md-6">
                                    <input id="password" type="text" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary" onclick="showLoader('Updating prices.', 'This can take up to 5 minutes. Please be patient.')">Update Pricing</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js_after')

@endsection