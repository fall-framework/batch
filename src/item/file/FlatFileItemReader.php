<?php

namespace fall\batch\item\file;

use fall\batch\item\file\mapper\LineMapperInterface;
use fall\core\io\BufferedReader;
use fall\core\io\InputStreamReader;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class FlatFileItemReader extends AbstractFileItemReader
{
  private $lineMapper;
  private $linesToSkip = 0;
  private $lineNumber = 0;
  private $bufferedReader;

  protected function doOpen(): void
  {
    $this->bufferedReader = new BufferedReader(new InputStreamReader($this->resource->getInputStream(), "UTF-8"));
    for ($i = 0; $i < $this->linesToSkip; $i++) {
      $this->readLine();
    }
  }

  protected function doRead(): ?object
  {
    $line = $this->readLine();
    if ($line === null) {
      return null;
    }

    return $this->lineMapper->mapLine($line, $this->lineNumber);
  }

  protected function doClose(): void
  { }

  public function setLinesToSkip(int $linesToSkip)
  {
    $this->linesToSkip = $linesToSkip;
  }

  public function setLineMapper(LineMapperInterface $lineMapper)
  {
    $this->lineMapper = $lineMapper;
  }

  private function readLine(): ?string
  {
    $this->lineNumber++;
    return $this->bufferedReader->readLine();
  }
}
