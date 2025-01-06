const ToWords = require("to-words").ToWords;
const moment = require("moment");

function getToWordsInstance(locale) {
    return new ToWords({
        localeCode: locale,
        converterOptions: {
            currency: true,
            ignoreDecimal: false,
            ignoreZeroCurrency: false,
            doNotAddOnly: false,
        },
    });
}

$(document).ready(function () {

    // Date picker initialization
    $("#chequeFormDate").datepicker({
        uiLibrary: "bootstrap5",
        format: "dd-mm-yyyy",
        showRightIcon: false,
        value: moment().format("DD-MM-YYYY"),
    });

    chequePrint();
    // $('.front-print-btn').trigger('click');
    $('chequeToggle').trigger('change');
    $('.cheque-form input, .cheque-form select').on('input change', function (e) {
        if ($("#chequeFormBank").val() != "") {
            var data = ChequeData[$("#chequeFormBank").val()];
        } else {
            var data = ChequeData[$("#chequeFormBank")[0][1].value];
        }
        switch (this.id) {
            case "chequeToggle":
                if (e.type == "change") {
                    if (this.checked) {
                        $(this).parent().find('label').text('Single Cheque Print');
                        $('.single-cheque').toggleClass('d-none');
                        $('.multiple-cheque').toggleClass('d-none');
                    } else {
                        $(this).parent().find('label').text('Multiple Cheque Print');
                        $('.single-cheque').toggleClass('d-none');
                        $('.multiple-cheque').toggleClass('d-none');
                    }
                }
            case "chequeFormType":
                $('.cheque-cancel').css("opacity", "0");
                if ($("#chequeFormType").val() == "Bearer") {
                    $(".cheque-ac-payee").css("opacity", "0");
                } else if ($("#chequeFormType").val() == "Payee") {
                    $(".cheque-ac-payee").css("opacity", "1");
                    $(".cheque-ac-payee").css("color", "rgba(0, 0, 0, 1)");
                } else if ($("#chequeFormType").val() == "Crossed") {
                    $(".cheque-ac-payee").css("opacity", "1");
                    $(".cheque-ac-payee").css("color", "rgba(0, 0, 0, 0)");
                } else if ($("#chequeFormType").val() == "Self") {
                    $(".cheque-ac-payee").css("opacity", "0");
                    $(".cheque-ac-payee").css("color", "rgba(0, 0, 0, 0)");
                    $(".cheque-name").text(`${chequePrefix.payeePrefix}Self${chequePrefix.payeeSufix}`);
                    $("#chequeFormName").val("Self");
                } else if ( $("#chequeFormType").val() == "Cancel") {
                    $(".cheque-name").text('');
                    $(".cheque-date").text('');
                    $(".cheque-amount").text('');
                    $(".cheque-amount-word").text('');
                    $(".cheque-ac-payee").css("color", "rgba(0, 0, 0, 0)");
                    $('.cheque-cancel').css("opacity", "1");
                }
                break;

            case "chequeFormBank":
                // chequePrint()
                $('.cheque-name').attr('style', data.name_position);
                $('.cheque-date').attr('style', data.date_position);
                $('.cheque-amount').attr('style', data.amount_position);
                $('.cheque-amount-word').attr('style', data.amount_word_position);

                break;
            case "chequeFormLanguage":
                chequePrint()
                break;
            case "chequeFormName":
                chequePrint()
                break;
            case "chequeFormDate":
                chequePrint()
                break;
            case "chequeFormAmount":
                if (!$(this).val()) {
                    return;
                }
                const numberRegex = /^-?\d+(\.\d{0,2})?$/;
                if (!numberRegex.test($(this).val())) {
                    if ($(this).val().split(".").length == 2 && $(this).val().split(".")[1].length > 2) {
                        $(this).val($(this).val().split(".")[0] + "." + $(this).val().split(".")[1].slice(0, 2));
                    } else {
                        $(this).val('');
                        return;
                    }
                }
                chequePrint()
                break;
            case "noOfPages":
                if (!$(this).val() && e.type == "change") return;
                chequePrint();
                break;
            case "formFile":
                var file = e.target.files[0];
                // console.log(e.target.files[0]);
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        const data = new Uint8Array(e.target.result);
                        const workbook = XLSX.read(data, {
                            type: 'array'
                        });

                        // Get the first sheet's name
                        const firstSheetName = workbook.SheetNames[0];

                        // Get the first sheet's data
                        const worksheet = workbook.Sheets[firstSheetName];

                        // Convert sheet data to JSON
                        let output = XLSX.utils.sheet_to_json(worksheet, {
                            header: 1
                        });
                        output = output.slice(1)
                        var arr = [];
                        $(output).each(function (index, value) {
                            if(value.length > 0)
                            {
                                arr[index] = getChequeHTML(
                                    value[1],
                                    dateHtml(moment(new Date((value[0] - (value[0] > 59 ? 1 : 0)) * 86400000 + Date.UTC(1899, 11, 30))).format('DD-MM-YYYY')),
                                    getAmount(value[2]),
                                    getAmountWord(value[2])
                                );
                            }
                        });
                        getCheque(arr)
                        $('#formFile')[0].value = '';
                    };
                    reader.readAsArrayBuffer(file);
                }

                break;
            default:
                break;
        }

    });
});


