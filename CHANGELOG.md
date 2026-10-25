# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

## [1.1.0] - 2026-10-20

### Added
- RTL support for Play template
- Multi-language support with language switcher
- Arabic sample content for Play template
- Email Filament Resource to view contact form submissions
- Template-specific Livewire components for email handling (Play and Folio)
- Translation support for page blocks using laravel-translatable
- Translation form component using filament-translatable
- Multi-language developer documentation
- Updated README with new features and known issues

### Changed
- Updated Play template with RTL capabilities
- Updated credits to include translation packages

### Known Issues
- Some minor Arabic text is still hardcoded (planned to be dynamic in future updates)
- RTL support needs more testing and refinement for mobile responsiveness

## [1.0.0] - 2026-10-16

### Added
- Initial public release
- Visual page builder with Filament Fabricator
- Pre-loaded templates (Play, Folio)
- Admin panel with Filament
- MySQL Database dump with demo content
- Documentation (README, CREDITS, SECURITY)
- Multi-user support with user_id in pages
- Contact form integration with Livewire
- Dark mode support
- Responsive design
- SQLite database with demo seeder
- Demo admin user (admin@admin.com / admin123)

### Changed
- Updated to Laravel 12
- Updated to Filament 4
- Updated to Tailwind CSS 4
- Removed proprietary templates (Minfo, Upwind)
- Switched to open-source templates only

### Removed
- defstudio/filament-searchable-input
- jantinnerezo/livewire-alert
- defstudio/filament-column-length-limiter
- sweetalert2 npm package
