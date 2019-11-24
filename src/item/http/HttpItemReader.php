<?php

namespace fall\batch\item\http;

use fall\batch\item\ItemReaderInterface;
use fall\core\annotation\Ignore;
use fall\core\traits\Data;
use fall\core\traits\Builder;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class HttpItemReader implements ItemReaderInterface
{

  use Data;
  use Builder;

  private $url;
  private $jpath;

  /**
   * @Ignore()
   */
  private $inited;

  public function read()
  { }
}
