<?php

namespace fall\batch\item\file\tokenizer;

use fall\batch\item\file\fieldset\FieldSetInterface;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface LineTokenizerInterface
{
  function tokenize(string $line): FieldSetInterface;
}
