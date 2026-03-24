@extends('layouts.app')

@section('content')
<style>
    .history-wrapper {
        max-width: 800px;
        margin: 40px auto;
        padding: 0 20px;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .history-card {
        background: white;
        border-radius: 25px;
        box-shadow: 0 12px 35px rgba(0,0,0,0.07);
        margin-bottom: 35px;
        overflow: hidden;
        border: 1px solid #fff0e5;
        transition: transform 0.2s;
    }

    .history-card:hover { transform: translateY(-5px); }

    .card-date {
        background: linear-gradient(to right, #fffaf8, #ffffff);
        padding: 20px 30px;
        border-bottom: 2px solid #fff0e5;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .card-date h3 { margin: 0; color: #333; font-size: 20px; font-weight: 800; }

    .day-badge {
        background: #FF8C42;
        color: white;
        padding: 5px 15px;
        border-radius: 20px;
        font-size: 12px;
        text-transform: uppercase;
        font-weight: bold;
    }

    .daily-stats-summary {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        padding: 25px;
        background: #fdfdfd;
        text-align: center;
        border-bottom: 1px solid #eee;
        gap: 15px;
    }

    .stat-label { font-size: 10px; color: #999; text-transform: uppercase; font-weight: 700; margin-bottom: 5px; }
    .stat-value { font-size: 18px; font-weight: 900; color: #444; }

    .log-details { padding: 25px; background: white; }
    .list-title {
        font-size: 13px;
        font-weight: 800;
        margin-bottom: 15px;
        display: flex;
        align-items: center;
        gap: 10px;
        text-transform: uppercase;
    }
    .food-title { color: #FF8C42; }
    .exercise-title { color: #D7263D; margin-top: 20px; }

    .log-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px dashed #eee;
        font-size: 14px;
    }
    .log-item:last-child { border: none; }

    .item-info { display: flex; flex-direction: column; }
    .item-name { font-weight: 600; color: #444; }
    .item-sub { font-size: 12px; color: #999; }
    .item-val { font-weight: 800; }

    .balance-box {
        padding: 20px 30px;
        background: #fffaf0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-top: 1px solid #ffe0d0;
    }

    .balance-label { font-weight: 700; color: #666; text-transform: uppercase; font-size: 13px; }
    .stat-result { font-size: 20px; font-weight: 900; }
    .positive-balance { color: #2ecc71; }
    .negative-balance { color: #D7263D; }

    .btn-back { display: inline-flex; align-items: center; margin-bottom: 25px; color: #FF8C42; text-decoration: none; font-weight: bold; }
</style>

<div class="history-wrapper">
    <a href="{{ route('calories.index') }}" class="btn-back">← Vissza a napi számítóhoz</a>
    
    <h2 style="color: #D7263D; margin: 0 0 35px; font-size: 28px; font-weight: 900; text-transform: uppercase;">Napló Előzmények 📜</h2>

    @forelse($allDates as $date)
        @php
            $dayExercises = $groupedExercises->get($date) ?? collect();
            $dayFoods = $groupedFoods->get($date) ?? collect();

            $napiEgetes = $dayExercises->sum('kcal_burned');
            
            $bevittKcal = 0; $osszFeherje = 0; $osszSzenhidrat = 0; $osszZsir = 0;

            foreach($dayFoods as $fLog) {
                $ratio = $fLog->quantity / 100;
                $bevittKcal += $fLog->food->calories * $ratio;
                $osszFeherje += $fLog->food->protein * $ratio;
                $osszSzenhidrat += $fLog->food->carb * $ratio;
                $osszZsir += $fLog->food->fat * $ratio;
            }

            $maradekKcal = $napiLimit - ($bevittKcal - $napiEgetes);
        @endphp

        <div class="history-card">
            <div class="card-date">
                <h3>{{ \Carbon\Carbon::parse($date)->translatedFormat('Y. F d.') }}</h3>
                <span class="day-badge">{{ \Carbon\Carbon::parse($date)->translatedFormat('l') }}</span>
            </div>

            <div class="daily-stats-summary">
                <div class="stat-item"><span class="stat-label">Kalória</span><span class="stat-value">{{ round($bevittKcal) }}</span></div>
                <div class="stat-item"><span class="stat-label">Fehérje</span><span class="stat-value">{{ round($osszFeherje) }}g</span></div>
                <div class="stat-item"><span class="stat-label">Szénhidrát</span><span class="stat-value">{{ round($osszSzenhidrat) }}g</span></div>
                <div class="stat-item"><span class="stat-label">Zsír</span><span class="stat-value">{{ round($osszZsir) }}g</span></div>
            </div>

            <div class="log-details">
                <div class="list-title food-title">🍎 Megevett ételek:</div>
                @forelse($dayFoods as $f)
                    <div class="log-item">
                        <div class="item-info">
                            <span class="item-name">{{ $f->food->foodname }}</span>
                            <span class="item-sub">{{ $f->quantity }} gramm</span>
                        </div>
                        <span class="item-val" style="color: #444;">{{ round(($f->food->calories / 100) * $f->quantity) }} kcal</span>
                    </div>
                @empty
                    <p style="font-size: 12px; color: #ccc; margin-bottom: 15px;">Nem rögzítettél ételt.</p>
                @endforelse

                <div class="list-title exercise-title">🏃 Mozgás:</div>
                @forelse($dayExercises as $ex)
                    <div class="log-item">
                        <div class="item-info">
                            <span class="item-name">
                                @switch($ex->exercise_type)
                                    @case('run') Futás @break @case('walk') Séta @break @case('gym') Súlyzós edzés @break
                                    @case('swim') Úszás @break @case('bike') Kerékpár @break @default {{ ucfirst($ex->exercise_type) }}
                                @endswitch
                            </span>
                            <span class="item-sub">{{ $ex->duration }} perc</span>
                        </div>
                        <span class="item-val" style="color: #D7263D;">-{{ $ex->kcal_burned }} kcal</span>
                    </div>
                @empty
                    <p style="font-size: 12px; color: #ccc;">Nem rögzítettél mozgást.</p>
                @endforelse
            </div>

            <div class="balance-box">
                <span class="balance-label">Napi keret maradék:</span>
                <span class="stat-result {{ $maradekKcal >= 0 ? 'positive-balance' : 'negative-balance' }}">
                    {{ round($maradekKcal) }} kcal
                </span>
            </div>
        </div>
    @empty
        <div class="no-data">🏜️ Még nincs rögzített adatod a naplóban.</div>
    @endforelse
</div>
@endsection