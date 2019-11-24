<?php

namespace fall\batch\item\file\extractor;

use fall\core\utils\ReflectionUtils;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class BeanWrapperFieldExtractor implements FieldExtractor
{
  private $names;

  public function extract($item): array
  {
    $values = [];
    foreach ($this->names as $name) {
      $values[] = ReflectionUtils::getFieldValue($item, $name);
    }
    return $values;
  }

  public function setNames(array $names): void
  {
    $this->names = $names;
  }
}
