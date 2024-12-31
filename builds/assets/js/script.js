$(document).ready(function () {
    $('.front-print-btn').on('click', function (e) {
        e.preventDefault();
        $('.print-container').printThis({
            importCSS: true,
            beforePrint: function () {
                const style = document.createElement('style');
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
            },
            afterPrint: function () {
                document.getElementById('dynamicPrintStyle').remove();
            }
        });
        // printout('.print-container');
    });

    $('.back-print-btn').on('click', function (e) {
        e.preventDefault();
        $('.print-container').printThis({
            importCSS: true,
        });
    });

});