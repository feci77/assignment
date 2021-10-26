import React from 'react';
import ReactDOM from 'react-dom';
import '@shopify/polaris/build/esm/styles.css';
import enTranslations from '@shopify/polaris/locales/en.json';
import {AppProvider, Page, Card, Button} from '@shopify/polaris';
import AppFrame from "./AppFrame";
import {BrowserRouter} from "react-router-dom";
import Routes from "./Routes";

function Index() {
    return (
        <BrowserRouter>
            <AppProvider i18n={enTranslations}>
                <Routes/>
            </AppProvider>
        </BrowserRouter>
    );
}

export default Index;

if (document.getElementById('index')) {
    ReactDOM.render(<Index />, document.getElementById('index'));
}
