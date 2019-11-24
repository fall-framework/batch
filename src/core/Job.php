<?php

namespace fall\batch\core;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
interface JobInterface
{
  function execute(JobExecution $jobExecution): void;
  function isRestartable(): bool;
}
