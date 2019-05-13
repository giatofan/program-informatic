<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ContractRequest as StoreRequest;
use App\Http\Requests\ContractRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ContractCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ContractCrudController extends CrudController
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
        $this->crud->setModel('App\Models\Contract');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/contract');
        $this->crud->setEntityNameStrings('contract', 'contracts');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        
        $this->crud->addColumn([
            'name' => 'offer_id',
            'label' => "Ofertă",
            'type' => 'select',
            'entity' => 'offer',
            'attribute' => 'id',
            'model' => "App\Models\Offer"
         ]);

         $this->crud->addColumn([
             'name' => 'start_date',
             'label' => "Început Contract",
             'type' => 'date',
          ]);

          $this->crud->addColumn([
              'name' => 'end_date',
              'label' => "Sfârșit Contract",
              'type' => 'date',
           ]);

         $this->crud->addColumn([
             'name' => 'penalty',
             'label' => "Penalitate/zi Întârziere",
             'type' => 'number',
          ]);

        $this->crud->addField([
            'name' => 'offer_id',
            'label' => "Oferta",
            'type' => 'select2_from_ajax',
            'entity' => 'offer',
            'attribute' => 'name',
            'model' => "App\Models\Offer",
            'data_source' => url("admin/api/offer"),
            'placeholder' => "Alege o ofertă",
            'minimum_input_length' => 0,
            'default' => request()->query('offer_id', false) ?: null
         ]);

         $this->crud->addField([
             'name' => 'start_date',
             'label' => "Început Contract",
             'type' => 'date_picker',
             'hint' => 'Care este prima zi de valabilitate a contractului?'
          ]);

          $this->crud->addField([
              'name' => 'end_date',
              'label' => "Sfârșit Contract",
              'type' => 'date_picker',
              'hint' => 'Care este ultima zi de valabilitate a contractului?'
           ]);

           $this->crud->addField([
               'name' => 'penalty',
               'label' => "Penalizare/zi întarziere",
               'type' => 'number',
               'hint' => 'Care este penalizarea pe zi de întârziere la plată?',
               'suffix' => " EUR",
            ]);

        // add asterisk for fields that are required in ContractRequest
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
