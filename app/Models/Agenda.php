<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'row',
        'hall',
        'start_time',
        'end_time',
        'event_date',
        'session',
        'chair_speaker',
        'topic',
        'ceremony',
        'color',
        'image',
        'session_color',
        'hall_color',
        'track_color',
        'ceremony_color',
        'chair_speaker_color',
    ];

    public function duplicateRow(Request $request)
    {
        // Get the row ID from the request
        $rowId = $request->input('row_id');

        // Find the row with the given ID
        $agenda = Agenda::find($rowId);

        if (!$agenda) {
            return response()->json(['success' => false, 'message' => 'Row not found.']);
        }

        // Duplicate the row
        $duplicatedRow = $agenda->duplicateRow();

        if ($duplicatedRow) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false, 'message' => 'Failed to duplicate the row.']);
        }
    }
}
