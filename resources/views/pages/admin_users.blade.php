@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4 text-center">Felhasználók Kezelése</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card shadow border-0 overflow-hidden" style="border-radius: 15px;">
        <div class="card-body p-0"> 
            
            <div class="table-wrapper"> 
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th>Név</th>
                            <th>Email</th>
                            <th class="text-nowrap">Súly</th>
                            <th class="text-nowrap">Átlag: kcal</th>
                            <th class="text-center">F - SZ - ZS</th>
                            <th class="text-end px-4">Műveletek</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>
                                <input type="text" name="name" value="{{ $user->username }}" form="form-{{ $user->id }}" class="form-control table-edit-input">
                            </td>
                            <td>
                                <input type="email" name="email" value="{{ $user->email }}" form="form-{{ $user->id }}" class="form-control table-edit-input">
                            </td>
                            <td class="text-center">
                                <span class="badge bg-secondary p-2">{{ $user->current_weight }} kg</span>
                            </td>
                            <td class="text-center">
                                <strong class="text-dark">{{ $user->avg_kcal }}</strong>
                            </td>
                            <td class="text-center">
                                <div class="d-flex flex-column align-items-center">
                                    <small class="text-muted fw-bold">
                                        {{ $user->avg_pro }}g | {{ $user->avg_carb }}g | {{ $user->avg_fat }}g
                                    </small>
                                </div>
                            </td>
                            <td class="text-end px-4">
                                <div class="d-flex justify-content-end gap-2">
                                    @if($user->id !== auth()->id())
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm rounded-circle" title="Törlés">
                                                <span style="font-size: 1.1rem;">🗑️</span>
                                            </button>
                                        </form>
                                    @else
                                        <span class="badge bg-light text-dark border">Saját profil</span>
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
</div>
@endsection