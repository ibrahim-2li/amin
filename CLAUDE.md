# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## What This Application Is

**E7 Group** — a Laravel + Inertia.js (Vue 3) corporate website for a Saudi Arabian holding company. It has two distinct layers:

- **Public corporate site** — marketing pages (Home, About, Capabilities/Divisions, Partners, Contact, Sustainability, Quality) using `CorporateLayout`
- **Admin CMS** — authenticated panel for managing all content (divisions, services, partners, contact submissions, about page, site settings) using `AppSidebarLayout`

Authentication is handled by **Laravel Fortify** (including 2FA support).

## Commands

```bash
# Development (starts Laravel + Vite concurrently)
composer run dev

# Run all tests
php artisan test --compact

# Run a single test file or filtered test
php artisan test --compact --filter=DivisionTest
php artisan test --compact tests/Feature/DivisionTest.php

# Lint & format PHP after any PHP edits
vendor/bin/pint --dirty

# Build frontend assets
npm run build

# Generate Wayfinder typed route functions (after adding/changing routes or controllers)
php artisan wayfinder:generate
```

## Architecture

### Data Model

The core content hierarchy is: **Division → Service** (one-to-many). Both use `active()` and `ordered()` Eloquent scopes consistently.

- `About` — singleton-style model; one row holds all about/home page content including a JSON `values` field
- `Setting` — generic key/value store (type-aware); used for stats like employee count, founded year, project count
- `Contact` — inbound form submissions with `status` and `read_at` tracking
- `Partner` — logo + metadata for the partners gallery

### Routing Pattern

All public routes use the `CorporateLayout` and are defined in `routes/web.php`. Admin routes are grouped under `/admin` with `auth` middleware and use the `AppLayout` → `AppSidebarLayout` hierarchy.

### Controller Style

Single-action controllers (`__invoke`) are used for simple public pages (e.g., `HomeController`, `AboutController`, `SustainabilityController`). Resource-style controllers are used in the admin panel.

### Frontend Layout System

- `CorporateLayout.vue` wraps `Navbar.vue` + `Footer.vue` for all public pages
- `AppSidebarLayout.vue` provides the admin sidebar; `AppSidebar.vue` contains the nav items
- `HandleInertiaRequests.php` shares global props (auth user, flash messages, settings) to all pages

### Shared Props (via `HandleInertiaRequests`)

Check `app/Http/Middleware/HandleInertiaRequests.php` for what's available globally in every Vue page without explicit prop passing.

### Settings Access

Site-wide settings (from the `settings` table) are resolved via `Setting::get('key')` or passed as a shared prop. The admin settings page manages these key/value pairs.
