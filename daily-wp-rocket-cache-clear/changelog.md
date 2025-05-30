# Changelog

## [1.2.1] – 2025-05-30

### ✨ Added
- Automatic daily plugin update check scheduled for 10 PM via WP-Cron.
- New cache clear history log with timestamps, type (manual/scheduled), and user.
- Submenu page: “Cache History Log” under Scheduled Tasks (Daily Clear).

### 🧼 Removed
- Manual “Check for Plugin Updates” button from admin UI.

### 🔧 Improved
- Internal event registration and cron safety on activation/deactivation.
- Log now stores last 20 entries and displays newest first.

---

## [1.2.0] – *Previous Release*
- Added plugin update checker via GitHub.
- Scheduled daily WP Rocket cache clearing at 11 PM.
- Admin notice shows clear time once per user per day.
