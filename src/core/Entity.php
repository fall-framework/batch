<?php

namespace fall\batch\core;

use fall\core\lang\ComparableInterface;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class Entity implements ComparableInterface
{
  private $id;

  public function __construct(?int $id = NULL)
  {
    $this->id = $id;
  }

  public function getId(): int
  {
    return $this->id;
  }

  public function compareTo(object $object): int
  {
    return $this <=> $object;
  }
}
