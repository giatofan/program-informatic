<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ServiceRequest as StoreRequest;
use App\Http\Requests\ServiceRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class ServiceCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ServiceCrudController extends CrudController
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
        $this->crud->setModel('App\Models\Service');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/service');
        $this->crud->setEntityNameStrings('service', 'services');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();

        $this->crud->addColumn([
            'name' => 'name',
            'label' => "Nume Serviciu",
         ]);
         
         $this->crud->addColumn([
             'name' => 'description',
             'label' => "Descriere Serviciu",
          ]);
         
          $this->crud->addColumn([
              'name' => 'price',
              'label' => "Preț Serviciu",
              'type' => "number",
              'suffix' => " EUR",
           ]);

           $this->crud->addField([
               'name' => 'name',
               'label' => "Nume Serviciu",
               'type' => 'text',
               'hint' => 'Care este numele serviciului?',
            ]);

            $this->crud->addField([
                'name' => 'description',
                'label' => "Descriere Serviciu",
                'type' => 'textarea',
                'hint' => 'Cat spatiu? Cat RAM? Ce Procesor?',
             ]);

             $this->crud->addField([
                 'name' => 'price',
                 'label' => "Prețul Serviciului",
                 'type' => 'number',
                 'hint' => 'Ce preț are?',
                 'suffix' => " EUR",
              ]);

        // add asterisk for fields that are required in ServiceRequest
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
