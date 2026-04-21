@extends('layouts.app')

@section('content')

<div class="food-container">
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="food-card">
        <h2 class="card-title">🍲 Új étel rögzítése</h2>
        <form action="{{ route('food.store') }}" method="POST">
            @csrf
            <div class="input-group" style="margin-bottom: 20px;">
                <label>Étel megnevezése</label>
                <input type="text" name="foodname" placeholder="Pl: Grillezett csirkemell" required>
            </div>
            
            <div class="input-grid">
                <div class="input-group"><label>Kcal</label><input type="number" step="0.1" name="calories" required></div>
                <div class="input-group"><label>Fehérje (g)</label><input type="number" step="0.1" name="protein" required></div>
                <div class="input-group"><label>Szénhidrát (g)</label><input type="number" step="0.1" name="carb" required></div>
                <div class="input-group"><label>Zsír (g)</label><input type="number" step="0.1" name="fat" required></div>
                <div class="input-group"><label>Rost (g)</label><input type="number" step="0.1" name="fiber" required></div>
            </div>
            
            <button type="submit" class="btn-add">Étel mentése az adatbázisba</button>
        </form>
    </div>

    <div class="food-card">
        <h3 class="card-title" style="color: #444; font-size: 18px;">📚 Adatbázis kezelése</h3>
        <div class="table-wrapper">
            <table class="food-table">
                <thead>
                    <tr>
                        <th>Név</th>
                        <th>Kcal</th>
                        <th>Fehérje</th>
                        <th>Szénhidrát</th>
                        <th>Zsír</th>
                        <th>Rost</th>
                        <th>Műveletek</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($foods as $f)
                    <tr>
                        <form action="{{ route('food.update', $f->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <td><input type="text" name="foodname" value="{{ $f->foodname }}" class="table-edit-input" required></td>
                            <td><input type="number" step="0.1" name="calories" value="{{ $f->calories }}" class="table-edit-input input-num" required></td>
                            <td><input type="number" step="0.1" name="protein" value="{{ $f->protein }}" class="table-edit-input input-num" required></td>
                            <td><input type="number" step="0.1" name="carb" value="{{ $f->carb }}" class="table-edit-input input-num" required></td>
                            <td><input type="number" step="0.1" name="fat" value="{{ $f->fat }}" class="table-edit-input input-num" required></td>
                            <td><input type="number" step="0.1" name="fiber" value="{{ $f->fiber }}" class="table-edit-input input-num" required></td>
                            <td>
                                <div style="display: flex; gap: 5px;">
                                    @if (auth()->user()->is_admin)
                                        <button type="submit" class="btn-icon" title="Mentés">💾</button>
                                    @endif
                        </form>
                                @if (auth()->user()->is_admin)
                                    <form action="{{ route('food.destroy', $f->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon" title="Törlés">🗑️</button>
                                    </form>
                                @else
                                    <button class="btn-icon" title="Nincs jogosultság">🚫</button>
                                @endif

                                </div>
                            </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: #888; padding: 30px;">
                            Még nincsenek ételek az adatbázisban.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection