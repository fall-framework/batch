<?php

namespace fall\batch\item\file;

use fall\batch\item\file\callback\HeaderCallback;
use fall\batch\item\file\callback\FooterCallback;
use fall\core\io\Resource;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
abstract class AbstractFileItemWriter implements ResourceAwareItemWriterInterface
{
  protected $resource;
  private $headerCallback;
  private $footerCallback;
  private $opened = false;

  protected $lineSeparator = PHP_EOL;

  public function open(): void
  {
    $this->doOpen();
    $this->opened = true;
  }

  public function write(array $items)
  {
    if (!$this->opened) {
      $this->open();
    }

    if ($this->headerCallback !== null) {
      $this->headerCallback->writeHeader($this->resource);
      $this->resource->getOutputStream()->write(\str_split($this->lineSeparator));
    }

    $this->doWrite($items);

    if ($this->footerCallback !== null) {
      $this->footerCallback->writeFooter($this->resource);
    }

    $this->doClose();
  }

  public function setResource(Resource $resource): void
  {
    $this->resource = $resource;
  }

  public function setHeaderCallback(HeaderCallback $headerCallback)
  {
    $this->headerCallback = $headerCallback;
  }
  public function setFooterCallback(FooterCallback $footerCallback)
  {
    $this->footerCallback = $footerCallback;
  }

  protected abstract function doOpen(): void;
  protected abstract function doWrite(array $items): void;
  protected abstract function doClose(): void;
}
