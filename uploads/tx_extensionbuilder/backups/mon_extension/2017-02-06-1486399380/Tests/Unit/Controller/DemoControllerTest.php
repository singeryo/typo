<?php
namespace OLIVER\MonExtension\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class OLIVER\MonExtension\Controller\DemoController.
 *
 */
class DemoControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \OLIVER\MonExtension\Controller\DemoController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('OLIVER\\MonExtension\\Controller\\DemoController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllDemosFromRepositoryAndAssignsThemToView()
	{

		$allDemos = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$demoRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\DemoRepository', array('findAll'), array(), '', FALSE);
		$demoRepository->expects($this->once())->method('findAll')->will($this->returnValue($allDemos));
		$this->inject($this->subject, 'demoRepository', $demoRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('demos', $allDemos);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenDemoToView()
	{
		$demo = new \OLIVER\MonExtension\Domain\Model\Demo();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('demo', $demo);

		$this->subject->showAction($demo);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenDemoToDemoRepository()
	{
		$demo = new \OLIVER\MonExtension\Domain\Model\Demo();

		$demoRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\DemoRepository', array('add'), array(), '', FALSE);
		$demoRepository->expects($this->once())->method('add')->with($demo);
		$this->inject($this->subject, 'demoRepository', $demoRepository);

		$this->subject->createAction($demo);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenDemoToView()
	{
		$demo = new \OLIVER\MonExtension\Domain\Model\Demo();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('demo', $demo);

		$this->subject->editAction($demo);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenDemoInDemoRepository()
	{
		$demo = new \OLIVER\MonExtension\Domain\Model\Demo();

		$demoRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\DemoRepository', array('update'), array(), '', FALSE);
		$demoRepository->expects($this->once())->method('update')->with($demo);
		$this->inject($this->subject, 'demoRepository', $demoRepository);

		$this->subject->updateAction($demo);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenDemoFromDemoRepository()
	{
		$demo = new \OLIVER\MonExtension\Domain\Model\Demo();

		$demoRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\DemoRepository', array('remove'), array(), '', FALSE);
		$demoRepository->expects($this->once())->method('remove')->with($demo);
		$this->inject($this->subject, 'demoRepository', $demoRepository);

		$this->subject->deleteAction($demo);
	}
}
