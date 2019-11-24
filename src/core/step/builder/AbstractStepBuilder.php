<?php

namespace fall\batch\core\step\builder;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
abstract class AbstractStepBuilder
{
  private $parent;

  public function __construct(?AbstractStepBuilder $parent)
  {
    $this->parent = $parent;
  }
}
