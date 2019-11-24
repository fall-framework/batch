<?php

namespace fall\batch\core\step\tasklet;

use fall\batch\repeat\RepeatStatus;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class CallableTaskletAdapter implements TaskletInterface
{
  private $callable;

  public function execute(): RepeatStatus
  {
    return call_user_func($this->callable);
  }

  public function setCallable(callable $callable)
  {
    $this->callable = $callable;
  }
}
