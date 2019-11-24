<?php

namespace fall\batch\item\file;

use fall\batch\item\ItemReaderInterface;
use fall\core\io\Resource;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface ResourceAwareItemReaderInterface extends ItemReaderInterface
{
  function setResource(Resource $resource): void;
}
