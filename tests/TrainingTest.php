<?php
use PHPUnit\Framework\TestCase;
use \NgFramework\Training\Subject;
use \NgFramework\Training\Observer;

class TrainingTest extends testCase
{
	public function testMethodCalls()
	{
		// Create a mock for the Observer class,
		// only mock the update() method.
		$observer = $this->getMockBuilder(Observer::class)
			->setMethods(['update'])
			->getMock();
			
		// Set up the expectation for the update() method
		// to be called only once and with the string 'something'
		// as its parameter.
		$observer->expects($this->once())
			->method('update')
			->with($this->equalTo('something'));
			
		// Create a Subject object and attach the mocked
		// Observer object to it.
		$subject = new Subject('My subject');
		$subject->attach($observer);
		
		// Call the doSomething() method on the $subject object
		// which we expect to call the mocked Observer object's
		// update() method with the string 'something'.
		$subject->doSomething();
	}
}
