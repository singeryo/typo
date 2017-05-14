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
 * Test case for class OLIVER\MonExtension\Controller\CommentaireController.
 *
 */
class CommentaireControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \OLIVER\MonExtension\Controller\CommentaireController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('OLIVER\\MonExtension\\Controller\\CommentaireController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCommentairesFromRepositoryAndAssignsThemToView()
	{

		$allCommentaires = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$commentaireRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\CommentaireRepository', array('findAll'), array(), '', FALSE);
		$commentaireRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCommentaires));
		$this->inject($this->subject, 'commentaireRepository', $commentaireRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('commentaires', $allCommentaires);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCommentaireToView()
	{
		$commentaire = new \OLIVER\MonExtension\Domain\Model\Commentaire();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('commentaire', $commentaire);

		$this->subject->showAction($commentaire);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCommentaireToCommentaireRepository()
	{
		$commentaire = new \OLIVER\MonExtension\Domain\Model\Commentaire();

		$commentaireRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\CommentaireRepository', array('add'), array(), '', FALSE);
		$commentaireRepository->expects($this->once())->method('add')->with($commentaire);
		$this->inject($this->subject, 'commentaireRepository', $commentaireRepository);

		$this->subject->createAction($commentaire);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenCommentaireToView()
	{
		$commentaire = new \OLIVER\MonExtension\Domain\Model\Commentaire();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('commentaire', $commentaire);

		$this->subject->editAction($commentaire);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenCommentaireInCommentaireRepository()
	{
		$commentaire = new \OLIVER\MonExtension\Domain\Model\Commentaire();

		$commentaireRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\CommentaireRepository', array('update'), array(), '', FALSE);
		$commentaireRepository->expects($this->once())->method('update')->with($commentaire);
		$this->inject($this->subject, 'commentaireRepository', $commentaireRepository);

		$this->subject->updateAction($commentaire);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenCommentaireFromCommentaireRepository()
	{
		$commentaire = new \OLIVER\MonExtension\Domain\Model\Commentaire();

		$commentaireRepository = $this->getMock('OLIVER\\MonExtension\\Domain\\Repository\\CommentaireRepository', array('remove'), array(), '', FALSE);
		$commentaireRepository->expects($this->once())->method('remove')->with($commentaire);
		$this->inject($this->subject, 'commentaireRepository', $commentaireRepository);

		$this->subject->deleteAction($commentaire);
	}
}
