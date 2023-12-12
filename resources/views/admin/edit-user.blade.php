<!-- resources/views/admin/edit-user.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit User</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}"
                    required>
            </div>

            <button type="submit" class="btn btn-primary">Update User</button>
        </form>
    </div>
@endsection
