<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * ProductCategories Controller
 *
 * @property \App\Model\Table\ProductCategoriesTable $ProductCategories
 *
 * @method \App\Model\Entity\ProductCategory[] paginate($object = null, array $settings = [])
 */
class ProductCategoriesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $productCategories = $this->paginate($this->ProductCategories);

        $this->set(compact('productCategories'));
        $this->set('_serialize', ['productCategories']);
    }

}
