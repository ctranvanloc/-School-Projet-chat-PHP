<?php
// myapplication/src/sandboxBundle/Command/SocketCommand.php
// Change the namespace according to your bundle
namespace ProtoBundle\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// Ratchet libs
use Ratchet\App;
// Chat instance
use ProtoBundle\Sockets\Chat;

class SocketCommand extends Command
{
	protected function configure()
	{
		$this->setName('sockets:start-chat')
		// the short description shown while running "php bin/console list"
		->setHelp("Starts the chat socket demo")
		// the full command description shown when running the command with
		->setDescription('Starts the chat socket demo')
		;
	}

	protected function execute(InputInterface $input, OutputInterface $output)
	{
		$output->writeln([
				'Chat socket',// A line
				'============',// Another line
				'Starting chat, open your browser.',// Empty line
		]);

		// The domain of your app as first parameter

		// Note : if you got problems during the initialization, add as third parameter '0.0.0.0'
		// to prevent any error related to localhost :
		// $app = new \Ratchet\App('sandbox', 8080,'0.0.0.0');
		// Domain as first parameter
		$app = new App('127.0.0.1', 8080,'0.0.0.0');
		// Add route to chat with the handler as second parameter
		$app->route('/chat', new Chat);

		// To add another routes, then you can use :
		//$app->route('/america-chat', new AmericaChat);
		//$app->route('/europe-chat', new EuropeChat);
		//$app->route('/africa-chat', new AfricaChat);
		//$app->route('/asian-chat', new AsianChat);

		// Run !
		$app->run();
	}
}