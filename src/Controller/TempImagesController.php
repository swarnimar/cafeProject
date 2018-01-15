<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;

/**
 * TempImages Controller
 *
 * @property \App\Model\Table\TempImagesTable $TempImages
 *
 * @method \App\Model\Entity\TempImage[] paginate($object = null, array $settings = [])
 */
class TempImagesController extends AppController
{

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {   

        if (!$this->request->is('post')) {
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $this->request->data['user_id'] = $this->Auth->user('id');

        $tempImage = $this->TempImages->newEntity();
        $tempImage = $this->TempImages->patchEntity($tempImage, $this->request->getData());
        
        if (!$this->TempImages->save($tempImage)) {
            throw new InternalErrorException(__('Could not be saved')); 
        }

        $tempImage = [
            'id' => $tempImage->id,
            'tmp_name' => $this->request->data['image_name']['tmp_name']
        ];

        $this->set(compact('tempImage'));
        $this->set('_serialize', ['tempImage']);
    }

    
}
