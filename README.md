# Road Runner — Moodle Local Plugin

**Execute Moodle scheduled tasks manually, safely and programmatically.**

> Inspired by the speed and cleverness of the Road Runner himself. 🐣💨

---

## Features

- 💡 **Interface-based execution** for scheduled tasks
- 🔒 **Safe runner with exception handling and output suppression**
- 🛠️ **CLI-style runner** using Moodle's internal `manager::run_from_cli()`
- 🧼 Designed to be used in Web services, debugging tools or admin dashboards
- 📦 100% standalone — no patching core code

---

## Installation

1. Clone this repository into your Moodle `local/` directory:

```bash
cd your-moodle/local
git clone https://github.com/EHER/moodle-local_roadrunner.git roadrunner
```

2. Visit your Moodle admin page to complete the installation.

---

## Usage

### Programmatic execution

```php
use local_roadrunner\runners\simple_runner;
use local_roadrunner\runners\safe_runner;

// Choose your runner:
$runner = new simple_runner(); // Direct execution with output buffering
// $runner = new safe_runner(); // Simulates cron.php environment with locks

// Run a scheduled task manually
$runner->run(new \your_plugin\task\your_task());
```

If the task fails, a `local_roadrunner\exception\task_execution_failed` will be thrown.

---

## When to use `simple_runner` vs `safe_runner`

| Use Case                          | `simple_runner` | `safe_runner` |
|----------------------------------|------------------|---------------|
| REST endpoints or Web services   | ✅               | ⚠️ risky      |
| Admin tools / debug interfaces   | ✅               | ✅            |
| Respect Moodle cron behavior     | ❌               | ✅            |
| Avoid task locking conflicts     | ❌               | ✅            |

---

## Roadmap

- [ ] Support for `adhoc_task` execution

---

## License

This plugin is licensed under the [GNU GPL v3](https://www.gnu.org/licenses/gpl-3.0.html).

---

## Credits

Built with ❤️ by developers who just wanted a smoother ride:
- No more flipping between terminal and browser just to run a task
- No more `mtrace()` wrecking your JSON or CORS headers
- No more wondering if direct `$task->execute()` will quietly explode

Now we let the Road Runner handle it: fast, clean, and without dropping anvils.
Inspired by the legendary Road Runner: beep beep!
