import React from 'react';
import {AppProvider, Frame, Navigation, Page} from "@shopify/polaris";
import Books from "./Books";
import Routes from "./Routes";


const AppFrame = () => {
    const navigationMarkup = <>
            <Navigation location={location.pathname}>
                <Navigation.Section
                    items={[
                        {
                            url: '/test',
                            label: 'Books',
                            exactMatch: true
                        },
                        {
                            url: '/book-details',
                            label: 'BookDetails',
                            exactMatch: true
                        }
                    ]}
                />
            </Navigation>
           </>
    return <Frame navigation={navigationMarkup}>
        <Routes />
    </Frame>;
};

export default AppFrame;
