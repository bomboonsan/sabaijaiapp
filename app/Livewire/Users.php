<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Accounts;
use Carbon\Carbon;

class Users extends Component
{
    public $userID = null;
    public $openModal = false;
    public $newApplyStatus = 0;

    // public $new_apply_id = null;
    // public $new_created_at = null;
    // public $new_education_lavel_year = null;
    // public $new_education_year = null;
    // public $new_education_sublevel = null;
    // public $new_amount = null;
    // public $new_promotional_interest = null;
    // public $new_normal_interest = null;
    // public $new_number_installments = null;
    // public $new_pay_date = null;

    public function render()
    {
        $id = $this->userID ?? null;
        $isOpenModal = $this->openModal;
        if ($id == null) {
            $modalUser = Accounts::orderBy('created_at', 'DESC')->first();
        } else {
            $modalUser = Accounts::find($id);
        }

        if($modalUser->apply_status == '0'){
            $apply_status_name = 'ใบคำขอใหม่';
        }
        if($modalUser->apply_status == '1'){
            $apply_status_name = 'รอเอกสาร';
        }
        if($modalUser->apply_status == '2'){
            $apply_status_name = 'อยู่ระหว่างพิจารณา';
        }
        if($modalUser->apply_status == '3'){
            $apply_status_name = 'ยกเลิก';
        }

        $list_apply_status = array(
            '0' => 'ใบคำขอใหม่',
            '1' => 'รอเอกสาร',
            '2' => 'อยู่ระหว่างพิจารณา',
            '3' => 'ยกเลิก',
        );

        // $pay_date = $modalUser->occupation_detail;
        // $pay_date = Decode Jons occupation_detail->pay_date
        $occupation_detail = json_decode( $modalUser->occupation_detail , true );
        $pay_date = $occupation_detail['pay_date'];


        $users = Accounts::orderBy('created_at', 'DESC')->paginate(20);

        foreach ($users as $user) {
            // Set apply_status_name
            $user->apply_status_name = $list_apply_status[$user->apply_status];
        }
        return view('livewire.users' , compact('users', 'modalUser' , 'isOpenModal' , 'apply_status_name' , 'list_apply_status' , 'pay_date'));
    }

    public function modal($id)
    {
        $this->userID = $id;
        $this->openModal = true;
        // เมื่อมีการคลิก modal
        $this->render();
    }

    public function closeModal()
    {
        $this->openModal = false;
        $this->render();
    }

    public function updateApplyStatus($id)
    {
        $user = Accounts::find($id);
        $user->apply_status = $this->newApplyStatus;
        $user->save();

        $this->render();
    }
    public function updateApplyData($id)
    {
        // $user = Accounts::find($id);
        // dd($this->$new_apply_id);

        // if($this->$new_apply_id != null){
        //     $user->apply_id = $this->$new_apply_id;
        // }
        // if($this->$new_created_at != null){
        //     $user->created_at = $this->$new_created_at;
        // }
        // if($this->$new_education_lavel_year != null){
        //     $user->education_lavel_year = $this->$new_education_lavel_year;
        // }
        // if($this->$new_education_year != null){
        //     $user->education_year = $this->$new_education_year;
        // }
        // if($this->$new_education_sublevel != null){
        //     $user->education_sublevel = $this->$new_education_sublevel;
        // }
        // if($this->$new_amount != null){
        //     $user->amount = $this->$new_amount;
        // }
        // if($this->$new_promotional_interest != null){
        //     $user->promotional_interest = $this->$new_promotional_interest;
        // }
        // if($this->$new_normal_interest != null){
        //     $user->normal_interest = $this->$new_normal_interest;
        // }
        // if($this->$new_number_installments != null){
        //     $user->number_installments = $this->$new_number_installments;
        // }
        // if($this->$new_pay_date != null){
        //     $user->pay_date = $this->$new_pay_date;
        // }


        // $user->save();
        $this->render();
    }
    public function updateState()
    {
        $this->render();
    }
}
