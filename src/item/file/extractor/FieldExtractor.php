<?php

namespace fall\batch\item\file\extractor;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface FieldExtractor
{
  function extract($item): array;
}
