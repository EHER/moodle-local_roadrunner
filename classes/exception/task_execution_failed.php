<?php

namespace local_roadrunner\exception;

use core\task\scheduled_task;
use moodle_exception;
use Throwable;

class task_execution_failed extends moodle_exception {
    public function __construct(scheduled_task $task, Throwable $previous) {
        $message = 'Execution failed for task: ' . get_class($task) . ' — ' . $previous->getMessage();
        parent::__construct('taskexecutionfailed', 'local_roadrunner', '', null, $message);
        $this->link = '/admin/tool/task/scheduledtasks.php';
    }
}
