<?php

namespace fall\batch\item\file\aggregator;

use fall\batch\item\file\extractor\FieldExtractor;

abstract class ExtractorLineAggregator implements LineAggregator
{
  private $fieldExtractor;

  public function aggregate($item): string
  {
    $fields = $this->fieldExtractor->extract($item);

    $args = [];
    for ($i = 0; $i < count($fields); $i++) {
      $args[$i] = \is_null($fields[$i]) ? '' : $fields[$i];
    }

    return $this->doAggregate($args);
  }

  public function setFieldExtractor(FieldExtractor $fieldExtractor)
  {
    $this->fieldExtractor = $fieldExtractor;
  }

  protected abstract function doAggregate(array $args): string;
}
