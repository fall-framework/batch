<?php

namespace fall\batch\item\file\aggregator;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface LineAggregator
{
  function aggregate($item): string;
}
