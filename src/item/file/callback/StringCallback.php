<?php

namespace fall\batch\item\file\callback;

use fall\core\io\Resource;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class StringCallback implements HeaderCallback, FooterCallback
{
  private $string;

  public function __construct(string $string)
  {
    $this->string = $string;
  }

  public function writeHeader(Resource $resource)
  {
    $this->doWrite($resource);
  }

  public function writeFooter(Resource $resource)
  {
    $this->doWrite($resource);
  }

  private function doWrite(Resource $resource)
  {
    $resource->getOutputStream()->write(\str_split($this->string));
  }
}
