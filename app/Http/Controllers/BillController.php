<?php

namespace App\Http\Controllers;

use App\Account;
use App\Bill;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $accountId)
    {
        $account = Account::findOrFail($accountId);

        $filter = 'month';
        if ($request->has('filter')) {
            $filter = $request->filter;
        }

        $order = 'due_date';
        if ($request->has('order')) {
            $order = $request->order;
        }

        $filterOptions = ['all', 'yearly', 'month'];
        $orderOptions = ['name', 'amount', 'due_date', 'paid'];
        if (!in_array($order, $orderOptions) || !in_array($filter, $filterOptions)) {
            abort(404);
        }

        $now = Carbon::now();

        switch ($filter) {
            case 'all':
                $bills = Bill::where('account_id', $accountId)->get();
                break;
            case 'month':
                $bills = Bill::where('account_id', $accountId)
                    ->where('due_month', $now->month)
                    ->orWhere('due_month', 0)
                    ->get();
                break;
            case 'yearly':
                $bills = Bill::where('account_id', $accountId)
                    ->where('due_month', '!=', 0)->get();
                break;
        }

        $orderedBills = $bills->sortBy($order);

        $sumOfAllBills = 0;
        $sumOfUnpaidBills = 0;

        foreach ($orderedBills as $bill) {
            $this->setWarningStatus($bill);
            $sumOfAllBills += $bill->amount;

            if ($bill->isDue()) {
                $sumOfUnpaidBills += $bill->amount;
            }
        }

        return view('bills/bills', [
            'bills' => $orderedBills,
            'formattedDate' => $now->toFormattedDateString(),
            'sumOfAllBills' => number_format($sumOfAllBills, 2),
            'sumOfUnpaidBills' => number_format($sumOfUnpaidBills, 2),
            'order' => $order,
            'filter' => $filter,
            'account' => $account,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($accountId)
    {
        return view('bills/create')->with(['accountId' => $accountId]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $accountId)
    {
        Bill::create([
            'name' => $request->name,
            'description' => $request->description,
            'amount' => $request->amount,
            'due_date' => $request->due_date,
            'due_month' => $request->due_month,
            'autopay' => $request->autopay ? $request->autopay : 0,
            'account_id' => $accountId,
        ]);

        return redirect("/accounts/{$accountId}/bills");
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
    public function edit($accountId, Bill $bill)
    {
        return view('bills/edit', [
            'bill' => $bill,
            'accounts' => Account::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $accountId, Bill $bill)
    {
        $bill->name = $request->name;
        $bill->description = $request->description;
        $bill->amount = $request->amount;
        $bill->due_date = $request->due_date;
        $bill->due_month = $request->due_month;
        $bill->autopay = $request->autopay ? $request->autopay : 0;
        $bill->account_id = $request->account;
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
    public function destroy($accountId, Bill $bill)
    {
        $bill->delete();

        return redirect("/accounts/{$accountId}/bills");
    }

    public function togglePaidStatus($accountId, Bill $bill)
    {
        if ($bill->paid === 0) {
            $bill->paid = 1;
        } else {
            $bill->paid = 0;
        }

        $bill->save();

        return back();
    }

    public function resetAll()
    {
        DB::table('bills')->update(['paid' => 0]);

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
