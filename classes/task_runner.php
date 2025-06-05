<?php

namespace local_roadrunner;

use core\task\scheduled_task;

interface task_runner {
    public function run(scheduled_task $task): void;
}
