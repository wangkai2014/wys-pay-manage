<?php

namespace App\Api\Controllers\School\Agent;
use Illuminate\Support\Facades\DB;

/*
*/
class GradeController extends \App\Api\Controllers\BaseController
{


 

    /*
        列表
    */
    public function lst(){

        try{
            $request=app('request');
            $loginer = $this->parseToken($request->get('token'));
            $this->status=2;


            $obj =  new \App\Models\StuGrade;

            if(!empty($request->get('store_id')))
            {
                $all_store_id=[$request->get('store_id')];
            }else{
                $loginer_id=$loginer->user_id;
                $all_user_id = $this->getSubIds($loginer_id);//返回包括自己的代理商id数组

                $get_all_store = \App\Models\StuStore::whereIn('user_id',$all_user_id)->get();
                $all_store_id=[];
                foreach($get_all_store as $v)
                {
                    $all_store_id[]=$v->store_id;
                }
            }

            $obj = $obj->whereIn('store_id',$all_store_id);

            $this->t=$obj->count();
            $data = $this->page($obj)->get();

            $this->status=1;
            return $this->format($data);



        }catch(\Exception $e){
            $this->status= -1 ;
            $this->message='系统错误'.$e->getMessage().$e->getFile().$e->getLine();
            return $this->format();
        }
    }







}
