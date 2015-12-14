<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Field extends Eloquent {

	protected $fillable = array('student_label');

    public function assessmentuser() {
        return $this->belongsTo('AssessmentUser');
    }

    public function information()
    {
        return $this->hasMany('App\Information');
    }

    public static function add_field() {
        if (isset($_POST["mytext"]) != '') {
            foreach($_POST["mytext"] as $labelField) {
                if ($labelField != '') {
                    $field = Field::firstOrNew(array(
                        'student_label' =>  $labelField,
                    ));
                    $field->save();
                }
            }
        }

        return Redirect::back()->with('msg', 'Field was successfuly updated');
    }

}
