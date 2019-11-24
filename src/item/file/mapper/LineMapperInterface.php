<?php

namespace fall\batch\item\file\mapper;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface LineMapperInterface
{
  function mapLine(string $line, int $lineNumber): object;
}
