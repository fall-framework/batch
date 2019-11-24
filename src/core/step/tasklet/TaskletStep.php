<?php

namespace fall\batch\core\step\tasklet;

use fall\batch\core\StepExecution;
use fall\batch\core\step\AbstractStep;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class TaskletStep extends AbstractStep
{
  private $tasklet;

  public function setTasklet(TaskletInterface $tasklet): void
  {
    $this->tasklet = $tasklet;
  }

  public function getTasklet(): TaskletInterface
  {
    return $this->tasklet;
  }

  public function doExecute(StepExecution $stepExecution): void
  {
    $this->tasklet->execute();
  }
}
