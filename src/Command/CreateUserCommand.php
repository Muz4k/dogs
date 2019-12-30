<?php


namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class CreateUserCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'create-dog';

    protected function configure()
    {
        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new dog.')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a dog...')
        ;
        $this
            ->addArgument('userName', InputArgument::REQUIRED, 'What is your name?')
            ->addArgument('dogName', InputArgument::REQUIRED, 'Your dog name?')
        ;
        $this
            ->addOption(
                'breed',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'Choose a breed of dog',
                ['ShibaInu']
            )
            ->addOption(
                'action',
                null,
                InputOption::VALUE_REQUIRED | InputOption::VALUE_IS_ARRAY,
                'what action will the dog do?',
                ['song', 'hunt']
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        // retrieve the argument value using getArgument()
        $output->writeln('Hello, '.$input->getArgument('userName').'! You create a dog.' );
        $output->writeln('His name '.$input->getArgument('dogName').'.');
        $helper = $this->getHelper('question');
        $question = new Question('Please enter the breed of your dog: ', 'ShibaInu');

        $bundleName = $helper->ask($input, $output, $question);
        $output->writeln('Your dog have breed '.$bundleName);

        $question = new ChoiceQuestion(
            'Please select action',
            ['sound', 'hunt'],
            0
        );
        $question->setErrorMessage('Action %s is invalid.');

        $action= $helper->ask($input, $output, $question);
        $output->writeln('Cool, '. $input->getArgument('userName'). '! Look action '. $action .' of your ' . $input->getArgument('dogName'));


        return 0;
    }
}