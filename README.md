# Sportclub Website

Welkom bij de broncode van de Sportclub website. Dit project is gebouwd met **Laravel** en biedt een platform voor ledenbeheer, nieuws, FAQ's en communicatie.

## Installatiegids

Volg deze stappen om het project lokaal op je machine te laten draaien.

### Vereisten
- PHP >= 8.2
- Composer
- Node.js & NPM
- Een database (MySQL of SQLite)

### Stappenplan

1.  **Clone de repository**
    ```bash
    git clone https://github.com/imadbvi/sportclub-laravel.git
    cd laravel-project
    ```

2.  **Installeer PHP afhankelijkheden**
    ```bash
    composer install
    ```

3.  **Installeer JavaScript afhankelijkheden**
    ```bash
    npm install
    ```

4.  **Omgevingsvariabelen instellen**
    - Maak een kopie van het `.env.example` bestand en noem het `.env`.
    - Vul je databasegegevens in (indien je geen SQLite gebruikt).
    ```bash
    cp .env.example .env
    ```

5.  **Applicatiesleutel genereren**
    ```bash
    php artisan key:generate
    ```

6.  **Database migreren en vullen (Seeden)**
    Dit zorgt ervoor dat de tabellen worden aangemaakt en de standaard admin-gebruiker wordt toegevoegd.
    ```bash
    php artisan migrate:fresh --seed
    ```

7.  **Assets compileren**
    ```bash
    npm run build
    ```

8.  **Server starten**
    ```bash
    php artisan serve
    ```

9.  **Inloggen**
    Ga in je browser naar `http://localhost:8000`.
    - **Admin Login:**
        - Email: `admin@ehb.be`
        - Wachtwoord: `Password!321`

## Bronvermelding

Dit project is tot stand gekomen met behulp van de volgende bronnen en tools:

*   **Laravel Framework**: [https://laravel.com/docs](https://laravel.com/docs) - De officiële documentatie voor routing, controllers, models en migraties.
*   **Laravel Breeze**: Authenticatie scaffolding.
*   **Tailwind CSS**: [https://tailwindcss.com/docs](https://tailwindcss.com/docs) - Gebruikt voor de styling van de interface.
*   **Alpine.js**: Gebruikt voor interactieve elementen zoals dropdowns en de FAQ accordion.
*   **Erasmus Hogeschool Brussel**: Cursusmateriaal Backend Web Development.
*   **ChatGPT**: Gebruikt voor het opsporen van fouten en code-optimalisaties.
