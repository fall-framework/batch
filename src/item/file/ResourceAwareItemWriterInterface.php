<?php

namespace fall\batch\item\file;

use fall\batch\item\ItemWriterInterface;
use fall\core\io\Resource;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface ResourceAwareItemWriterInterface extends ItemWriterInterface
{
  function setResource(Resource $resource): void;
}
