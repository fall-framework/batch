<?php

namespace fall\batch\item\file\callback;

use fall\core\io\Resource;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface HeaderCallback
{
  function writeHeader(Resource $resource);
}
