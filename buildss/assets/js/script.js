const style = document.createElement('style');
style.id = 'dynamicPrintStyle';
$(document).ready(function () {
    var url = window.location.pathname.substring(1).split('.')[0];
    $('.nav-item a').each(function (index, value) {
        if (value.href.includes(url) && url != '') {
            $(value).addClass('active').addClass('fw-bold').addClass('text-primary');
        } else if ($(value).attr('href') == './' && url == '') {
            $(value).addClass('active').addClass('fw-bold').addClass('text-primary');
        }
    });

    $('.back-print-btn, .front-print-btn').on('click', function (e) {
        e.preventDefault();
        style.textContent = `
                @media print {
                    @page {
                        size: ${$('.cheque-container').data('width') + ' ' + $('.cheque-container').data('height')} ;
                        margin: 0;
                    }
                    .cheque-container { ${chequePrefix.chequeAlign} }
                }
            `;
        document.head.appendChild(style);
        printout('.print-container');
        document.getElementById('dynamicPrintStyle').remove();
    });
});

document.addEventListener('keydown', function (event) {
    if (event.ctrlKey && event.key === 'p') {
        event.preventDefault();
        alert('Printing is disabled on this page.');
    }
});