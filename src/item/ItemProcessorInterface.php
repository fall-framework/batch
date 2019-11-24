<?php

namespace fall\batch\item;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface ItemProcessorInterface
{
  function process($item);
}
