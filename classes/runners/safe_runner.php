<?php

namespace local_roadrunner\runners;

use core\task\manager;
use core\task\scheduled_task;
use Throwable;
use local_roadrunner\task_runner;
use local_roadrunner\exception\task_execution_failed;

class safe_runner implements task_runner {
    public function run(scheduled_task $task): void {
        ob_start();
        try {
            manager::run_from_cli($task);
        } catch (Throwable $e) {
            ob_end_clean();
            throw new task_execution_failed($task, $e);
        }
        ob_end_clean();
    }
}
