<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CustomerRequest as StoreRequest;
use App\Http\Requests\CustomerRequest as UpdateRequest;
use Backpack\CRUD\CrudPanel;

/**
 * Class CustomerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CustomerCrudController extends CrudController
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
        $this->crud->setModel('App\Models\Customer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/customer');
        $this->crud->setEntityNameStrings('customer', 'customers');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        // $this->crud->setFromDb();
        

        $this->crud->addColumn([
            'name' => 'name',
            'label' => "Nume Client",
         ]);

        $this->crud->addColumn([
            'name' => 'email',
            'label' => "Adresă de E-mail",
            'type' => 'email'
        ]);

        $this->crud->addColumn([
            'name' => 'phone',
            'label' => "Număr Telefon",
        ]);

        $this->crud->addColumn([
            'name' => 'type',
            'label' => "Tipul clientului",
        ]);

        $this->crud->addColumn([
            'name' => 'identity',
            'label' => "CUI/CNP",
        ]);

        $this->crud->addField([
            'name' => 'name',
            'label' => "Nume Client",
            'type' => 'text',
            'hint' => 'Care este numele clientului?',
         ]);

         $this->crud->addField([
             'name' => 'email',
             'label' => "Adresă de E-mail",
             'type' => 'email',
             'hint' => 'Care este e-mailul clientului?',
          ]);

          $this->crud->addField([
              'name' => 'phone',
              'label' => "Telefon",
              'type' => 'text',
              'hint' => 'Care este telefonul clientului?',
           ]);

           $this->crud->addField([
               'name' => 'type',
               'label' => "Tip Client",
               'type' => 'enum',
               'hint' => 'Care este tipul clientului?',
            ]);

            $this->crud->addField([
                'name' => 'identity',
                'label' => "CUI/CNP",
                'type' => 'text',
                'hint' => 'Care este CUI-ul sau CNP-ul clientului?',
             ]);

        // add asterisk for fields that are required in CustomerRequest
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
