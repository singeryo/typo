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
 * AuteurController
 */
class AuteurController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * auteurRepository
     *
     * @var \OLIVER\MonExtension\Domain\Repository\AuteurRepository
     * @inject
     */
    protected $auteurRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $auteurs = $this->auteurRepository->findAll();
        $this->view->assign('auteurs', $auteurs);
    }
    
    /**
     * action show
     *
     * @param \OLIVER\MonExtension\Domain\Model\Auteur $auteur
     * @return void
     */
    public function showAction(\OLIVER\MonExtension\Domain\Model\Auteur $auteur)
    {
        $this->view->assign('auteur', $auteur);
    }
    
    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {
        
    }
    
    /**
     * action create
     *
     * @param \OLIVER\MonExtension\Domain\Model\Auteur $newAuteur
     * @return void
     */
    public function createAction(\OLIVER\MonExtension\Domain\Model\Auteur $newAuteur)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->auteurRepository->add($newAuteur);
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param \OLIVER\MonExtension\Domain\Model\Auteur $auteur
     * @ignorevalidation $auteur
     * @return void
     */
    public function editAction(\OLIVER\MonExtension\Domain\Model\Auteur $auteur)
    {
        $this->view->assign('auteur', $auteur);
    }
    
    /**
     * action update
     *
     * @param \OLIVER\MonExtension\Domain\Model\Auteur $auteur
     * @return void
     */
    public function updateAction(\OLIVER\MonExtension\Domain\Model\Auteur $auteur)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->auteurRepository->update($auteur);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \OLIVER\MonExtension\Domain\Model\Auteur $auteur
     * @return void
     */
    public function deleteAction(\OLIVER\MonExtension\Domain\Model\Auteur $auteur)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->auteurRepository->remove($auteur);
        $this->redirect('list');
    }

}