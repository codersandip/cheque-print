$(document).ready(function () {
    // $('.front-print-btn').on('click', function (e) {
    //     e.preventDefault();
    //     // window.print();
    //     // $('.print-container').printThis({
    //     //     importCSS: true,
    //     //     beforePrint: function () {
    //     //         style.id = 'dynamicPrintStyle';
    //     //         style.textContent = `
    //     //         @media print {
    //     //             @page {
    //     //                 size: /* A4 */ `+ $('.cheque-container').data('width') + ' ' + $('.cheque-container').data('height') + ` ;
    //     //                 margin: 0;
    //     //                 padding: 0;
    //     //                 /* page-orientation: landscape; */
    //     //             }
    //     //         }
    //     //     `;
    //     //         document.head.appendChild(style);
    //     //     },
    //     //     afterPrint: function () {
    //     //         document.getElementById('dynamicPrintStyle').remove();
    //     //     }
    //     // });
    //     // printout('.print-container');
    // });

    // $('.back-print-btn').on('click', function (e) {
    //     e.preventDefault();
    //     $('.print-container').printThis({
    //         importCSS: true,
    //         beforePrint: function () {
    //             style.id = 'dynamicPrintStyle';
    //             style.textContent = `
    //             @media print {
    //                 @page {
    //                     size: /* A4 */ `+ $('.cheque-container').data('width') + ' ' + $('.cheque-container').data('height') + ` ;
    //                     margin: 0;
    //                     padding: 0;
    //                     /* page-orientation: landscape; */
    //                 }
    //             }
    //         `;
    //             document.head.appendChild(style);
    //         },
    //         afterPrint: function () {
    //             document.getElementById('dynamicPrintStyle').remove();
    //         }
            
    //     });
    //     // printout('.print-container');
    // });

    const style = document.createElement('style');
    $('.back-print-btn, .front-print-btn').on('click', function (e) {
        e.preventDefault();
                style.id = 'dynamicPrintStyle';
                style.textContent = `
                @media print {
                    @page {
                        size: `+ $('.cheque-container').data('width') + ' ' + $('.cheque-container').data('height') + `;
                        margin: 0;
                    }
                }
            `;
                document.head.appendChild(style);
        printout('.print-container');
    document.getElementById('dynamicPrintStyle').remove();

        // window.print();
    });
});


window.print = function () {e.preventDefault();};
// window.print = function () {
//                 style.id = 'dynamicPrintStyle';
//                 style.textContent = `
//                 @media print {
//                     @page {
//                         size: `+ $('.cheque-container').data('width') + ' ' + $('.cheque-container').data('height') + `;
//                         margin: 0;
//                     }
//                 }
//             `;
//                 document.head.appendChild(style);
// }
// const style = document.createElement('style');

window.onbeforeprint = function () {
                style.id = 'dynamicPrintStyle';
                style.textContent = `
                @media print {
                    @page {
                        size: /* A4 */ `+ $('.cheque-container').data('width') + ' ' + $('.cheque-container').data('height') + ` ;
                        margin: 0;
                        padding: 0;
                        /* page-orientation: landscape; */
                    }
                }
            `;
                document.head.appendChild(style);
}

window.onafterprint = function () {
    document.getElementById('dynamicPrintStyle').remove();
}