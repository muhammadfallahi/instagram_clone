@extends('layouts.main')
@section('title', 'edit')
@section('content')
  
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="col-12 col-lg-auto mb-3" style="width: 200px;">
  <div class="card p-3" style="position: inherit">
    <div class="mb-2"><b>Block User</b></div>
    <div class="e-navlist e-navlist--active-bg">
      
        
        @foreach ($user->blocks as $block)       {{-- Show block users  --}}
            {{$block->name}}
            <form action="{{ route('block.delete') }}" method="POST"> 
              @method('DELETE')
              @csrf
              <button type="submit" class="btn-primary">unblock</button>
              <input type="hidden" value="{{$block->id}}" name="blocked"><br><br>
          </form>
        @endforeach
      
    </div>
  </div>
</div>
  <div class="col">
    <div class="row">
      <div class="col mb-3">
        <div class="card" style="position: inherit">
          <div class="card-body">
            <div class="e-profile">
              <div class="row">
                <div class="col-12 col-sm-auto mb-3">
                  <div class="mx-auto" style="width: 140px;">
                    <div class="d-flex justify-content-center align-items-center rounded">
                      @php
                          $path = $user->images->last()->path ?? null;
                          $newpath = str_replace("public", "storage", "$path");
                      @endphp
                      <img src="{{ asset($newpath) }}" width="140" height="140" alt="n">
                    </div>
                  </div>
                </div>
                <div class="col d-flex flex-column flex-sm-row justify-content-between mb-3">
                  <div class="text-center text-sm-left mb-2 mb-sm-0">
                    <h4 class="pt-sm-2 pb-1 mb-0 text-nowrap">{{$user->name}}</h4>
                    <p class="mb-0">@ {{$user->username}}</p>
                    <div class="mt-2">
                      <label for="file"><i class="fa fa-camera btn btn-primary"> Change Photo</i></label>
                    </div>
                  </div>
                  <div class="text-center text-sm-right">
                    <div class="text-muted"><small>Join {{$user->created_at}}</small></div>
                  </div>
                </div>
              </div>
              <ul class="nav nav-tabs">
                <li class="nav-item"><span class="active nav-link">Settings</span></li>
              </ul>
              <div class="tab-content pt-3">
                <div class="tab-pane active">
                  <form class="form"  method="post" action="{{ route('user.update', [Auth::user()]) }}" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                    <input type="file" style="display: none" name="file" id="file">
                    <div class="row">
                      <div class="col">
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="name">Full Name</label>
                              <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="username">Username</label>
                              <input class="form-control" type="text" name="username" id="username" value="{{$user->username}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input class="form-control" type="text" name="email" id="email" value="{{$user->email}}">
                            </div>
                          </div>
                          <div class="col">
                            <div class="form-group">
                              <label for="phone_number">phone_number</label>
                              <input class="form-control" type="tel" name="phone_number" id="phone_number" value="{{$user->phone_number}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="website">website</label>
                              <input class="form-control" type="text" name="website" id="website" value="{{$user->website}}">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col mb-3">
                            <div class="form-group">
                              <label for="bio">Bio</label>
                              <textarea class="form-control" rows="5" name="bio" id="bio" placeholder="My Bio" >{{$user->bio}}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-12 col-sm-6 mb-3">
                        <div class="mb-2"><b>Change Password</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="current_password">Current Password</label>
                              <input class="form-control" type="password" name="current_password" id="current_password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="password">New Password</label>
                              <input class="form-control" type="password" name="password" id="password" placeholder="••••••">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col">
                            <div class="form-group">
                              <label for="password_confirmation">Confirm <span class="d-none d-xl-inline">Password</span></label>
                              <input class="form-control" type="password" name="password_confirmation" id="password_confirmation" placeholder="••••••"></div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                        <div class="mb-2"><b>Keeping in Touch</b></div>
                        <div class="row">
                          <div class="col">
                            <div class="custom-controls-stacked px-2">
                              <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="public" name="public" value="1" @if($user->public){{"checked"}} @endif >
                                <label class="custom-control-label" for="public">private profile</label>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Changes</button>
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
  </div>

@endsection


