@extends('layouts.app')

@section('content')


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
        
         <div class="form-group">
            <label>Cél súly (kg):</label>
            <input type="number" name="goalWeight" value="{{ $data->goalWeight ?? '' }}" placeholder="pl. 80" required>
        </div>

        <button type="submit" class="submit-btn">
            Adatok frissítése
        </button>
    </form>
</div>
@endsection