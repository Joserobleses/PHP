<h1>Dados Locos</h1>
<h2>php_m15</p>
<table>
    <tr><td>
composer install
    </tr></td>
    <tr><td>
php artisan migrate:refresh
    </tr></td>
<tr><td>
php artisan optimize:clear
    </tr></td>
<tr><td>
npm cache clean --force
    </tr></td>
<tr><td>
npm install
    </tr></td>
<tr><td>
php artisan key:generate
    </tr></td>
<tr><td>
php artisan jwt:secret
    </tr></td>
<tr><td>
php artisan serve
    </tr></td>
<tr><td>
npm run watch
    </tr></td>
</table>
<pre>
POST: /players : crea un jugador
PUT /players/{id} : modifica el nom del jugador
POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.
DELETE /players/{id}/games: elimina les tirades del jugador
GET /players/: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits 
GET /players/{id}/games: retorna el llistat de jugades per un jugador.
GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. És a dir, el percentatge mig d’èxits.
GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit
GET /players/ranking/winner: retorna el jugador amb pitjor percentatge d’èxit.

</pre>
