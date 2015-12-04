<?php namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Information extends Eloquent {

   protected $table = 'information';

    protected $fillable = array('student_id', 'field_id', 'value');

    public function field() {
        return $this->belongsTo('Field');
    }

    public static function updateDueDate(Request $requests)
    {
        $information = Information::all();

        foreach ($information as $info) {
            if ($info->field->student_label == "payment_date1") {
                $info->value = $requests->get('down_payment');
                $info->save();
            }

            if ($info->field->student_label == "payment_date2") {
                $info->value = $requests->get('sec_payment');
                $info->save();
            }

            if ($info->field->student_label == "payment_date3") {
                $info->value = $requests->get('thrd_payment');
                $info->save();
            }

            if ($info->field->student_label == "payment_date4") {
                $info->value = $requests->get('fth_payment');
                $info->save();
            }

            if ($info->field->student_label == "payment_date5") {
                $info->value = $requests->get('ffth_payment');
                $info->save();
            }
        }

        return Redirect::back()->with('msg', 'Due date was successfuly updated');
    }

}
