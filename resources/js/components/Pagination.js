import React from 'react';

const Pagination = ({ postsPerPage, totalPosts, paginate }) => {
    const pageNumbers = [];

    for (let i = 1; i <= Math.ceil(totalPosts / postsPerPage); i++) {
        pageNumbers.push(i);
    }

    return (
        <Pagination
            label="Results"
            hasPrevious
            onPrevious={() => {
                console.log('Previous');
            }}
            hasNext
            onNext={() => {
                console.log('Next');
            }}
        />
    );
};
export default Pagination;
