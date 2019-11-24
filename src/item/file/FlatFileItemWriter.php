<?php

namespace fall\batch\item\file;

use fall\batch\item\file\aggregator\LineAggregator;
use fall\core\io\BufferedWriter;
use fall\core\io\OutputStreamWriter;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class FlatFileItemWriter extends AbstractFileItemWriter
{

  private $bufferedWriter;
  private $lineAggregator;

  public function setLineAggregator(LineAggregator $lineAggregator)
  {
    $this->lineAggregator = $lineAggregator;
  }

  protected function doOpen(): void
  {
    $this->bufferedWriter = new BufferedWriter(new OutputStreamWriter($this->resource->getOutputStream(), 'UTF-8'));
  }

  protected function doWrite(array $items): void
  {
    foreach ($items as $item) {
      $this->bufferedWriter->writeLine($this->lineAggregator->aggregate($item) . $this->lineSeparator);
    }
  }

  protected function doClose(): void
  { }
}