function dateHtml(date) {
    var date = date.replace(/-/g, "").split("");
    var html = "";
    date.forEach((element) => {
        html += `<div class="col p-0" style="width: ${
        $("#chequeFormBank").val() != ""
          ? $("#chequeFormBank").val()
          : "Axis Bank"
      };">${parseInt(element).toLocaleString($("#chequeFormLanguage").val())}</div>`;
    });
    return html;
}

function getAmountWord(amount) {
    if (amount == "") {
        return "";
    }
    const numberRegex = /^-?\d+(\.\d{0,2})?$/;
    if (numberRegex.test(amount)) {
        return (chequePrefix.amountWordsPrefix + getToWordsInstance($("#chequeFormLanguage").val()).convert(amount)) + chequePrefix.amountWordsSufix;
    } else {
        amount = amount.toString();
        if (
            amount.split(".").length == 2 &&
            amount.split(".")[1].length > 2
        ) {
            amount = amount.split(".")[0] + "." + amount.split(".")[1].slice(0, 2);
            return (chequePrefix.amountWordsPrefix + getToWordsInstance($("#chequeFormLanguage").val()).convert(amount)) + chequePrefix.amountWordsSufix;
        }
    }
}

function getAmount(amount) {
    if (amount == "") {
        return "";
    }
    const numberRegex = /^-?\d+(\.\d{0,2})?$/;
    if (numberRegex.test(amount)) {
        return chequePrefix.amountPrefix + parseFloat(amount).toLocaleString(
            $("#chequeFormLanguage").val()
        ) + chequePrefix.amountSufix;
    } else {
        amount = amount.toString();
        if (
            amount.split(".").length == 2 &&
            amount.split(".")[1].length > 2
        ) {
            amount = amount.split(".")[0] + "." + amount.split(".")[1].slice(0, 2);
            return chequePrefix.amountWordsPrefix + parseFloat(amount).toLocaleString(
                $("#chequeFormLanguage").val()
            ) + chequePrefix.amountWordsSufix;
        }
        
    }
}

function getChequeHTML(name, date, amount, amountWord) {
    if ($("#chequeFormBank").val() != "") {
        var data = ChequeData[$("#chequeFormBank").val()];
    } else {
        var data = ChequeData[$("#chequeFormBank")[0][1].value];
    }

    var chequeHtml = `<div class="cheque-container  border front text-uppercase" data-width="${data.width}" data-height="${data.height}" style="width: ${data.width}; height: ${data.height};">\
    <div class="cheque-ac-payee">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A/C Payee\
        Only&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>\
    <div class="cheque-name" style="${data.name_position}">${ (name == "" ? "" : chequePrefix.payeePrefix + name + chequePrefix.payeeSufix)}</div>\
    <div class="cheque-date" style="${data.date_position}">\
        <div class="row m-0">${date}</div>\
    </div>\
    <div class="cheque-amount" style="${data.amount_position}">${ amount }</div>\
    <div class="cheque-amount-word" style="${data.amount_word_position}">${ amountWord }</div>\
    <div class="cheque-cancel">Cancel</div>
</div>`;
    return chequeHtml;
}

function getCheque(html) {
    var chequeHtml = "";

    $(html).each(function (index, value) {
        chequeHtml += `<div class="print-page mt-3">${value}</div>`;
    });
    $(".print-container").html('<div>' + chequeHtml + '</div>');
    $('.cheque-cancel').css("opacity", "0");
    if ($("#chequeFormType").val() == "Bearer") {
        $(".cheque-ac-payee").css("opacity", "0");
    } else if ($("#chequeFormType").val() == "Payee") {
        $(".cheque-ac-payee").css("opacity", "1");
        $(".cheque-ac-payee").css("color", "rgba(0, 0, 0, 1)");
    } else if ($("#chequeFormType").val() == "Crossed") {
        $(".cheque-ac-payee").css("opacity", "1");
        $(".cheque-ac-payee").css("color", "rgba(0, 0, 0, 0)");
    } else if ($("#chequeFormType").val() == "Self") {
        $(".cheque-ac-payee").css("opacity", "0");
        $(".cheque-ac-payee").css("color", "rgba(0, 0, 0, 0)");
        $(".cheque-name").text(`${chequePrefix.payeePrefix}Self${chequePrefix.payeeSufix}`);
        $("#chequeFormName").val("Self");
    } else if ( $("#chequeFormType").val() == "Cancel") {
        $(".cheque-name").text('');
        $(".cheque-date").text('');
        $(".cheque-amount").text('');
        $(".cheque-amount-word").text('');
        $(".cheque-ac-payee").css("opacity", "0");
        $('.cheque-cancel').css("opacity", "1");
        
    }
}

function chequePrint() {
    var arr = [];
    for (let index = 0; index < parseInt($('#noOfPages').val() == "" ? 1 : $('#noOfPages').val()); index++) {
        arr[index] = getChequeHTML(
            $("#chequeFormName").val(),
            dateHtml($("#chequeFormDate").val()),
            getAmount($("#chequeFormAmount").val()),
            getAmountWord($("#chequeFormAmount").val())
        );
    }
    getCheque(arr);
}