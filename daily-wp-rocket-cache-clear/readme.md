# Daily WP Rocket Cache Clear

Automatically clears the WP Rocket cache every night and logs a history of events. Set it once and forget it — stay optimized without lifting a finger.

---

## 🚀 Features

- Clears WP Rocket cache automatically at **11 PM daily**
- Triggers a **plugin update check at 10 PM daily**
- Logs each cache clear (manual or scheduled)
- View cache history: time, type, and who triggered it
- Admin menu: `Scheduled Tasks (Daily Clear)` → `Cache History Log`

---

## 📖 Usage

1. Install and activate the plugin.
2. No further configuration required — everything runs on schedule.
3. To view the history, go to:
   - **Scheduled Tasks (Daily Clear)** > **Cache History Log**

---

## 🧠 How It Works

- Uses WP-Cron to run two tasks:
  - `10:00 PM`: Triggers plugin update check (`wp_update_plugins`)
  - `11:00 PM`: Clears WP Rocket cache using `rocket_clean_domain()`
- Logs up to 20 entries with timestamps, type (manual/scheduled), and user
- Plugin Update Checker is built-in (GitHub releases supported)

---

## 🧩 Requirements

- WordPress 5.0+
- PHP 7.2+
- WP Rocket plugin installed and active
- WP-Cron or server-side cron enabled

---

## 📝 Changelog

See `changelog.md` or [GitHub Releases](https://github.com/hdsemmanuelsantana/daily-wp-rocket-cache-clear/releases)
