<?php

namespace fall\batch\item\file\fieldset;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface FieldSetMapperInterface
{
  function mapFieldSet(FieldSetInterface $fieldSet): object;
}
