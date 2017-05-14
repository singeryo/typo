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
 * Test case for class OLIVER\MonExtension\Controller\TitreController.
 *
 */
class TitreControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \OLIVER\MonExtension\Controller\TitreController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('OLIVER\\MonExtension\\Controller\\TitreController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllTitresFromRepositoryAndAssignsThemToView()
	{

		$allTitres = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$titreRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\TitreRepository', array('findAll'), array(), '', FALSE);
		$titreRepository->expects($this->once())->method('findAll')->will($this->returnValue($allTitres));
		$this->inject($this->subject, 'titreRepository', $titreRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('titres', $allTitres);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenTitreToView()
	{
		$titre = new \OLIVER\MonExtension\Domain\Model\Titre();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('titre', $titre);

		$this->subject->showAction($titre);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenTitreToTitreRepository()
	{
		$titre = new \OLIVER\MonExtension\Domain\Model\Titre();

		$titreRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\TitreRepository', array('add'), array(), '', FALSE);
		$titreRepository->expects($this->once())->method('add')->with($titre);
		$this->inject($this->subject, 'titreRepository', $titreRepository);

		$this->subject->createAction($titre);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenTitreToView()
	{
		$titre = new \OLIVER\MonExtension\Domain\Model\Titre();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('titre', $titre);

		$this->subject->editAction($titre);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenTitreInTitreRepository()
	{
		$titre = new \OLIVER\MonExtension\Domain\Model\Titre();

		$titreRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\TitreRepository', array('update'), array(), '', FALSE);
		$titreRepository->expects($this->once())->method('update')->with($titre);
		$this->inject($this->subject, 'titreRepository', $titreRepository);

		$this->subject->updateAction($titre);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenTitreFromTitreRepository()
	{
		$titre = new \OLIVER\MonExtension\Domain\Model\Titre();

		$titreRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\TitreRepository', array('remove'), array(), '', FALSE);
		$titreRepository->expects($this->once())->method('remove')->with($titre);
		$this->inject($this->subject, 'titreRepository', $titreRepository);

		$this->subject->deleteAction($titre);
	}
}
