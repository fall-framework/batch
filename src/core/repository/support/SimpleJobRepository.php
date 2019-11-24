<?php

namespace fall\batch\core\repository\support;

use fall\batch\core\repository\JobRepositoryInterface;
use fall\batch\core\StepExecution;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class SimpleJobRepository implements JobRepositoryInterface
{
  private $stepExecutions = [];

  public function add(StepExecution $stepExecution)
  {
    $this->stepExecutions[] = $stepExecution;
  }
}
