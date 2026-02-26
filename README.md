# Team & Agent Management (Laravel Assignment)

This project includes a **Team & Agent Management** module (Blade CRUD) as per the assignment spec. Web-only, no API. Access to Teams and Agents is restricted to users with the **admin** role.

## Requirements

- PHP 8.1+
- Composer
- MySQL (or compatible DB)
- Laravel 10

## Quick start

1. **Install dependencies**
   ```bash
   composer install
   ```

2. **Configure environment**  
   Copy `.env.example` to `.env` if needed, then set `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`. Run `php artisan key:generate` if no `APP_KEY` is set.

3. **Run migrations**
   ```bash
   php artisan migrate
   ```

4. **Seed users**
   ```bash
   php artisan db:seed
   ```
   This creates an admin user (and promotes the first user to admin if one exists) and a regular user with no admin access.

5. **Start the server**
   ```bash
   php artisan serve
   ```

6. Open **http://localhost:8000** → **Log in** → use **Teams** and **Agents** in the navbar (admin only).

## Test users (after seeding)

| Role    | Email              | Password | Access                          |
|---------|--------------------|----------|----------------------------------|
| Admin   | admin@example.com  | password | Full access to Teams & Agents   |
| User    | user@example.com   | password | Login only; "Access denied" on Teams/Agents |

Only users with `role = admin` can access `/teams` and `/agents`. Others are redirected with the message **"Access denied."**

## Module features

- **Teams:** CRUD (list, create, edit, delete, view). Name, description, status (Active/Inactive). Paginated list.
- **Agents:** CRUD with name, email (unique), phone, team, status. Team required; list paginated.
- **Middleware:** `CheckAdminAccess` — allows only `role = admin`.
- **Validation:** FormRequest for Team (name min 3, status required) and Agent (name min 3, email unique, phone and team_id required).
- **UI:** Bootstrap 5, cards, striped tables, status badges, Create / Edit / Delete / View / Back buttons, flash messages.

## Assignment checklist (per spec PDF)

All requirements from **Mid-Level-Dev (2).pdf** are implemented:

| Requirement | Status |
|-------------|--------|
| **Task overview** | |
| Web routes only (no API) | ✅ |
| MVC structure | ✅ |
| CRUD operations | ✅ |
| FormRequest validation | ✅ |
| Middleware | ✅ |
| Blade templating | ✅ |
| Migrations & Eloquent ORM | ✅ |
| Clean UI/UX (tables, forms, detail pages) | ✅ |
| **Database** | |
| Teams table (id, name, description, status, timestamps) | ✅ |
| Agents table (id, team_id FK, name, email unique, phone, status, timestamps) | ✅ |
| **Team module** – List, Create, Edit, Delete, View Details | ✅ |
| **Agent module** – List, Create, Edit, Delete, View Details | ✅ |
| **Validation** – Team: name required min 3, status required | ✅ |
| **Validation** – Agent: name min 3, email required unique, phone required, team_id required | ✅ |
| **Middleware** – CheckAdminAccess, admin only, “Access denied” for others | ✅ |
| **Blade UI** – Bootstrap, section titles, spacing, Create / Edit / Delete / Back buttons | ✅ |

---