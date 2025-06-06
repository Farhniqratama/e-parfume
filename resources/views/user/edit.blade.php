@extends('layouts.default')
@section('title', __( 'Edit Users' ))
@section('content')
<div class="nk-content-inner">
    <div class="nk-content-body">
        <div class="components-preview wide-md mx-auto">
            <div class="nk-block nk-block-lg">
                <div class="nk-block-head">
                    <div class="nk-block-head-content">
                        @include('layouts.partials.notification')
                    </div>
                </div>
                <div class="card card-bordered card-preview" style="padding:30px;">
                    <div class="card-inner">
                        
                        <h4 class="title nk-block-title">Edit Users</h4>
                        <div class="preview-block">
                            <form method="POST" action="{{ URL::to('do-update-user/'.$data->id) }}">
                                @csrf
                                <div class="row gy-4">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Role</label>

                                            <div class="form-control-wrap">
                                                <select class="form-control" name="role" id="role" for="default-05">
                                                    <option value="" selected disabled>-- Select Role --</option>
                                                    <option value="admin" <?php if($data->role == 'admin'){echo 'selected';}?>>Admin</option>
                                                    <option value="manager" <?php if($data->role == 'manager'){echo 'selected';}?>>Manager</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-01">Name</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="nama" id="default-01" placeholder="Input Name" value="{{ $data->name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-02">Email</label>
                                            <div class="form-control-wrap">
                                                <input type="email" class="form-control" name="email" id="default-02" placeholder="Input Email" value="{{ $data->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-03">Username</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" name="username" id="default-03" placeholder="Input Username" value="{{ $data->username }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label class="form-label" for="default-04">Password</label>
                                            <span style="color: red; font-size: 12px; font-weight: normal;margin-left: 20px;">*Fill in the fields below to change the password</span>
                                            <div class="form-control-wrap">
                                                <input type="password" name="password" class="form-control" id="default-04" placeholder="Input Password">
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-sm-12" style="margin-top: 15px;">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">
                                                SAVE CHANGES
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection