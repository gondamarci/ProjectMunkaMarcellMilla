@extends('layouts.app')

@section('content')
<style>
    .food-container {
        max-width: 1000px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .food-card {
        background: #ffffff;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        padding: 30px;
        margin-bottom: 30px;
        border: 1px solid #f0f0f0;
    }

    .card-title {
        color: #D7263D;
        font-size: 22px;
        font-weight: 800;
        margin-bottom: 25px;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: center;
    }

    .input-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
        gap: 20px;
        margin-bottom: 25px;
    }

    .input-group {
        display: flex;
        flex-direction: column;
    }

    .input-group label {
        font-size: 11px;
        font-weight: 700;
        color: #888;
        margin-bottom: 8px;
        text-transform: uppercase;
    }

    .input-group input, .table-edit-input {
        padding: 12px 15px;
        border: 2px solid #f7f7f7;
        border-radius: 12px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #fafafa;
    }

    .input-group input:focus, .table-edit-input:focus {
        outline: none;
        border-color: #FF8C42;
        background: #fff;
        box-shadow: 0 0 8px rgba(255, 140, 66, 0.2);
    }

    .table-edit-input {
        padding: 8px 10px;
        width: 100%;
        box-sizing: border-box;
    }
    .input-num { width: 70px; }

    .btn-add {
        background: linear-gradient(135deg, #FF8C42 0%, #D7263D 100%);
        color: white;
        border: none;
        padding: 15px 25px;
        border-radius: 12px;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
        transition: transform 0.2s, box-shadow 0.2s;
        text-transform: uppercase;
        box-shadow: 0 5px 15px rgba(215, 38, 61, 0.2);
    }

    .btn-add:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(215, 38, 61, 0.3);
    }

    .btn-icon {
        border: none;
        background: none;
        cursor: pointer;
        font-size: 18px;
        transition: transform 0.2s;
        padding: 5px;
    }
    .btn-icon:hover { transform: scale(1.2); }

    .table-wrapper { overflow-x: auto; }
    .food-table { width: 100%; border-collapse: separate; border-spacing: 0; margin-top: 10px; }
    .food-table th {
        background: #fffaf8;
        color: #D7263D;
        font-size: 11px;
        font-weight: 800;
        text-transform: uppercase;
        padding: 15px 10px;
        text-align: left;
        border-bottom: 2px solid #fff0e5;
    }
    .food-table td { padding: 10px 5px; border-bottom: 1px solid #f4f4f4; }

    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 15px;
        border-radius: 12px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: 600;
    }
</style>

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
                                    <button type="submit" class="btn-icon" title="Mentés">💾</button>
                        </form>
                                    <form action="{{ route('food.destroy', $f->id) }}" method="POST" onsubmit="return confirm('Biztosan törlöd?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-icon" title="Törlés">🗑️</button>
                                    </form>
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