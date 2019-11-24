<?php

namespace fall\batch\item\file\callback;

use fall\core\io\Resource;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface FooterCallback
{
  function writeFooter(Resource $resource);
}
