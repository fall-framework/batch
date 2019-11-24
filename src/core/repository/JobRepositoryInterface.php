<?php

namespace fall\batch\core\repository;

use fall\batch\core\StepExecution;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface JobRepositoryInterface
{
  function add(StepExecution $stepExecution);
}
