<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('parent_id', null)->get();

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the input
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        // Create a new ticket
        Ticket::create([
            'user_id' => auth()->user()->id, // Assuming you're using authentication
            'title' => $validatedData['title'],
            'body' => $validatedData['body'],
            'parent_id' => null
        ]);

        // Redirect to the ticket list with a success message
        return redirect()->route('tickets.index')->with('success', 'Ticket created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ticket = Ticket::findOrFail($id);
        // Load the associated replies
        $relatedTickets = Ticket::where('parent_id', $id)->get();
        return view('tickets.show', compact('ticket', 'relatedTickets'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeReply(Request $request, $parentTicketId)
    {
        $validatedData = $request->validate([
            'reply_body' => 'required|string',
        ]);

        // Create a new ticket as a reply
        Ticket::create([
            'user_id' => auth()->user()->id, // Assuming you're using authentication
            'title' => '', // You can customize this if needed
            'body' => $validatedData['reply_body'],
            'parent_id' => $parentTicketId,
        ]);

        // Redirect back to the ticket with a success message
        return redirect()->route('tickets.show', $parentTicketId)->with('success', 'Reply submitted successfully');
    }

}
