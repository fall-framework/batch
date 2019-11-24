<?php

namespace fall\batch\item;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface ItemWriterInterface
{
  function write(array $items);
}
