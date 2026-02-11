# Ride Booking (Laravel)

Simple Laravel application providing a Ride Booking API with Passenger, Driver, and Admin flows.

---

## Local Setup

### Prerequisites

* PHP (>= 8.x recommended)
* Laravel 10.x
* Composer
* MySQL

---

### 1. Clone the Repository

```bash
git clone https://github.com/Vipin-Singh15/ride-booking.git
cd ride-booking
```

---

### 2. Install PHP Dependencies

```bash
composer install
```

---

### 3. Environment Setup

Copy the example environment file:

```bash
cp .env.example .env
```

Update your `.env` file with database credentials.

Generate application key:

```bash
php artisan key:generate
```

---

### 4. Run Migrations

```bash
php artisan migrate
```

---

### 5. Start the Application

```bash
php artisan serve
```

The application will be available at:

```
http://127.0.0.1:8000
```

---

## API Endpoints

Available endpoints (no particular order):

* `POST /api/passenger/rides` — Create a ride (Passenger)
* `POST /api/passenger/rides/{ride}/approve-driver` — Approve a driver for a ride (Passenger)
* `POST /api/passenger/rides/{ride}/complete` — Mark ride completed (Passenger)
* `POST /api/driver/location` — Update driver location
* `GET  /api/driver/rides/nearby` — Fetch nearby rides (Driver)

  * Query Parameters: `lat`, `lng`, `radius`
* `POST /api/driver/rides/{ride}/request` — Driver requests a ride
* `POST /api/driver/rides/{ride}/complete` — Driver completes a ride

Refer to `routes/api.php` for controller mappings and implementations.

---

## Admin UI: Rides List

Open the following URL in your browser:

```
/admin/rides
```

### Features

* Displays all rides
* Sortable ID column

  * Click the `ID` header to toggle sorting
  * Uses query parameters:

    * `?sort=id&direction=asc`
    * `?sort=id&direction=desc`

The controller accepts `sort` and `direction` parameters and orders results accordingly.

Rides with no assigned driver display **"Unassigned"** in the Driver column.

---

## Troubleshooting

* If you face issues with the application key, run:

  ```bash
  php artisan key:generate
  ```
* If database errors occur, verify your `.env` configuration.
* If migrations fail, ensure the database exists and credentials are correct.

---

## Notes

* This is a simple Laravel-based Ride Booking API project.
* All API routes are defined inside `routes/api.php`.
* Web/admin routes are defined inside `routes/web.php`.
