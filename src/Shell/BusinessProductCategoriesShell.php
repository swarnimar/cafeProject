<?php
namespace App\Shell;

use Cake\Console\Shell;

/**
 * BusinessProductCategories shell command.
 */
class BusinessProductCategoriesShell extends Shell
{

    /**
     * Manage the available sub-commands along with their arguments and help
     *
     * @see http://book.cakephp.org/3.0/en/console-and-shells.html#configuring-options-and-generating-help
     *
     * @return \Cake\Console\ConsoleOptionParser
     */
    public function getOptionParser()
    {
        $parser = parent::getOptionParser();

        return $parser;
    }

    public function addBusinessProductCategories(){
        $this->loadModel('BusinessProductCategories');

        $businesses = $this->BusinessProductCategories
                           ->Businesses
                           ->find()
                           ->all()
                           ->extract('id');

        $productCategories = $this->BusinessProductCategories
                           ->ProductCategories
                           ->find()
                           ->all()
                           ->extract('id');
        $entities = [];

        foreach ($businesses as $key1 => $businessId) {
            foreach ($productCategories as $key2 => $productCategoryId) {
                $entities[] = ['business_id' => $businessId, 'product_category_id' => $productCategoryId];
            }
        }

        $businessProductCategories = $this->BusinessProductCategories->newEntities($entities);

        if($this->BusinessProductCategories->saveMany($businessProductCategories)){
            $this->out('Business Product Categories saved.');
        }else{
            $this->out('Business Product Categories could not be saved.');
        }
    }
}
