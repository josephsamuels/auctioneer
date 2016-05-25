@extends('masters.app')

@section('content')
    <div class="login">
        <div class="row">
            <div style="width: 500px">
                <div class="card card-inverse">
                    <div class="card-header card-primary">
                        Login
                    </div>
                    <div class="card-block">
                        <form method="POST" action="login">
                            <fieldset class="form-group row">
                                <label class="col-sm-2 form-control-label">Email</label>
                                <div class="col-sm-10">
                                    <input name="email" type="email" class="form-control" placeholder="Email"/>
                                </div>
                            </fieldset>
                            <fieldset class="form-group row">
                                <label class="col-sm-2 form-control-label">Password</label>
                                <div class="col-sm-10">
                                    <input name="password" type="password" class="form-control" placeholder="Password"/>
                                </div>
                            </fieldset>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="text-xs-right">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
