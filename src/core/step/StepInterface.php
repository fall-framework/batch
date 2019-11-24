<?php

namespace fall\batch\core\step;

use fall\batch\core\StepExecution;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface StepInterface
{
  function execute(StepExecution $stepExecution): void;
}
