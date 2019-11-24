<?php

namespace fall\batch\core\configuration\annotation;

use fall\batch\core\repository\JobRepositoryInterface;
use fall\batch\core\step\builder\StepBuilder;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class StepBuilderFactory
{
  private $jobRepository;

  public function __construct(JobRepositoryInterface $jobRepository)
  {
    $this->jobRepository = $jobRepository;
  }

  public function get(string $name): StepBuilder
  {
    return new StepBuilder($name);
  }
}
