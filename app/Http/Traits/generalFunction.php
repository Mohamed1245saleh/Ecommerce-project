<?php


namespace App\Http\Traits;
use App\Http\Traits\generalGuzzleRequestTrait;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

Trait generalFunction
{


    public function retrieveGroups(){
        $request = $this->getRequest("retrieveGroups");
        $groups = json_decode($request->getBody()->getContents());
        $groups = $groups->data;
        return $groups;
    }


    public function paginate($arrayGiven , $pageNumber , $displayedRows){
        $collectedResult = collect($arrayGiven)->unique();
        $total = count($collectedResult);
        $resultsArray = $collectedResult->forPage($pageNumber, 4);
        $paginate = new LengthAwarePaginator($collectedResult->forPage($pageNumber, $displayedRows), $total, $displayedRows, Paginator::resolveCurrentPage(), [
            'path'  =>  Paginator::resolveCurrentPath(),
        ]);
        return array($resultsArray , $paginate);
    }
}
