<?php

class generateTemporadasDatesTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = 'temporadas';
    $this->name             = 'generateTemporadasDates';
    $this->briefDescription = 'Crea todos los dias del año que viene.';
    $this->detailedDescription = <<<EOF
The [generateTemporadasDates|INFO] task does things.
Call it with:

  [php symfony generateTemporadasDates|INFO]
EOF;
  }

  protected function execute($arguments = array(), $options = array())
  {
    // initialize the database connection
    $databaseManager = new sfDatabaseManager($this->configuration);
    $connection = $databaseManager->getDatabase($options['connection'])->getConnection();

    // add your code here
	
	TemporadasDatesHandler::insertLocationFirstYear();
	TemporadasDatesHandler::generateSeasons();
    TemporadasDatesHandler::addDaysToAllLocations();
  }
}
