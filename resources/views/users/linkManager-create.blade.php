@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"><b>Register Sub Business User</b></div>

                <div class="panel-body">
                  {!! Form::open(['url' => 'user',  'method' => 'POST', 'class' => 'form-horizontal']) !!}
                        {{ csrf_field() }}

                       @if($user->userType=='Manager')
                       <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Role</label>
                            <div class="col-md-6">
                                <select id="userType" name="userType" class="selectpicker">
                                 </option>
                                    @foreach($roles as $key => $value)                                    
                                    <option value="{{ $value->id}}">{{ $value->role}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @endif
                      <div class="form-group">
                      {!!Form::label('Employee','Employee',['class' => 'col-lg-2 control-label ' ]) !!}
                        <div class="col-lg-6 customerbody">
                          <select  name="Uid" class="form-control-heading Employee" id="Employee">
                                    <option></option>
                             @foreach ($linkManagers as $key => $value)
                                     <option  value="{{$value->id}}">{{ $value->name}}</option>
                             @endforeach
                          </select>
                        </div>
                      </div>
                        <!--div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Link Manager</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div-->

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div>
                                    {!! Form::submit('Register', ['class' => 'btn btn-primary'] ) !!}
                                    <button type="button" class="btn btn-success pull-midlle" onclick="window.location='{{ URL::previous() }}'">Cancel</button>
                                </div>
                            </div>
                        </div>
                    {!! Form::close()  !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
