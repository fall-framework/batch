<?php

namespace fall\batch\core\step\tasklet;

use fall\batch\repeat\RepeatStatus;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface TaskletInterface
{
  function execute(): RepeatStatus;
}
