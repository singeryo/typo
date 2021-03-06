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
 * TitreController
 */
class TitreController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * titreRepository
     *
     * @var \OLIVER\MonExtension\Domain\Repository\TitreRepository
     * @inject
     */
    protected $titreRepository = NULL;
    
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
    public function showAction(\OLIVER\MonExtension\Domain\Model\Titre $titre)
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
    public function createAction(\OLIVER\MonExtension\Domain\Model\Titre $newTitre)
    {
        if(empty($newTitre->getTitle()) || empty($newTitre->getAuthor() || empty($newTitre->getComment())))
            $this->addFlashMessage('Renseignez tous les champs!');

        elseif(!(empty($newTitre->getAuthor())) && !(filter_var($newTitre->getAuthor(), FILTER_VALIDATE_EMAIL)))
            $this->addFlashMessage('L\'auteur doit etre une adresse mail !');

        else
        {
            $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
            $this->titreRepository->add($newTitre);
        }
        $this->redirect('list');
    }
    
    /**
     * action edit
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @ignorevalidation $titre
     * @return void
     */
    public function editAction(\OLIVER\MonExtension\Domain\Model\Titre $titre)
    {
        $this->view->assign('titre', $titre);
    }
    
    /**
     * action update
     *
     * @param OLIVER\MonExtension\Domain\Model\Titre
     * @return void
     */
    public function updateAction(\OLIVER\MonExtension\Domain\Model\Titre $titre)
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
    public function deleteAction(\OLIVER\MonExtension\Domain\Model\Titre $titre)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->titreRepository->remove($titre);
        $this->redirect('list');
    }

}