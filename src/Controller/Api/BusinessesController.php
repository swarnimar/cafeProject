<?php
namespace App\Controller\Api;

use App\Controller\Api\ApiController;
use Cake\Network\Exception\MethodNotAllowedException;
use Cake\Network\Exception\BadRequestException;
use Cake\Network\Exception\NotFoundException;
use Cake\Network\Exception\InternalErrorException;
use Cake\Auth\DefaultPasswordHasher;
use Cake\I18n\Time;

/**
 * Businesses Controller
 *
 * @property \App\Model\Table\BusinessesTable $Businesses
 *
 * @method \App\Model\Entity\Business[] paginate($object = null, array $settings = [])
 */
class BusinessesController extends ApiController
{

    public function initialize()
    {
        parent::initialize();
    }
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $businesses = $this->Businesses->find()->contain(['BusinessProductCategories.ProductCategories'])->all();

        $this->set(compact('businesses'));
        $this->set('_serialize', ['businesses']);
    }   
}