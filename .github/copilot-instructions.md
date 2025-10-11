# AI Coding Agent Guide

## Architecture snapshot
- Laravel 12 monolith backed by the SQLite file `database/database.sqlite`.
- Core domain models live in `app/Models`: `RoboticsKit` → `hasMany` `Course`, `Course` → `belongsTo` `RoboticsKit` and `belongsToMany` `User` via the `course_user` pivot, and `User` exposes the reciprocal `courses()` relation.
- Database shape is defined by migrations under `database/migrations`, notably `2025_10_02_005020_create_robotics_kits_table.php`, `2025_10_02_005123_create_courses_table.php`, and `2025_10_02_020100_create_course_user_table.php`.

## Database & seeding
- Factories in `database/factories` (e.g. `CourseFactory` automatically links a `RoboticsKit`) feed seeders located in `database/seeders`.
- `DatabaseSeeder` calls `RoboticsKitSeeder`, `CourseSeeder`, and `UserSeeder`; the latter attaches each user to 1–3 courses to exercise the many-to-many link.
- Rebuild sample data with `php artisan migrate:fresh --seed` (or run the individual seeders after a standard `php artisan migrate`).

## Controllers & routes
- `app/Http/Controllers/RoboticsKitController.php` provides `index`, `create`, and `store`; `store` must call `RoboticsKit::create([...])` and redirect to `robotics.index` to keep the Blade views in sync.
- `routes/web.php` registers `Route::resource('robotics', ...)` limited to those methods, plus explicit `/courses` routes that hit `TestController` for quick DB experiments.
- `UserController@index` (inside the auth middleware group) renders the authenticated user roster; follow that pattern when adding protected dashboard views.

## Views & frontend
- `resources/views/robotics/index.blade.php` renders the list of kits and links to the create form; `create.blade.php` posts back to `robotics.store` and expects only a `name` field.
- Tailwind + Vite pipeline lives under `resources/css` & `resources/js`. Run `npm run dev` for hot-reload or `npm run build` for production assets.

## Workflows
- Install dependencies with `composer install` and `npm install`.
- Dev loop: either run `php artisan serve` alongside `npm run dev`, or use the one-liner `composer run dev` (spawns PHP server, queue listener, log tail via pail, and Vite).
- Tests: `php artisan test` or `composer test`. Note that the bundled password-reset feature tests currently fail because the `ResetPassword` notification is never dispatched; fix or skip them before relying on a green suite.

## Conventions & tips
- Stick to Eloquent relationships already defined; prefer `$model->relation()->attach()`/`sync()` instead of manual pivot inserts.
- When creating new tables, follow the existing migration style (timestamps + FK constraints using `cascadeOnDelete`/`nullOnDelete`).
- Seed data through factories so robotics kits, courses, and users stay linked—mirroring `CourseSeeder` and `UserSeeder` prevents dangling foreign keys.
- Keep new Blade views under `resources/views/robotics` when related to kits/courses, and wire them through named routes in `routes/web.php` so helpers like `route('robotics.create')` keep working.
- Use `TestController` only for throwaway data exercises; production endpoints should live in purpose-specific controllers following the `RoboticsKitController` pattern.

Let me know if other workflows or domains need to be captured here and I can expand the guide.
