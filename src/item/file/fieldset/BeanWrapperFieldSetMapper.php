<?php

namespace fall\batch\item\file\fieldset;

use fall\core\utils\ReflectionUtils;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class BeanWrapperFieldSetMapper implements FieldSetMapperInterface
{
  private $targetType = DefaultObject::class;

  public function mapFieldSet(FieldSetInterface $fieldSet): object
  {
    $reflectionClass = new \ReflectionClass($this->targetType);
    $object = $reflectionClass->newInstance();

    $names = $fieldSet->getNames();
    $values = $fieldSet->getValues();
    for ($i = 0; $i < $fieldSet->getFieldCount(); $i++) {
      ReflectionUtils::setFieldValue($object, $names[$i], $values[$i]);
    }

    return $object;
  }

  public function setTargetType(string $targetType)
  {
    $this->targetType = $targetType;
  }
}

class DefaultObject extends \StdClass
{ }
