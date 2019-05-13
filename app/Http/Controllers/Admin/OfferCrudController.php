<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OfferRequest as StoreRequest;
use App\Http\Requests\OfferRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class OfferCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class OfferCrudController extends CrudController
{
    
    public function __construct() {
        parent::__construct();

        $this->crud->enableExportButtons();
    }

    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Offer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/offer');
        $this->crud->setEntityNameStrings('offer', 'offers');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        $this->crud->addColumn([
            'name' => 'id',
            'label' => "ID",
            'type' => 'number',
         ]);

         $this->crud->addColumn([
             'name' => 'customer_id',
             'label' => "Client",
             'type' => 'select',
             'entity' => 'customer',
             'attribute' => 'name',
             'model' => "App\Models\Customer"
          ]);

         $this->crud->addColumn([
             'name' => 'service_id',
             'label' => "Serviciu Ofertat",
             'type' => 'select',
             'entity' => 'service',
             'attribute' => 'name',
             'model' => "App\Models\Service"
          ]);

          $this->crud->addColumn([
              'name' => 'discount',
              'label' => "Discount",
              'type' => 'number',
           ]);

           $this->crud->addColumn([
               'name' => 'accepted',
               'label' => "A fost acceptată oferta?",
               'type' => 'check',
            ]);

         $this->crud->addField([
             'name' => 'customer_id',
             'label' => "Client",
             'type' => 'select2',
             'entity' => 'customer',
             'attribute' => 'name',
             'model' => "App\Models\Customer",
          ]);

         $this->crud->addField([
             'name' => 'service_id',
             'label' => "Serviciu",
             'type' => 'select2',
             'entity' => 'service',
             'attribute' => 'name',
             'model' => "App\Models\Service",
          ]);

          $this->crud->addField([
              'name' => 'discount',
              'label' => "Discount",
              'type' => 'number',
              'hint' => 'Cât are discount?',
              'suffix' => " EUR",
           ]);

           $this->crud->addField([
               'name' => 'accepted',
               'label' => "A fost acceptată oferta?",
               'type' => 'checkbox',
            ]);

        // add asterisk for fields that are required in OfferRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
