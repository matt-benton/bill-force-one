<?php

namespace App\Http\Controllers;

use App\Bill;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::all();
        $now = Carbon::now();

        $sumOfAllBills = 0;
        $sumOfUnpaidBills = 0;

        foreach ($bills as $bill) {
            $this->setWarningStatus($bill);
            $sumOfAllBills += $bill->amount;

            if ($bill->isDue()) {
                $sumOfUnpaidBills += $bill->amount;
            }
        }

        return view('bills', [
            'bills' => $bills,
            'formattedDate' => $now->toFormattedDateString(),
            'sumOfAllBills' => number_format($sumOfAllBills, 2),
            'sumOfUnpaidBills' => number_format($sumOfUnpaidBills, 2),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Bill::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
            'autopay' => $request->autopay ? $request->autopay : 0,
        ]);

        return redirect('/bills');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        return view('edit', [
            'bill' => $bill,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $bill->name = $request->name;
        $bill->description = $request->description;
        $bill->amount = $request->amount;
        $bill->due_date = $request->due_date;
        $bill->autopay = $request->autopay ? $request->autopay : 0;
        $bill->save();

        return back()->with([
            'bill' => $bill,
            'message' => 'This bill has been updated successfully.',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bill $bill)
    {
        $bill->delete();

        return redirect('/bills');
    }

    public function togglePaidStatus(Bill $bill)
    {
        if ($bill->paid === 0) {
            $bill->paid = 1;
        } else {
            $bill->paid = 0;
        }

        $bill->save();

        return back();
    }

    private function setWarningStatus(Bill $bill)
    {
        $bill->warning = false;

        if ($bill->isPastDue() || $bill->isDueToday()) {
            $bill->warning = true;
        }
    }
}
