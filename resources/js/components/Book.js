import React, {useEffect} from 'react';
import {Button, Card} from "@shopify/polaris";
import {Link, useHistory } from "react-router-dom";
import axios from "axios";
const Book = ({books}) => {

    const history = useHistory();

    const handleClick = (data) => {

        //having problem because of router, so using local storage for now.
        localStorage.setItem('book_id',data.id);

        history.push({
            pathname: '/book-details',
            state: data
        });
    }

    return (
        <>
            {
                books.map(book => (
                    <Card title={book.title} key={book.id} onClick={() => {console.log('working')}}  sectioned>
                        <p><b> Price: </b> {book.price} USD</p>
                        <p> <b> Author </b>: {book.author}</p>
                        { book.compare_at_price > 0 && <p> <b>Compare at Price: </b> {book.compare_at_price} </p>}
                         { book.wholesale_price > 0 && <p> <b>Wholesale Price: </b> {book.wholesale_price} </p>}
                        <Button onClick={() => handleClick(book) }  > See Details </Button>
                    </Card>
                ))
            }
        </>
    );
}

export default Book
