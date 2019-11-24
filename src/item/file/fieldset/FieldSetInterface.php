<?php

namespace fall\batch\item\file\fieldset;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface FieldSetInterface
{
  public function getFieldCount(): int;
  public function getNames(): array;
  public function getValues(): array;
}
