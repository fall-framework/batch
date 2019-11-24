<?php

namespace fall\batch\item\file\tokenizer;

use fall\batch\item\file\fieldset\DefaultFieldSet;
use fall\batch\item\file\fieldset\FieldSetInterface;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class DelimitedLineTokenizer implements LineTokenizerInterface
{

  private $delimiter = ',';
  private $names = [];

  public function setDelimiter(string $delimiter)
  {
    $this->delimiter = $delimiter;
  }

  public function tokenize(string $line): FieldSetInterface
  {
    return new DefaultFieldSet($this->names, \explode($this->delimiter, $line));
  }

  public function setNames(array $names): void
  {
    $this->names = $names;
  }
}
