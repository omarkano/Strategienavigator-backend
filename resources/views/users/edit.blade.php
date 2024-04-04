@extends('layouts.layout')

@section('title', 'Edit')

@section('content')
    <div class="container">
        <form action={{ route('users.update', $user->id) }} method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" class="form-control" id="id" name="id" value="{{$user->id}}" readonly>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Benutzername</label>
                <input type="text" class="form-control" id="name"  name="name" value="{{$user->username}}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email"  name="email" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Role</label>
                <select class="form-select" aria-label="Default select example" name="role">
                    @foreach($roles as $role)
                        @if($role->id == $user->role_id)
                            <option selected value="{{$role->id}}">{{$role->name}}</option>
                        @else
                            <option value="{{$role->id}}">{{$role->name}}</option>
                        @endif
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-info" >update</button>
        </form>
    </div>
@endsection

