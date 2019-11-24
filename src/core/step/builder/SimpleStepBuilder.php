<?php

namespace fall\batch\core\step\builder;

use fall\batch\item\ItemReaderInterface;
use fall\batch\item\ItemProcessorInterface;
use fall\batch\item\ItemWriterInterface;
use fall\batch\core\step\tasklet\CallableTaskletAdapter;
use fall\batch\core\step\tasklet\TaskletStep;
use fall\batch\repeat\RepeatStatus;

/**
 * @author Angelis <angelis@users.noreply.github.com>
 */
class SimpleStepBuilder extends AbstractStepBuilder
{
  private $chunkSize = 50;
  private $itemReader;
  private $itemProcessor;
  private $itemWriter;

  public function __construct()
  {
    $this->itemProcessor = new class implements ItemProcessorInterface
    {
      public function process($item)
      {
        return $item;
      }
    };
  }

  public function build(): TaskletStep
  {
    $taskletStep = new TaskletStep();

    $callable = function (): RepeatStatus {
      $repeatStatus = new RepeatStatus(RepeatStatus::CONTINUABLE);
      $items = [];
      while (true) {
        $item = $this->itemReader->read();
        if ($item === null) {
          $repeatStatus = new RepeatStatus(RepeatStatus::FINISHED);
          break;
        }

        $items[] = $this->itemProcessor->process($item);
      }

      $this->itemWriter->write($items);
      return $repeatStatus;
    };


    $tasklet = new CallableTaskletAdapter();
    $tasklet->setCallable($callable);

    $taskletStep->setTasklet($tasklet);
    return $taskletStep;
  }

  public function chunk(int $chunkSize): SimpleStepBuilder
  {
    $this->chunkSize = $chunkSize;
    return $this;
  }

  public function itemReader(ItemReaderInterface $itemReader): SimpleStepBuilder
  {
    $this->itemReader = $itemReader;
    return $this;
  }

  public function itemProcessor(ItemProcessorInterface $itemProcessor): SimpleStepBuilder
  {
    $this->itemProcessor = $itemProcessor;
    return $this;
  }

  public function itemWriter(ItemWriterInterface $itemWriter): SimpleStepBuilder
  {
    $this->itemWriter = $itemWriter;
    return $this;
  }

  public function getItemReader(): ItemReaderInterface
  {
    return $this->itemReader;
  }

  public function getItemProcessor(): ItemProcessorInterface
  {
    return $this->itemProcessor;
  }

  public function getItemWriter(): ItemWriterInterface
  {
    return $this->itemWriter;
  }
}
