<?php

namespace fall\batch\core;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class JobExecution extends Entity
{
  public function createStepExecution(string $stepName): StepExecution
  {
    return new StepExecution();
  }
}
