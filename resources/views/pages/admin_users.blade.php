@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Felhasználók Kezelése</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Név</th>
                        <th>Email</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <input type="text" name="name" value="{{ $user->username }}" form="form-{{ $user->id }}" class="form-control">
                        </td>
                        <td>
                            <input type="email" name="email" value="{{ $user->email }}" form="form-{{ $user->id }}" class="form-control">
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @if($user->id !== auth()->id())
                                    <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">🗑️</button>
                                    </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection