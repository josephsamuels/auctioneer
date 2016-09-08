<?php
namespace App\Http\Controllers;

use App\Models\Item;
use mnshankar\CSV\CSV;

/**
 * Class ItemsController - A class to act as a controller for items.
 */
class ItemsController extends Controller
{

    /**
     * Returns the index page for items.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('items.index');
    }

    /**
     * Returns the print page for items.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function printItems()
    {
        return view('items.print');
    }

    /**
     * Generates a CSV file.
     *
     * @return mixed
     */
    public function generateCsv()
    {
        $csv = new CSV();

        $hidden = [
            'user_id',
            'full_description',
            'approximate_value',
            'source',
            'keywords',
            'created_at',
            'updated_at',
        ];

        return $csv->fromArray(Item::all()->makeHidden($hidden)->toArray())->render('items.csv');
    }
}
