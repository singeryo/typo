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
 * Test case for class OLIVER\MonExtension\Controller\AuteurController.
 *
 */
class AuteurControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \OLIVER\MonExtension\Controller\AuteurController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('OLIVER\\MonExtension\\Controller\\AuteurController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllAuteursFromRepositoryAndAssignsThemToView()
	{

		$allAuteurs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$auteurRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\AuteurRepository', array('findAll'), array(), '', FALSE);
		$auteurRepository->expects($this->once())->method('findAll')->will($this->returnValue($allAuteurs));
		$this->inject($this->subject, 'auteurRepository', $auteurRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('auteurs', $allAuteurs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenAuteurToView()
	{
		$auteur = new \OLIVER\MonExtension\Domain\Model\Auteur();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('auteur', $auteur);

		$this->subject->showAction($auteur);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenAuteurToAuteurRepository()
	{
		$auteur = new \OLIVER\MonExtension\Domain\Model\Auteur();

		$auteurRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\AuteurRepository', array('add'), array(), '', FALSE);
		$auteurRepository->expects($this->once())->method('add')->with($auteur);
		$this->inject($this->subject, 'auteurRepository', $auteurRepository);

		$this->subject->createAction($auteur);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenAuteurToView()
	{
		$auteur = new \OLIVER\MonExtension\Domain\Model\Auteur();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('auteur', $auteur);

		$this->subject->editAction($auteur);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenAuteurInAuteurRepository()
	{
		$auteur = new \OLIVER\MonExtension\Domain\Model\Auteur();

		$auteurRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\AuteurRepository', array('update'), array(), '', FALSE);
		$auteurRepository->expects($this->once())->method('update')->with($auteur);
		$this->inject($this->subject, 'auteurRepository', $auteurRepository);

		$this->subject->updateAction($auteur);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenAuteurFromAuteurRepository()
	{
		$auteur = new \OLIVER\MonExtension\Domain\Model\Auteur();

		$auteurRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\AuteurRepository', array('remove'), array(), '', FALSE);
		$auteurRepository->expects($this->once())->method('remove')->with($auteur);
		$this->inject($this->subject, 'auteurRepository', $auteurRepository);

		$this->subject->deleteAction($auteur);
	}
}
