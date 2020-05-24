<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Form;

class FormServiceProvider extends ServiceProvider
{
    //Bootstrap Function.
    public function boot(){
        //Now we will Register The Form Components For Bootstrap-Something Like Adding Variables To Remember Forms.
        Form::component('bsText', 'components.form.text', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsTextArea', 'components.form.textarea', ['name', 'value' => null, 'attributes' => []]);
        Form::component('bsSubmit', 'components.form.submit', ['value' => 'Submit', 'attributes' => []]);
        Form::component('hidden', 'components.form.hidden', ['name', 'value' => null, 'attributes' => []]);
    }

    //Registering Applications Services
    public function register()
    {
        //
    }
}
