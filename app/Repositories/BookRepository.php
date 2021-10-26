<?php


namespace App\Repositories;


use App\Models\Book;
use App\Services\ShopifyService;

class BookRepository
{
    /** @var ShopifyService  */
    public $shopifyService;

    public function __construct(ShopifyService $_service)
    {
        $this->shopifyService = $_service;
    }

    /**
     * @return Book[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getBooks()
    {
        return Book::all();
    }

    /**
     * @return array|mixed
     */
    public function getAllBooksFromShopify()
    {
        $books = $this->shopifyService->getAllProducts();
        $this->saveShopifyBooks($books);
        return $this->getBooks();
    }

    public function saveShopifyBooks(array $_data)
    {
        foreach ($_data as $shopifyBook) {
            $this->saveshopifyBook($shopifyBook);
        }
    }

    /**
     * @param array $_data
     * @return Book
     */
    public function saveShopifyBook(array $_data) : Book
    {
        //saving the product on the base of key id.
        /** @var \App\Models\Book $book */
        $book = \App\Models\Book::firstOrNew(['shopify_id' => data_get($_data,'id')]);
        $book->title = data_get($_data,'title');
        $book->description = data_get($_data,'title');
        $book->image = data_get($_data,'image.src');
        $book->price = data_get($_data,'variants.0.price');
        $book->compare_at_price = data_get($_data,'variants.0.compare_at_price');
        $book->author = data_get($_data,'vendor');
        $book->wholesale_price = data_get($_data,'whole_sale_price');
        $book->save();

        return $book;
    }

    /**
     * @param $_id
     * @return Book|array
     */
    public function getBookFromShopify($_id)
    {
        /** @var Book $book */
        $book = Book::find($_id);
        if($book){
            $shopifyBook = $this->shopifyService->getProduct($book->shopify_id);
            $this->saveShopifyBook($shopifyBook);
            $book->refresh();
            return $book;
        }
        return [];

    }
}
