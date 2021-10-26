import React from 'react';
import Book from "./Book";
import {useState, useEffect} from "react";
import DataTable from 'react-data-table-component';
import axios from 'axios'
import {Pagination} from "@shopify/polaris";

const Books = () => {
    const [books, setBooks] = useState([]);
    const [booksPerPage, setBooksPerPage] = useState(10);
    const [currentPage, setCurrentPage] = useState(1);
    // console.log(process.env.MIX_REACT_APP_URL);
    // console.log(process.env.REACT_APP_URL);
    useEffect(() => {
        const fetchBooks =  async () => {
            const res = await axios.get('books');
            setBooks(res.data);
        }

        fetchBooks();
    },[]);

    const indexOfLastBook = currentPage * booksPerPage;
    const indexOfFirstBook = indexOfLastBook - booksPerPage;
    const currentBooks = books.slice(indexOfFirstBook,indexOfLastBook);

    const paginate = (pageNumber) => setCurrentPage(pageNumber);
    const populateBooks = () => {

    }
    /* const [columns,setColumns] = useState([
        {
            name: 'Title',
            selector: row => row.title,
        },
        {
            name: 'Author',
            selector: row => row.author,
        },
        {
            name: 'Price',
            selector: row => row.price,
        },

    ]);
    const [books, setBooks] = useState([
        {
            id: 1,
            title: "Pirates of Cabrian",
            price: 30,
            compare_at_price: 20,
            author: "William"
        },
        {
            id: 2,
            title: "Laravel Cookbook",
            price: 30,
            compare_at_price: 20,
            author: "Talyor Otwel"
        },
        {
            id: 3,
            title: "Package Development",
            price: 30,
            compare_at_price: 20,
            author: "Spatche"
        },

    ]); */

    return (
        <>
            <Book books={currentBooks} />
            <div className="container text-center ml-20">
                <Pagination
                    hasPrevious
                    onPrevious={() => {
                        setCurrentPage(currentPage - 1 );
                        //todo pass the request to the server and render the book detail component.
                    }}
                    hasNext
                    onNext={() => {
                        setCurrentPage( currentPage + 1 );
                        populateBooks();

                    }}
                />
            </div>

        </>
    );
}

export default Books
