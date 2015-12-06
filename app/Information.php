<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Support\Facades\Redirect;

class Information extends Eloquent {

   protected $table = 'information';

    protected $fillable = array('student_id', 'field_id', 'value');

    public function field() {
        return $this->belongsTo('Field');
    }

    public static function updateDueDate($requests)
    {
        $fields = Field::all();

        foreach ($fields as $field) {
            if ($field->student_label == "payment_date1") {
                $info = new Information();
                $info->field_id = $field->id;
                $info->value = $requests->get('due_1');
                $info->save();
            }

            $info = new Information();
            $info->field_id = $field->id;
            $info->save();

            if ($field->student_label == "payment_date2") {
                $info = new Information();
                $info->field_id = $field->id;
                $info->value = $requests->get('due_2');
                $info->save();
            }

            $info = new Information();
            $info->field_id = $field->id;
            $info->save();

            if ($field->student_label == "payment_date3") {
                $info = new Information();
                $info->field_id = $field->id;
                $info->value = $requests->get('due_3');
                $info->save();
            }

            $info = new Information();
            $info->field_id = $field->id;
            $info->save();

            if ($field->student_label == "payment_date4") {
                $info = new Information();
                $info->field_id = $field->id;
                $info->value = $requests->get('due_4');
                $info->save();
            }

            $info = new Information();
            $info->field_id = $field->id;
            $info->save();

            if ($field->student_label == "payment_date5") {
                $info = new Information();
                $info->field_id = $field->id;
                $info->value = $requests->get('due_5');
                $info->save();
            }

            $info = new Information();
            $info->field_id = $field->id;
            $info->save();
        }

        return Redirect::back()->with('msg', 'Due date was successfuly updated');
    }

    public static function importInformation($request)
    {
        $new_information = new Information();
        $new_information->device_id = $request->get('device_id');
        $new_information->field_id = $request->get('field_id');
        $new_information->value = $request->get('value');
        $new_information->save();
    }

}
