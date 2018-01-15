<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
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
class TempImagesController extends ApiController
{

    /**
     * Delete method
     *
     * @param string|null $id Temp Image id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        if(!$this->request->is(['delete', 'post'])){
            throw new MethodNotAllowedException(__('BAD_REQUEST'));
        }

        $tempImage = $this->TempImages->findById($id)->where(['user_id' => $this->Auth->user('id')])->first();
        
        if (!$tempImage) {
            throw new NotFoundException(__('Image not found.')); 
        }

        if (!$this->TempImages->delete($tempImage)) {
            throw new InternalErrorException(__('Could not be deleted')); 
        }

        $response = ['message' => 'Temp Image has been deleted'];
        $this->set(compact('response'));
        $this->set('_serialize', ['response']);
    }
}
