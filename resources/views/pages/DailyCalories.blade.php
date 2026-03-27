@extends('layouts.app')
 
@section('content')
@php
    //kördiagram számítása
    $beitt = $elfogyasztott ?? 0;
    $mozgott = $eledzett ?? 0;
    $aktualis = $beitt - $mozgott;
    
    $szazalek = ($napiLimit > 0) ? ($aktualis / $napiLimit) * 100 : 0;
    if($szazalek > 100) $szazalek = 100;
    if($szazalek < 0) $szazalek = 0;
    
    $kerulet = 565;
    $offset = $kerulet - ($szazalek / 100) * $kerulet;
@endphp

<style>
    .dashboard-container {
        display: grid;
        grid-template-columns: 320px 1fr 320px;
        gap: 25px;
        max-width: 1400px;
        margin: 40px auto;
        padding: 0 20px;
        align-items: start;
    }

    .dashboard-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        padding: 25px;
        border-top: 6px solid #FF8C42;
    }

    .card-title {
        color: #D7263D;
        font-size: 16px;
        font-weight: 800;
        text-transform: uppercase;
        text-align: center;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #fffaf8;
    }

    .input-group {
         margin-bottom: 15px; 
    }
    .input-label { font-size: 11px; 
        font-weight: bold; 
        color: #999; 
        display: block; 
        margin-bottom: 5px; 
    }
    .custom-input { 
        width: 100%; 
        padding: 12px; 
        border-radius: 10px; 
        border: 1px solid #ffe0d0; 
        background: #fffcfb; 
        box-sizing: border-box; 
        font-size: 14px;
    }

    .center-card { padding: 0; overflow: hidden; border-top-width: 8px; }
    .header-section { background: #fffaf8; padding: 20px; text-align: center; border-bottom: 1px solid #eee; }
    
    .circle-box { padding: 30px; display: flex; flex-direction: column; align-items: center; }
    .progress-wrapper { position: relative; width: 250px; height: 250px; }
    .progress-circle { transform: rotate(-90deg); }
    .progress-circle circle { fill: none; stroke-width: 16; stroke-linecap: round; }
    .bg-circle { stroke: #f0f0f0; }
    .fg-circle { 
        stroke: url(#gradient); 
        stroke-dasharray: 565; 
        stroke-dashoffset: {{ $offset }}; 
        transition: stroke-dashoffset 0.8s ease-out; 
    }
    .progress-inner-text { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center; width: 100%; }
    .big-num { font-size: 45px; font-weight: 900; color: #333; display: block; }
    .limit-num { color: #888; font-weight: bold; font-size: 16px; }

    .log-section { margin-top: 20px; }
    .log-header { font-size: 11px; color: #FF8C42; font-weight: 800; margin-bottom: 10px; border-bottom: 1px solid #eee; }
    .log-item { 
        display: flex; justify-content: space-between; padding: 10px 0; 
        border-bottom: 1px solid #f5f5f5; font-size: 13px; align-items: center;
    }
    .log-kcal { font-weight: bold; color: #444; }

    .btn-save {
        width: 100%; padding: 14px; border-radius: 10px; border: none;
        background: linear-gradient(135deg, #FF8C42 0%, #D7263D 100%);
        color: white; font-weight: bold; cursor: pointer; text-transform: uppercase;
        box-shadow: 0 4px 15px rgba(215, 38, 61, 0.2); transition: 0.2s;
    }
    .btn-save:hover { transform: translateY(-2px); filter: brightness(1.1); }

    @media (max-width: 1150px) { .dashboard-container { grid-template-columns: 1fr; } }
</style>

<div class="dashboard-container">

    <div class="side-column">
        <div class="dashboard-card">
            <h3 class="card-title">Étel hozzáadása 🍎</h3>
            <form action="{{ route('food.log.store') }}" method="POST">
                @csrf
                <div class="input-group">
                    <span class="input-label">KERESÉS AZ ADATBÁZISBAN</span>
                    <input list="foods-list" name="food_name_search" class="custom-input" placeholder="Gépelj a kereséshez..." onchange="document.getElementById('hidden-food-id').value = document.querySelector('#foods-list option[value=\''+this.value+'\']')?.dataset.id || ''">
                    <datalist id="foods-list">
                        @foreach($foods as $f)
                            <option value="{{ $f->foodname }}" data-id="{{ $f->id }}">({{ round($f->calories) }} kcal/100g)</option>
                        @endforeach
                    </datalist>
                    <input type="hidden" name="food_id" id="hidden-food-id">
                </div>

                <div class="input-group">
                    <span class="input-label">MENNYISÉG (GRAMM)</span>
                    <input type="number" name="amount" class="custom-input" placeholder="pl. 150" required>
                </div>

                <button type="submit" class="btn-save">Hozzáadás +</button>
            </form>

            <div style="margin-top: 40px; border-top: 2px dashed #f0f0f0; padding-top: 20px;">
                <h3 class="card-title" style="color: #666; font-size: 13px;">Gyors bevitel ⚡</h3>
                <form action="{{ route('food.log.quick') }}" method="POST">
                @csrf
                <input type="text" name="quick_name" class="custom-input" placeholder="Megnevezés" required>
                
                <input type="number" name="quick_kcal" class="custom-input" placeholder="Kalória" required>
                
                <button type="submit" class="btn-save">Gyors mentés</button>
            </form>
            </div>
        </div>
    </div>

    <div class="center-column">
        <div class="dashboard-card center-card">
            <div class="header-section">
                <h2 style="margin:0; color:#D7263D; font-weight:900;">SZIA, {{ Auth::user()->username }}! 👋</h2>
                <p style="margin:5px 0 0; color:#888; font-size:14px;">Mai kalória egyenleged</p>
            </div>

            <div class="circle-box">
                <div class="progress-wrapper">
                    <svg class="progress-circle" width="250" height="250">
                        <defs>
                            <linearGradient id="gradient" x1="0%" y1="0%" x2="100%" y2="0%">
                                <stop offset="0%" stop-color="#FF8C42" />
                                <stop offset="100%" stop-color="#D7263D" />
                            </linearGradient>
                        </defs>
                        <circle class="bg-circle" cx="125" cy="125" r="90"></circle>
                        <circle class="fg-circle" cx="125" cy="125" r="90"></circle>
                    </svg>
                    <div class="progress-inner-text">
                        <span class="big-num">{{ round($aktualis) }}</span>
                        <div style="width:40px; height:3px; background:#FF8C42; margin:8px auto; border-radius:10px;"></div>
                        <span class="limit-num">{{ $napiLimit }} kcal</span>
                    </div>
                </div>
            </div>

            <div style="padding: 0 30px 30px;">
                <div style="display: flex; justify-content: space-around; background: #fffaf8; padding: 15px; border-radius: 15px; border: 1px solid #ffe0d0;">
                    <div style="text-align: center;"><span class="input-label">Fehérje</span><span style="font-weight:bold;">{{ round($osszFeherje) }}g</span></div>
                    <div style="text-align: center;"><span class="input-label">Szénhidrát</span><span style="font-weight:bold;">{{ round($osszSzenhidrat) }}g</span></div>
                    <div style="text-align: center;"><span class="input-label">Zsír</span><span style="font-weight:bold;">{{ round($osszZsir) }}g</span></div>
                </div>

                <div style="margin-top: 30px;">
                    <h3 class="card-title" style="font-size:14px; margin-bottom:15px;">Edzés rögzítése 🏃</h3>
                    <form action="{{ route('exercise.store') }}" method="POST">
                        @csrf
                        <div style="display: flex; gap: 10px;">
                            <select name="exercise_type" class="custom-input">
                                <option value="walk">Séta</option>
                                <option value="run">Futás</option>
                                <option value="gym">Súlyzós edzés</option>
                            </select>
                            <input type="number" name="duration" class="custom-input" placeholder="Perc" required>
                            <button type="submit" class="btn-save" style="width: 120px; padding: 10px;">Mentés</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="side-column">
        <div class="dashboard-card">
            <h3 class="card-title">Mai Naplód 📜</h3>
            
            <div class="log-section">
                <div class="log-header">MEGEVETT ÉTELEK</div>
                    @forelse($consumedToday as $item)
                        <div class="log-item">
                            <div style="flex: 1;">
                                <strong>{{ $item->food->foodname }}</strong> ({{ $item->quantity }}g)<br>
                                <span class="log-kcal">{{ round(($item->food->calories / 100) * $item->quantity) }} kcal</span>
                            </div>
                            <form action="{{ route('food.log.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:#D7263D; cursor:pointer; font-size:16px;">🗑️</button>
                            </form>
                        </div>
                    @empty
                        <p style="font-size: 12px; color: #ccc; text-align: center; padding: 10px;">Még nincs étel.</p>
                    @endforelse
                </div>

            <div class="log-section">
                <div class="log-header">ELVÉGZETT EDZÉSEK</div>
                    @forelse(Auth::user()->exercises()->where('date', date('Y-m-d'))->get() as $ex)
                        <div class="log-item" style="border-left: 3px solid #D7263D; padding-left: 10px; background: #fffafa;">
                            <div style="flex: 1;">
                                <strong>{{ ucfirst($ex->exercise_type) }}</strong> ({{ $ex->duration }}p)<br>
                                <span class="log-kcal" style="color:#D7263D;">-{{ $ex->kcal_burned }} kcal</span>
                            </div>
                            <form action="{{ route('exercise.destroy', $ex->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none; border:none; color:#888; cursor:pointer; font-size:16px;">🗑️</button>
                            </form>
                        </div>
                    @empty
                        <p style="font-size: 12px; color: #ccc; text-align: center; padding: 10px;">Még nincs edzés.</p>
                    @endforelse
            </div>

            <div style="margin-top: 30px;">
                <a href="{{ route('profile.edit') }}" style="display:block; text-align:center; color:#FF8C42; font-size:12px; text-decoration:none; font-weight:bold;">⚙️ Profil adatok módosítása</a>
            </div>
        </div>
    </div>

</div>
@endsection