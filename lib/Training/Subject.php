<?php
namespace NgFramework\Training;

class Subject
{
	protected $observers = [];
	protected $name;
	
	public function __construct($name)
	{
		$this->name = $name;
	}
	
	public function attach(Observer $observer)
	{
		$this->observers[] = $observer;
	}
	
	public function doSomething()
	{
		$this->notify('something');
	}
	
	public function notify($argument)
	{
		foreach ($this->observers as $observer) {
			$observer->update($argument);
		}
	}
	
}
