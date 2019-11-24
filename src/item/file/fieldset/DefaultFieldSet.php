<?php

namespace fall\batch\item\file\fieldset;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class DefaultFieldSet implements FieldSetInterface
{
  private $names;
  private $values;

  public function __construct(array $names, array $values = [])
  {
    $this->names = $names;
    $this->values = $values;
  }

  public function getFieldCount(): int
  {
    return count($this->values);
  }

  public function getNames(): array
  {
    return $this->names;
  }

  public function getValues(): array
  {
    return $this->values;
  }
}
