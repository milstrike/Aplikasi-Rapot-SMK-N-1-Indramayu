@extends('template/t_index')        
@section('content')
 
    <div class="container-fluid" style="margin-top:80px;">
        <div class="row-fluid">
            <div class="span4"></div>
            <div class="span4 paneleverything">
                <div class="well" style="background-color: #ffffff;">
                    <h3>Login Administrator Sekolah</h3>
                    <form method="POST" enctype="multipart/form-data" action="loginadministratorsekolah">	
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="text" id="user_id" name="user_id" placeholder="username" class="span12" required/><br/>
                        <input type="password" id="pass_id" name="pass_id" placeholder="password" class="span12" required/><br/>
                        @if(Session::has('message'))
                        <span class="text-error">{{ Session::get('message') }}</span>
                        @endif
                        <input type="submit" class="btn btn-primary pull-right btn-small" value="Masuk ke Sistem" id="auth_check" name="auth_check" /></<br/><br/>
                    </form>
                    <ul class="unstyled">
                        <li><a href="#" class="btn btn-link" style="text-decoration: none; margin-top:0; padding-top:0; margin-bottom:0; padding-bottom:0;	"><small>Tidak dapat login? hubungi Administrator</small></a></li>
                    </ul>
                </div>
            </div>
            <div class="span4"></div>
        </div>
    </div>
@endsection