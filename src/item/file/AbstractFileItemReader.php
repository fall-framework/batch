<?php

namespace fall\batch\item\file;

use fall\core\io\Resource;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
abstract class AbstractFileItemReader implements ResourceAwareItemReaderInterface
{
  protected $resource;
  private $opened = false;

  public function open(): void
  {
    $this->doOpen();
    $this->opened = true;
  }

  public function read(): ?object
  {
    if (!$this->opened) {
      $this->open();
    }

    return $this->doRead();
  }

  public function setResource(Resource $resource): void
  {
    $this->resource = $resource;
  }

  protected abstract function doRead(): ?object;
  protected abstract function doOpen(): void;
  protected abstract function doClose(): void;
}
