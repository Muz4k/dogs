<?php


namespace App\Command;

use App\Dogs\DogChoice;
use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\Question;

class DogCommand extends Command
{
    // the name of the command (the part after "bin/console")
    protected static $defaultName = 'create:dog';

    protected function configure()
    {

        $this
            // the short description shown while running "php bin/console list"
            ->setDescription('Creates a new dog.')
            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('This command allows you to create a dog...');
        $this
            ->addArgument('userName', InputArgument::REQUIRED, 'What is your name?')
            ->addArgument('dogName', InputArgument::REQUIRED, 'What is your dog name?');
        $this
            ->addOption(
                'breed',
                'b',
                InputOption::VALUE_REQUIRED,
                'Choose a breed of the dog'
            )
            ->addOption(
                'gender',
                'g',
                InputOption::VALUE_REQUIRED,
                'What gender will the dog have?'
            );
    }

    public function execute(InputInterface $input, OutputInterface $output)
    {
        $breeds = ['Pug', 'ShibaInu', 'Dachshund', 'RubberLabrador'];
        // retrieve the argument value using getArgument()
        $output->writeln('Hello, ' . $input->getArgument('userName') . '! You create the dog.');
        $output->writeln('Dog\'s name: ' . $input->getArgument('dogName') . '.');
        $output->writeln('
        ______Hello! ^__^ __ 
        ______¶¶¶¶¶¶¶¶¶¶¶ 
        ____¶¶¶¶¶¶_____¶¶¶¶ 
        ___¶¶¶____________¶¶¶ 
        _¶¶_¶¶______________¶¶¶ 
        ¶¶__¶¶¶______________¶¶¶ 
        ¶¶_¶¶¶0¶___________¶¶__¶ 
        _¶¶¶¶¶¶¶_____¶¶____¶__¶¶¶ 
        ¶¶¶¶¶_______¶0¶¶__¶¶_¶¶_¶ 
        ¶¶_¶¶_______¶¶¶¶_¶¶_____¶¶ 
        ¶_¶¶¶_¶_________¶¶¶_____¶¶ 
        ¶¶¶¶¶¶_¶¶_____¶¶¶¶______¶¶ 
        __¶¶_¶_¶¶____¶¶¶¶______¶¶¶ 
        ___¶¶¶¶¶___¶¶¶_¶¶____¶¶¶_¶¶ 
        ____¶¶¶¶¶¶¶¶¶__¶¶___¶¶____¶¶_____¶¶¶ 
        ____¶___________¶¶¶¶¶______¶¶_____¶¶¶ 
        ____¶¶___________¶¶_________¶¶____¶_¶ 
        ____¶¶_______________________¶¶___¶_¶ 
        ____¶¶________________________¶_¶¶_¶¶ 
        ____¶¶__________¶¶______¶¶____¶¶¶¶¶¶ 
        ____¶¶¶_¶¶_______¶¶_____¶¶____¶¶¶¶¶ 
        _____¶¶__¶_______¶¶_____¶_____¶¶ 
        _____¶¶___¶¶¶_¶¶__¶_____¶____¶¶ 
        ___¶¶¶¶___¶¶¶¶___¶¶____¶¶__¶¶¶¶ 
        __¶¶¶¶¶___¶¶_¶¶__¶¶____¶¶_¶¶¶¶ 
        _____¶¶¶__¶¶__¶¶_¶_____¶¶¶¶¶¶¶¶ 
        ____¶¶¶¶__¶¶___¶¶¶_____¶¶¶¶¶¶¶¶ 
        ___¶¶¶¶¶¶¶¶¶___¶¶¶¶¶¶¶¶¶ 
        _____¶¶¶¶¶_______¶¶¶¶¶¶ ');

        $helper = $this->getHelper('question');
        $gender = $input->getOption('gender');
        if (!$gender) {
            $genderQuestion = new ChoiceQuestion(
                'Please select gender of your dog',
                ['male', 'female'],
                0
            );
            $gender = $helper->ask($input, $output, $genderQuestion);
        }
        $output->writeln('Your dog have gender ' . $gender);

        $breed = $input->getOption('breed');

        if (!$breed) {
            $breedQuestion = new Question('Please enter breed of your dog (default: ShibaInu): ', 'ShibaInu');
            $breedQuestion->setValidator(function ($answer) use ($breeds) {
                if (!in_array($answer, $breeds)) {
                    throw new Exception('Breed is invalid.');
                }
                return $answer;
            });
            $breed = $helper->ask($input, $output, $breedQuestion);
        }

        $output->writeln('Your dog have breed: ' . $breed);

        $currentDog = new DogChoice($breed, $gender);

        $actionQuestion = new ChoiceQuestion(
            'Please select action:',
            ['sound', 'hunt'],
            0
        );
        $actionQuestion->setErrorMessage('Action %s is invalid.');

        $action = $helper->ask($input, $output, $actionQuestion);
        $output->writeln('Cool, ' . $input->getArgument('userName') . '!');
        $output->writeln('Look action ' . $action . ' of your ' . $input->getArgument('dogName'));

        $currentAction = $currentDog->getBreed()->$action();
        $output->writeln($currentAction);

        return 0;
    }
}