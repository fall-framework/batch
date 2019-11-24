<?php

namespace fall\batch\item\file\mapper;

use fall\batch\item\file\fieldset\FieldSetMapperInterface;
use fall\batch\item\file\tokenizer\LineTokenizerInterface;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class DefaultLineMapper implements LineMapperInterface
{
  private $lineTokenizer;
  private $fieldSetMapper;

  public function mapLine(string $line, int $lineNumber): object
  {
    return $this->fieldSetMapper->mapFieldSet($this->lineTokenizer->tokenize($line));
  }

  public function setLineTokenizer(LineTokenizerInterface $lineTokenizer)
  {
    $this->lineTokenizer = $lineTokenizer;
  }

  public function setFieldSetMapper(FieldSetMapperInterface $fieldSetMapper)
  {
    $this->fieldSetMapper = $fieldSetMapper;
  }
}
