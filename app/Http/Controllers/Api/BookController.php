<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Repositories\BookRepository;
use http\Env\Response;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /** @var $bookRepo BookRepository */
    protected  $bookRepo;

    public function __construct(BookRepository  $bookRepository)
    {
        $this->bookRepo = $bookRepository;
    }
    public function index(Request $request)
    {
        return response()->json($this->bookRepo->getBooks())->setStatusCode(200);
    }

    public function getAllBooks(Request $request): \Illuminate\Http\JsonResponse
    {
        $data = $this->bookRepo->getAllBooksFromShopify();
        return api_response($data);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function details($id)
    {
        return api_response($this->bookRepo->getBookFromShopify($id));
    }
}
