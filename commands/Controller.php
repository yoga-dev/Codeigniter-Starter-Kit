<?php

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Controller extends Command
{
    private $name;
    private $parent;
    private $error;

    protected function configure()
    {
        $this
            ->setName('make:controller')
            ->addArgument('name', InputArgument::REQUIRED)
            ->addArgument('parent', InputArgument::OPTIONAL)
            ->setDescription('Creates a new controller.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->name = ucfirst($input->getArgument('name'));
        $this->parent = $input->getArgument('parent') == '' ? 'MY_Controller' : $input->getArgument('parent');
        $this->_check_class();
        if (!empty($this->error) && $this->error != '') {
            $output->writeln('<error>'.$this->error.'</error>');
        } else {
            $this->createController();
            $output->writeln("<info>'$this->name' controller created successfully!</info>");
        }
    }

    protected function createController()
    {
        $html = '
<?php 
defined(\'BASEPATH\') OR exit(\'No direct script access allowed\');
class '.$this->name.' extends '.$this->parent.' {

	public function index()
	{
		# Add code 
	}
}';

        return file_put_contents('application/controllers/'.$this->name.'.php', trim($html));
    }

    private function _check_class()
    {
        if (file_exists('application/controllers/'.$this->name.'.php')) {
            $this->error = 'Class with this name already exists!';

            return;
        }
        if (!file_exists('application/core/'.$this->parent.'.php')) {
            $this->error = 'Parent class with this name doesn\'t exists!';
        }
    }
}
