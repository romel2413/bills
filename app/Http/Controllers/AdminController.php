<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Record;
use Illuminate\Support\Facades\Validator;


class AdminController extends Controller
{
    public function view_category()
    {
        $data = Category::all();
        return view('category.category', compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category;

        $validator = Validator::make($request->all(), [
            'name_category' => 'required',
            'price' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $data->category_name = $request->name_category;
        $data->price = $request->price;

        $data->save();

        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function view_record()
    {
        $viewMainRecord = Record::all();
        return view('Record.viewRecord', compact('viewMainRecord'));
    }
    public function add_record()
    {
        $data = Category::all();
        
        return view('Record.addRecord', compact('data'));
    }
    public function record_add(Request $request)
    {
        $record = new Record;

        $record->fname = $request->fname;
        $record->lname = $request->lname;
        $record->record_date = $request->date;
        $record->status = $request->status;

        $categories = [];
        $prices = [];

        // Loop through each selected checkbox
        foreach ($request->category as $selectedCategory) {
            // Split the value of the checkbox to separate category name and price
            list($category, $price) = explode(':', $selectedCategory);

            // Store category name and price in their respective arrays
            $categories[] = $category;
            $prices[] = $price;
        }

        $record->category = implode(', ', $categories);
        $record->price = implode(', ', $prices);
        $totalBalance = array_sum($prices);
        $record->total_price = $totalBalance;


        if ($request->id_discount === "senior") {
            $record->discount = 20;
            $totalDiscount = $record->discount;
            // Calculate the discount (20% of the total balance)
            $discount1 = $totalBalance * $totalDiscount/100;
            // Deduct discount from the total balance
            $totalBalance -= $discount1;
        } 
        elseif($request->id_discount === "PWD"){
            $record->discount = 20;
            $totalDiscount = $record->discount;
            // Calculate the discount (20% of the total balance)
            $discount1 = $totalBalance * $totalDiscount/100;
            // Deduct discount from the total balance
            $totalBalance -= $discount1;
        } else
        {
            $record->discount = 0;
            $totalDiscount = $record->discount;
            $discount1 = $totalBalance * $totalDiscount/100;
            // Deduct discount from the total balance
            $totalBalance -= $discount1;
        } 
        $record->balance = $totalBalance;
        $record->id_discount = $request->id_discount;   
        $record->save();

        return redirect()->to('view_record');
    }



    
}
