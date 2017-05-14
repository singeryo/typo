<?php
namespace OLIVER\MonExtension\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * CommentaireController
 */
class CommentaireController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * commentaireRepository
     *
     * @var \OLIVER\MonExtension\Domain\Repository\CommentaireRepository
     * @inject
     */
    protected $commentaireRepository = NULL;
    
    /**
     * action list
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @return void
     */
    public function listAction()
    {
        $titres = $this->titreRepository->findAll();
        $this->view->assign('titres', $titres);
    }
    
    /**
     * action show
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @return void
     */
    public function showAction(\OLIVER\MonExtension\Domain\Model\Commentaire $commentaire)
    {
        $this->view->assign('titre', $titre);
    }
    
    /**
     * action new
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @return void
     */
    public function createAction(\OLIVER\MonExtension\Domain\Model\Commentaire $newCommentaire)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->titreRepository->add($newTitre);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @ignorevalidation $commentaire
     * @return void
     */
    public function editAction(\OLIVER\MonExtension\Domain\Model\Commentaire $commentaire)
    {
        $this->view->assign('titre', $titre);
    }
    
    /**
     * action update
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @return void
     */
    public function updateAction(\OLIVER\MonExtension\Domain\Model\Commentaire $commentaire)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->titreRepository->update($titre);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @return void
     */
    public function deleteAction(\OLIVER\MonExtension\Domain\Model\Commentaire $commentaire)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->titreRepository->remove($titre);
        $this->redirect('list');
    }

}