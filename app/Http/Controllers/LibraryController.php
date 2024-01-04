<?php

namespace App\Http\Controllers;

use App\Models\Perpustakaan;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $Perpustakaans = Perpustakaan::all();

        return view('perpustakaan', ['Perpustakaans' => $Perpustakaans]);
    //     $books = [
    //         [
    //             'image' => 'images/book1.jpg',
    //             'title' => 'How Innovation works',
    //             'author' => 'MATT RIDLEY',
    //         ],
    //         [
    //             'image' => 'images/book3.jpg',
    //             'title' => 'The Psychology of money',
    //             'author' => 'MORGAN HOUSEL',
    //         ],
    //         [
    //             'image' => 'images/book4.jpg',
    //             'title' => 'Angela Carters Book of Fairy Tales',
    //             'author' => 'unknown',
    //         ],
    //         [
    //             'image' => 'images/book5.jpg',
    //             'title' => 'Your Heart is the Sea',
    //             'author' => 'Nikita Gill',
    //         ],
    //         [
    //             'image' => 'images/book6.jpg',
    //             'title' => 'All the letters I Should Have Sent',
    //             'author' => 'Rania Vairy',
    //         ],
    //         [
    //             'image' => 'images/book7.jpg',
    //             'title' => 'Picottasty',
    //             'author' => 'Mae Mu',
    //         ],
    //         [
    //             'image' => 'images/book8.jpg',
    //             'title' => 'The Picture of Dorian Gray',
    //             'author' => 'Oscar Wilde',
    //         ],
    //         // copas untuk tambah book
    //     ];

    //     return view('perpustakaan', compact('books'));
    }
}