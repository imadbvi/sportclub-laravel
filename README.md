# Sportclub Website
> Laravel Web Application

## Over dit project

De Sportclub Website is een webapplicatie ontwikkeld met het Laravel Framework.
Het platform is ontworpen voor het beheren van een sportclub en biedt functionaliteiten zoals ledenbeheer, nieuws, FAQ’s en communicatie, met een aparte beheeromgeving voor administrators.

Dit project werd gerealiseerd in het kader van een educatieve opdracht.

## Functionaliteiten

*   **Gebruikersauthenticatie** (admin en leden)
*   **Beheer van leden**
*   **Nieuwsberichten**
*   **FAQ-pagina** met interactieve accordion
*   **Admin dashboard**
*   **Moderne en responsieve interface**

## Technologieën

*   Laravel (PHP 8.2+)
*   Laravel Breeze (authenticatie)
*   MySQL (via XAMPP)
*   Tailwind CSS
*   Alpine.js
*   Vite / NPM

## Installatie (Windows – XAMPP)

Volg onderstaande stappen om het project lokaal te installeren en uit te voeren.

### Vereisten

*   XAMPP
*   Apache en MySQL geactiveerd
*   PHP versie 8.2 of hoger
*   Composer
*   Node.js & NPM
*   Git (optioneel)

### Installatiestappen

**1. Repository clonen**

Open Command Prompt of PowerShell en navigeer naar een map naar keuze.

```bash
git clone https://github.com/imadbvi/sportclub-laravel.git laravel-project
cd laravel-project
```

**2. Afhankelijkheden installeren**

```bash
composer install
npm install
```

**3. Omgevingsbestand configureren**

Maak het `.env` bestand aan:

```bash
copy .env.example .env
```

Open `.env` en pas de database-instellingen aan naar MySQL (XAMPP).

```ini
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sportclub
DB_USERNAME=root
DB_PASSWORD=
```

Standaard heeft de MySQL root-gebruiker in XAMPP geen wachtwoord.

**4. Database aanmaken**

*   Start Apache en MySQL in het XAMPP Control Panel
*   Ga naar [http://localhost/phpmyadmin](http://localhost/phpmyadmin)
*   Maak een nieuwe database aan met de naam `sportclub`

**5. Applicatie initialiseren**

```bash
php artisan key:generate
php artisan migrate:fresh --seed
```

**6. Frontend assets compileren**

Voor development:

```bash
npm run dev
```

Of een eenmalige productiebuild:

```bash
npm run build
```

**7. Applicatie starten**

```bash
php artisan serve
```

De applicatie is beschikbaar op:

[http://localhost:8000](http://localhost:8000)

Indien nodig kan een alternatieve poort gebruikt worden:

```bash
php artisan serve --port=8080
```

## Inloggegevens

**Administrator**

*   **E-mail:** `admin@ehb.be`
*   **Wachtwoord:** `Password!321`

### Database reset (optioneel)

```bash
php artisan migrate:fresh --seed
```

## Bronnen

*   **Laravel Documentation** — [https://laravel.com/docs](https://laravel.com/docs)
*   **Laravel Breeze** — Authenticatie scaffolding
*   **Tailwind CSS** — [https://tailwindcss.com/docs](https://tailwindcss.com/docs)
*   **Alpine.js** — Interactieve UI-componenten
*   **Erasmus Hogeschool Brussel** — Backend Web Development
*   **ChatGPT** — Debugging en code-optimalisatie

### Aanbevolen Video's
*   **[Install Laravel on Windows (XAMPP & Composer) - DBestech](https://www.youtube.com/watch?v=s97Wc3J5R_c)**
*   **[Laravel 11 Crash Course for Beginners - The Codeholic](https://www.youtube.com/watch?v=dpJDV25tptw)**
