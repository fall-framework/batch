<?php

namespace fall\batch\item\file\aggregator;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class DelimitedLineAggregator extends ExtractorLineAggregator
{
  private $delimiter = ',';

  public function doAggregate(array $args): string
  {
    return \implode($this->delimiter, $args);
  }

  public function setDelimiter(string $delimiter)
  {
    $this->delimiter = $delimiter;
  }
}
