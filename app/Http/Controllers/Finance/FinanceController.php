<?php

namespace App\Http\Controllers\Finance;

use App\Exceptions\ApiException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Finance\FinanceRequest;
use App\Http\Resources\Finance\FinanceCollection;
use App\Http\Resources\Finance\FinanceResource;
use App\Http\Services\Interfaces\FinanceServiceInterface;
use App\Models\Finance;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    /**
     * Вывод данных
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Services\Interfaces\FinanceServiceInterface  $service
     * @return \App\Http\Resources\Finance\FinanceCollection
     */
    public function index(Request $request, FinanceServiceInterface $service)
    {
        return new FinanceCollection(
            $service->index($request->user()->id)
        );
    }

    /**
     * Вывод данных одной строки
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Services\Interfaces\FinanceServiceInterface  $service
     * @return \App\Http\Resources\Finance\FinanceResource
     * 
     * @throws \App\Exceptions\ApiException
     */
    public function get(Request $request, FinanceServiceInterface $service)
    {
        $finance = $service->get($request->id);

        if ($finance->user_id != $request->user()->id and !$request->user()->hasAccess('finance.showall'))
            throw new ApiException(__('Forbidden'), 403);

        return new FinanceResource($finance);
    }

    /**
     * Создание строки
     * 
     * @param  \App\Http\Requests\Finance\FinanceRequest  $request
     * @param  \App\Http\Services\Interfaces\FinanceServiceInterface  $service
     * @return \App\Http\Resources\Finance\FinanceResource
     */
    public function create(FinanceRequest $request, FinanceServiceInterface $service)
    {
        $finance = $service->create([
            'user_id' => $request->user()->id,
            'date' => $request->date,
            'month' => $request->month,
            'year' => $request->year,
            'money' => $request->money,
            'tax' => $request->tax,
        ]);

        return new FinanceResource($finance);
    }

    /**
     * Сщхранение строки
     * 
     * @param  \App\Http\Requests\Finance\FinanceRequest  $request
     * @param  \App\Http\Services\Interfaces\FinanceServiceInterface  $service
     * @return \App\Http\Resources\Finance\FinanceResource
     * 
     * @throws \App\Exceptions\ApiException
     */
    public function save(FinanceRequest $request, FinanceServiceInterface $service)
    {
        if (!$row = $service->get($request->id))
            throw new ApiException(__('Not Found'), 400);

        if ($row->user_id != $request->user()->id and !$request->user()->hasAccess('finance.showall'))
            throw new ApiException(__('Forbidden'), 403);

        $finance = $service->save($row, [
            'date' => $request->date,
            'month' => $request->month,
            'year' => $request->year,
            'money' => $request->money,
            'tax' => $request->tax,
        ]);

        return new FinanceResource($finance);
    }
}
