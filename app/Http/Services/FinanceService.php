<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\FinanceServiceInterface;
use App\Models\Finance;

class FinanceService implements FinanceServiceInterface
{
    /**
     * Инициализация объекта
     * 
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Выводит данные с разбивкой на страницы
     * 
     * @param  int|null  $user_id
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function index($user_id = null)
    {
        return Finance::whereUserId($user_id)->orderBy('id', 'DESC')->paginate();
    }

    /**
     * Данные одной строки
     * 
     * @param  int  $id
     * @return \App\Models\Finance|null
     */
    public function get($id)
    {
        return Finance::find($id);
    }

    /**
     * Создание строки
     * 
     * @param  array  $data
     * @return \App\Models\Finance
     */
    public function create($data)
    {
        return Finance::create($data);
    }

    /**
     * Обновление строки
     * 
     * @param  \App\Models\Finance  $row
     * @param  array  $data
     * @return \App\Models\Finance
     */
    public function save(Finance $row, array $data)
    {
        $row->update($data);

        return $row;
    }

    /**
     * Удаление строки
     * 
     * @param  int  $id
     * @return \App\Models\Finance
     * 
     * @throws \Illuminate\Database\Eloquent\ModelNotFoundException
     */
    public function remove($id)
    {
        $row = Finance::findOrFail($id);
        $row->delete();

        return $row;
    }
}
