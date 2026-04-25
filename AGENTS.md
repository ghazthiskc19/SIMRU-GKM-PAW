# AGENTS.md

Agent guidance for SIMRU-GKM (Laravel 12).

## Scope
- This project uses Laravel 12 with Blade views and Vite assets.
- Core data access is JSON-file based via [app/Support/JsonStorage.php](app/Support/JsonStorage.php); do not assume Eloquent is the primary data layer for feature work.
- Prefer small, targeted edits and keep existing route names, middleware aliases, and view names stable unless explicitly requested.
- Do not rewrite docs that already exist. Link to existing docs instead.

## First Steps
1. Read [ANALISIS_PROJECT.md](ANALISIS_PROJECT.md) for domain context, but verify against code because it may be outdated.
2. Check routing entry points:
   - [routes/web.php](routes/web.php) loads the route slices and redirects `/` to `/login`.
   - [routes/auth.php](routes/auth.php)
   - [routes/app_pages.php](routes/app_pages.php)
   - [routes/bem.php](routes/bem.php)
3. Check middleware aliases in [bootstrap/app.php](bootstrap/app.php) and service bindings in [app/Providers/AppServiceProvider.php](app/Providers/AppServiceProvider.php).

## Build, Run, Test
- Install and bootstrap: `composer run setup`
- Development: `composer run dev`
- Frontend only: `npm run dev`, `npm run build`
- Tests: `composer run test`

## Architecture Conventions
- Keep controllers thin; business logic belongs in services under [app/Services](app/Services).
- Use repository interfaces in [app/Repositories/Contracts](app/Repositories/Contracts) and implementations in [app/Repositories/Json](app/Repositories/Json).
- Bind interfaces in [app/Providers/AppServiceProvider.php](app/Providers/AppServiceProvider.php).
- Session auth uses the `auth.session` middleware alias and role restrictions use the `role` middleware.

## Frontend Conventions
- Views are Blade templates in [resources/views](resources/views).
- Styles and scripts are Vite entrypoints declared in [vite.config.js](vite.config.js).
- When adding or moving a CSS/JS entrypoint, update [vite.config.js](vite.config.js) at the same time.

## Testing Reality
- Test coverage is minimal. Add focused feature/unit tests when behavior changes.

## Common Pitfalls
- [ANALISIS_PROJECT.md](ANALISIS_PROJECT.md) is helpful but can lag behind implementation.
- Login flow currently compares plain password values in service logic; do not silently change auth semantics unless requested.
- Core data files are under [storage/app](storage/app); verify file shape before changing repository logic.

## High-Value Reference Files
- [composer.json](composer.json): canonical scripts and PHP version.
- [bootstrap/app.php](bootstrap/app.php): middleware aliases and routing bootstrap.
- [routes/web.php](routes/web.php): route composition and root redirect.
- [routes/app_pages.php](routes/app_pages.php): authenticated student-facing pages.
- [routes/bem.php](routes/bem.php): BEM-only verification routes.
- [app/Http/Controllers/AuthController.php](app/Http/Controllers/AuthController.php): auth flow pattern.
- [app/Services/Auth/LoginService.php](app/Services/Auth/LoginService.php): service + DTO + repository usage.
- [app/Repositories/Json/JsonUserRepository.php](app/Repositories/Json/JsonUserRepository.php): JSON repository pattern.

## Change Strategy for Agents
- Prefer modifying existing controllers/services/repositories over introducing new abstractions.
- Keep route names and view contracts backward compatible.
- Validate with the smallest meaningful test or manual route check after changes.