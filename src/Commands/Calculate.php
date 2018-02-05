<?php

namespace Calc\Commands;

use Calc\Calculator;
use Calc\Observers\Observer;
use Calc\Services\OperationFinderService;
use Maknz\Slack\Client;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Calculate extends Command
{
    private $calculator;
    private $operationFinder;

    public function __construct($name = null)
    {
        $this->calculator = new Calculator();
        $this->operationFinder = new OperationFinderService();
        $slackClient = new Client(getenv('SLACK_HOOK'));
        $observer = new Observer($slackClient);
        $this->calculator->addObserver($observer);
        parent::__construct($name);
    }

    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('calc')

            // the short description shown while running "php bin/console list"
            ->setDescription('Do selected operation')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to make calculations...')

            ->addArgument('operation', InputArgument::REQUIRED, 'Operation to do')
            // ...

            ->addArgument('operands', InputArgument::REQUIRED, 'operands')
            // ...
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'Start Calculations',
            '==================',
            '',
        ]);

        // retrieve the argument value using getArgument()
        $operation = $input->getArgument('operation');
        $output->writeln('Operation: ' . $operation);

        $result = $this->calculator->doOperation($this->operationFinder->findOperation($input->getArgument('operation')), $input->getArgument('operands'));

        $output->writeln('Result is: ' . $result);
    }
}