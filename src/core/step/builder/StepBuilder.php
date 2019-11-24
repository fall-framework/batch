<?php

namespace fall\batch\core\step\builder;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class StepBuilder extends AbstractStepBuilder
{
  private $name;

  public function __construct(string $name)
  {
    parent::__construct(null);
    $this->name = $name;
  }

  public function chunk(int $chunkSize): SimpleStepBuilder
  {
    return (new SimpleStepBuilder($this))->chunk($chunkSize);
  }
}
