<?php


namespace App\Command;

use App\Dogs\DogChoice;
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
                InputOption::VALUE_REQUIRED,
                'Choose a breed of dog'
            )
            ->addOption(
                'gender',
                null,
                InputOption::VALUE_REQUIRED,
                'What gender will the dog do?'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        // retrieve the argument value using getArgument()
        $output->writeln('Hello, '.$input->getArgument('userName').'! You create a dog.' );
        $output->writeln('His name '.$input->getArgument('dogName').'.');
        $helper = $this->getHelper('question');

        if (empty($input->getOption('gender'))) {
            $question = new ChoiceQuestion(
                'Please select gender your dog',
                ['male', 'female'],
                0
            );
            $gender = $helper->ask($input, $output, $question);
        } else {
            $gender = $input->getOption('gender');
        }
            $output->writeln('Your dog have gender '. $gender);

        if (empty($input->getOption('breed'))) {
            $question = new Question('Please enter the breed of your dog: ', 'ShibaInu');
            $breed = $helper->ask($input, $output, $question);
        } else {
            $breed = $input->getOption('breed');
        }
            $output->writeln('Your dog have breed '. $breed);

            $dogsBreed = new DogChoice($breed, $gender);
            $question = new ChoiceQuestion(
                'Please select action',
                ['sound', 'hunt'],
                0
            );
            $question->setErrorMessage('Action %s is invalid.');
            $action = $helper->ask($input, $output, $question);
            $output->writeln('Cool, '. $input->getArgument('userName'). '!');
            $output->writeln('Look action '. $action .' of your ' . $input->getArgument('dogName'));
            $do = $dogsBreed->getBreed()->$action();
            $output->writeln($do);
        return 0;
    }
}