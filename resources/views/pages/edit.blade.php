@extends('layouts.app')

@section('content')
<style>
    .edit-container {
        max-width: 500px;
        margin: 50px auto;
        background: white;
        padding: 40px;
        border-radius: 20px;
        /* Finom narancssárgás árnyék */
        box-shadow: 0 10px 30px rgba(255, 140, 66, 0.2);
        border-top: 6px solid #FF8C42; /* Narancs csík a tetején */
    }

    .edit-container h2 {
        text-align: center;
        margin-bottom: 30px;
        color: #D7263D; /* Dögös pirosas cím */
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: bold;
        color: #444;
    }

    .form-group input[type="date"],
    .form-group input[type="number"],
    .form-group select {
        width: 100%;
        padding: 12px;
        border: 2px solid #fff0e5; /* Nagyon halvány narancs keret */
        border-radius: 10px;
        box-sizing: border-box;
        font-size: 15px;
        transition: all 0.3s ease;
        background-color: #fffaf8;
    }

    /* Fókusz állapot: narancssárga keret */
    .form-group input:focus, 
    .form-group select:focus {
        outline: none;
        border-color: #FF8C42;
        background-color: #fff;
        box-shadow: 0 0 8px rgba(255, 140, 66, 0.2);
    }

    .radio-group {
        margin-bottom: 25px;
        padding: 15px;
        background: #fff5f0;
        border-radius: 10px;
        border: 1px solid #ffe0d0;
    }

    .radio-group label {
        font-weight: bold;
        display: block;
        margin-bottom: 10px;
        color: #D7263D;
    }

    .radio-option {
        margin-right: 20px;
        cursor: pointer;
        font-weight: 500;
    }

    .success-msg {
        background: #fff0f0;
        color: #D7263D;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 25px;
        text-align: center;
        border: 1px solid #ffcccc;
        font-weight: bold;
    }

    .submit-btn {
        width: 100%;
        /* Narancs-piros átmenetes gomb */
        background: linear-gradient(135deg, #FF8C42 0%, #D7263D 100%);
        color: white;
        border: none;
        padding: 15px;
        border-radius: 12px;
        cursor: pointer;
        font-weight: bold;
        font-size: 18px;
        text-transform: uppercase;
        box-shadow: 0 4px 15px rgba(215, 38, 61, 0.3);
        transition: all 0.3s ease;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(215, 38, 61, 0.4);
        filter: brightness(1.1);
    }

    .submit-btn:active {
        transform: translateY(0);
    }
</style>

<div class="edit-container">
    <h2>Személyes adatok</h2>

    @if(session('success'))
        <div class="success-msg">
            🔥 {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label>Születési dátum:</label>
            <input type="date" name="birthDate" value="{{ $data->birthDate ?? '' }}" required>
        </div>

        <div class="radio-group">
            <label>Nem:</label>
            <label class="radio-option">
                <input type="radio" name="gender" value="male" {{ ($data->gender ?? '') == 'male' ? 'checked' : '' }}> Férfi
            </label>
            <label class="radio-option">
                <input type="radio" name="gender" value="female" {{ ($data->gender ?? '') == 'female' ? 'checked' : '' }}> Nő
            </label>
        </div>

        <div class="form-group">
            <label>Magasság (cm):</label>
            <input type="number" name="height" value="{{ $data->height ?? '' }}" placeholder="pl. 180" required>
        </div>

        <div class="form-group">
            <label>Súly (kg):</label>
            <input type="number" name="weight" value="{{ $data->weight ?? '' }}" placeholder="pl. 75" required>
        </div>

        <div class="form-group">
            <label>Életmód (Aktivitás):</label>
            <select name="lifestyle" required>
                <option value="1.2" {{ ($data->lifestyle ?? '') == '1.2' ? 'selected' : '' }}>Ülő életmód (kevés mozgás)</option>
                <option value="1.375" {{ ($data->lifestyle ?? '') == '1.375' ? 'selected' : '' }}>Könnyű aktivitás (heti 1-3 edzés)</option>
                <option value="1.55" {{ ($data->lifestyle ?? '') == '1.55' ? 'selected' : '' }}>Mérsékelt aktivitás (heti 3-5 edzés)</option>
                <option value="1.725" {{ ($data->lifestyle ?? '') == '1.725' ? 'selected' : '' }}>Nagyon aktív (napi edzés)</option>
            </select>
        </div>

        <button type="submit" class="submit-btn">
            Adatok frissítése
        </button>
    </form>
</div>
@endsection