@extends('layouts.app')

@section('content')

<div class="history-wrapper">
    <a href="{{ route('calories.index') }}" class="btn-back">← Vissza a napi számítóhoz</a>
    
    <h2 style="color: #D7263D; margin: 0 0 35px; font-size: 28px; font-weight: 900; text-transform: uppercase;">Napló Előzmények 📜</h2>

    // Naplóbejegyzések csoportosítása dátum szerint
    @forelse($allDates as $date)
        @php
            // Az adott naphoz tartozó edzések és ételek lekérése
            $dayExercises = $groupedExercises->get($date) ?? collect();
            $dayFoods = $groupedFoods->get($date) ?? collect();

            // Napi elégetett kalória összesítése
            $napiEgetes = $dayExercises->sum('kcal_burned');
            
            // Napi bevitt kalória és makrotápanyagok összesítése
            $bevittKcal = 0; $osszFeherje = 0; $osszSzenhidrat = 0; $osszZsir = 0;


            // Minden ételre kiszámoljuk a bevitt kalóriát és makrotápanyagokat
            foreach($dayFoods as $fLog) {
                if ($fLog-> food) {
                    $ratio = $fLog->quantity / 100;
                    $bevittKcal += $fLog->food->calories * $ratio;
                    $osszFeherje += $fLog->food->protein * $ratio;
                    $osszSzenhidrat += $fLog->food->carb * $ratio;
                    $osszZsir += $fLog->food->fat * $ratio;
                }
            }

            // Napi keret maradék kiszámítása
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
                            <span class="item-name">{{ $f->food ? $f->food->foodname : 'Törölt étel' }}</span>
                            <span class="item-sub">{{ $f->quantity }} gramm</span>
                        </div>
                        <span class="item-val" style="color: #444;">
                            {{ $f->food ? round(($f->food->calories / 100) * $f->quantity) : 0 }} kcal
                        </span>
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