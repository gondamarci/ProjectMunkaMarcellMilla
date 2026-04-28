<h2>Előfeltételek</h2>
<ul>
    <li>PHP 8.2+</li>
    <li>Composer</li>
    <li>MySQL</li>
</ul>

<h2>Telepítés lépései</h2>

<div class="step">
    <h3>1. Projekt előkészítése</h3>
    <pre> composer install </pre>
</div>

<div class="step">
    <h3>2. Környezet beállítása</h3>
    <p>Másold az <code>.env.example</code> fájlt <code>.env</code> néven, és add meg az adatbázis adatait.</p>
    <pre> 
          DB_CONNECTION=mysql
          DB_HOST=127.0.0.1
          DB_PORT=3306
          DB_DATABASE=fitappprojectdb
          DB_USERNAME=root
          DB_PASSWORD= 
    </pre>
    <pre>php artisan key:generate</pre>
</div>

<div class="step">
    <h3>3. Adatbázis</h3>
    <pre>php artisan migrate --seed </pre>

</div>

<div class="step">
    <h3>4. Indítás</h3>
    <pre> php artisan serve </pre>
</div>
