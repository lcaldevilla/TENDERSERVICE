<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;;

class Tender extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_tender',
        'title',
        'summary', 
        'link',
		'link', 
        'updated',
        'contractFolderID',
        'partyName',
        'procurementProjectName',
        'realizedLocationCountrySubentity',
        'tenderSubmissionDeadlinePeriod',
        'totalAmount',
        'taxExclusiveAmount'
		
    ];

    protected $dates = ['created_at', 'updated_at'];
}