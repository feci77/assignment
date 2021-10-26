import React from 'react';
import {useEffect} from "react"
import {Button, Card, MediaCard} from "@shopify/polaris"

export default class BookDetails extends React.Component{

    constructor(props){
        super(props);
        this.bookId = localStorage.getItem('book_id');
    }

    componentDidMount(){
        const fetchBook =  async () => {
            const res = await axios.get('api/books/'+this.bookId);
            if(res.data.status == 'passed'){
                this.setState({
                    bookDetails: res.data.data
                });
                this.d =  res.data.data;
            }else{
                alert('something went wrong');
            }
        }
        fetchBook();
    }

    render(){
        if( !this.state || !this.state.bookDetails){
            return <div></div>
        }else{
            this.details = this.state.bookDetails;
        }
        return (
            <>
                <MediaCard
                    title={this.details.title}
                    primaryAction={{
                        content: 'Add To Cart',
                        onAction: () => { alert ('Thank you for this purchase!')},
                    }}
                    description={this.details.description}
                    price={this.details.price}
                    popoverActions={[{content: 'Dismiss', onAction: () => {}}]}
                >
                    <div className="container">
                        <p><b> Price: </b> {this.details.price} USD</p>
                        <p> <b> Author </b>: {this.details.author}</p>
                        { this.details.compare_at_price > 0 && <p> <b>Compare at Price: </b> {this.details.compare_at_price} </p>}
                        { this.details.wholesale_price > 0 && <p> <b>Wholesale Price: </b> {this.details.wholesale_price} </p>}
                    </div>
                    <img
                        alt=""
                        width="100%"
                        height="100%"
                        style={{
                            objectFit: 'cover',
                            objectPosition: 'center',
                        }}
                        src={this.details.image}
                    />
                </MediaCard>
            </>
        )
    }
};
