import React from 'react';
import {Route, Switch} from "react-router";
import Books from "./Books";
import BookDetails from "./BookDetails";
import Index from "./Index";

function Routes(props) {
    return <Switch>
        <Route exact path="/">
            <Books />
        </Route>
        <Route exact path="/test">
            <Books />
        </Route>
        <Route exact path="/book-details">
            <BookDetails />
        </Route>
    </Switch>
}

export default Routes;
