<?php

namespace fall\batch\repeat;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class RepeatStatus
{
  const CONTINUABLE = true;
  const FINISHED = false;

  private $value;

  public function __construct(bool $value)
  {
    $this->value = $value;
  }

  public function continueIf(bool $value): RepeatStatus
  {
    return $value ? new RepeatStatus(RepeatStatus::CONTINUABLE) : new RepeatStatus(RepeatStatus::FINISHED);
  }

  public function and(bool $value): RepeatStatus
  {
    return $this->value && $value ? new RepeatStatus(RepeatStatus::CONTINUABLE) : new RepeatStatus(RepeatStatus::FINISHED);
  }

  public function isContinuable(): bool
  {
    return $this->value === RepeatStatus::CONTINUABLE;
  }

  public function isFinished(): bool
  {
    return $this->value === RepeatStatus::FINISHED;
  }
}
