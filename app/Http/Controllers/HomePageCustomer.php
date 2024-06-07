<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HomePageCustomer extends Controller
{
    public function index()
    {
        $this->updateLoanStatus();
        $books = Book::all();
        $loans = Loan::where('user_id', auth()->user()->id)->get();
        return view('HomePageCustomer.HomePageC', compact('books', 'loans'));
    }



    public function CancelLoan($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'cancel';
        $loan->save();

        return redirect()->route('peminjam.home');
    }

    public function BorrowAgain($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->status = 'pending';
        $loan->borrow_date = now();
        $loan->return_date = null;
        $loan->save();

        return redirect()->back()->with('success', 'Loan approved successfully.');
    }


    public function updateLoanStatus()
    {
        $loans = Loan::where('return_date', '<', Carbon::now())
                     ->where('status', 'pending')
                     ->get();

        foreach ($loans as $loan) {
            $loan->status = 'selesai';
            $loan->save();
        }
    }

    public function showProfile()
    {
        $user = auth()->user();
        return view('HomePageCustomer.HomePageC', compact('user'));
    }


    public function editProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'username' => 'required|string|max:255',
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_picture')) {
            $imageName = time().'.'.$request->profile_picture->extension();
            $request->profile_picture->move(public_path('images'), $imageName);
            $user->gambar = $imageName;
        }

        $user->name = $request->username;
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
