<?php

namespace fall\batch\core\step;

use fall\batch\core\StepExecution;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
abstract class AbstractStep implements StepInterface
{
  private $name;

  public function __construct(string $name = '')
  {
    $this->name = $name;
  }

  public function execute(StepExecution $stepExecution): void
  {
    $this->doExecute($stepExecution);
  }

  protected abstract function doExecute(StepExecution $stepExecution): void;
}
