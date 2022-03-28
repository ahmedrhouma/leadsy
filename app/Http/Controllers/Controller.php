<?php

namespace App\Http\Controllers;

use App\Models\Notes;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    const ELEMENTS = [
        'campaign' => 1,
        'lead' => 2
    ];

    /**
     * @param string $element
     * @param int $element_id
     * @param string $content
     * @return mixed
     */
    public function addNote( $element, $element_id, $content){
       return Notes::create(['element'=>self::ELEMENTS[$element],'element_id'=>$element_id,'content'=>$content,'user_id'=>auth()->user()->id]);
    }

    /**
     * @param $element
     * @param $element_id
     * @return mixed
     */
    public function getNotes( $element, $element_id){
        return Notes::select('*')->where([['element','=',self::ELEMENTS[$element]],['element_id','=',$element_id]])->get()->map(function ($note){
            return ['content'=> $note->content,'created_at'=>$note->created_at->format('h:i d-M-Y')];
        });
    }
    public function successfulResponse($options = [])
    {
        $default = [
            'success' => true,
            'alert' => [
                'title' => trans('messages.operation_successful'),
                'icon' => 'success',
                'showConfirmButton' => false,
                'timer' => 1500
            ]
        ];
        return response()->json(array_merge_recursive_distinct($default, $options));
    }

    public function dataResponse($options = [])
    {
        $default = [
            'success' => true,
            'data' => []
        ];
        return response()->json(array_merge_recursive_distinct($default, $options));
    }

    public function failedResponse($options = [])
    {
        $default = [
            'success' => false,
            'alert' => [
                'title' => trans('messages.operation_failed'),
                'html' => trans('messages.reload_page_try_again'),
                'icon' => 'error',
                'showConfirmButton' => true,
            ],
        ];
        return response()->json(array_merge_recursive_distinct($default, $options));
    }

    public function setLog($options = [])
    {
        $default = [
            'success' => false,
            'alert' => [
                'title' => trans('messages.operation_failed'),
                'html' => trans('messages.reload_page_try_again'),
                'icon' => 'error',
                'showConfirmButton' => true,
            ],
        ];
        return response()->json(array_merge_recursive_distinct($default, $options));
    }
}
