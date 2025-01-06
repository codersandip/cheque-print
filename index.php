<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheque Printing Software - Home</title>
    <?php include_once('./layout/css.php'); ?>
</head>

<body>
    <?php include_once('./layout/navbar.php'); ?>
    <div class="container mt-3 mb-5">
        <div class="text-center mb-3 cheque-title">
            <h1>Cheque Printing Software</h1>
        </div>
        <div>
            <form name="chequeForm" class="cheque-form" autocomplete="off">
                <div class="row">
                    <div class="col-md-3">
                        <div class="d-flex justify-content-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="chequeToggle" >
                                <label class="form-check-label" for="chequeToggle">Single Cheque Print</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="chequeNameToggle" checked>
                                <label class="form-check-label" for="chequeNameToggle">Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="chequeAmountToggle" checked>
                                <label class="form-check-label" for="chequeAmountToggle">Amount</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="d-flex justify-content-center">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="chequeDateToggle" checked>
                                <label class="form-check-label" for="chequeDateToggle">Date</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="chequeFormLanguage">Select Language</label>
                            <select class="form-control form-control-sm" id="chequeFormLanguage">
                                <option value="en-IN">English</option>
                                <option value="mr-IN">Marathi</option>
                                <option value="hi-IN">Hindi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="chequeFormType">Cheque Type</label>
                            <select class="form-control form-control-sm" id="chequeFormType">
                                <option value="Bearer">Bearer</option>
                                <option value="Order">Order</option>
                                <option value="Crossed">Crossed</option>
                                <option value="Payee">Payee</option>
                                <option value="Payee Not Nigotiable">Payee Not Nigotiable</option>
                                <option value="Cancel">Cancel</option>
                                <option value="Self">Self</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="chequeFormBank">Select Bank</label>
                            <select class="form-control form-control-sm" id="chequeFormBank">
                                <option value="">Select Bank</option>
                                <option value="Axis Bank">Axis Bank</option>
                                <option value="ICICI Bank">ICICI Bank</option>
                                <option value="HDFC Bank">HDFC Bank</option>
                                <option value="PDCCB Pune">PDCCB Pune</option>
                                <option value="Union Bank">Union Bank</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 single-cheque">
                        <div class="form-group mb-3">
                            <label for="chequeFormDate">Date</label>
                            <input type="text" class="form-control form-control-sm" id="chequeFormDate"
                                placeholder="Date">
                        </div>
                    </div>
                    <div class="col-md-2 single-cheque">
                        <div class="form-group mb-3">
                            <label for="chequeFormName">Name: </label>
                            <input type="text" class="form-control form-control-sm" id="chequeFormName" list="names"
                                placeholder="Name">
                            <datalist id="names">
                                <option value="Payee Name">
                                <option value="Sandip Baliram Tawhare">
                                <option value="संदिप बळीराम टाव्हरे">
                                <option value="Kunda Baliram Tawhare">
                                <option value="कुंदा बळीराम टाव्हरे">
                                <option value="Axis Bank Card No. (6529-2210-1374-6798)">
                                <option value="अशोक किसन जाधव">
                            </datalist>
                        </div>
                    </div>
                    <div class="col-md-2 single-cheque">
                        <div class="form-group mb-3">
                            <label for="chequeFormAmount">Amount: </label>
                            <input type="text" class="form-control form-control-sm" id="chequeFormAmount"
                                pattern="^\d+(?:\.\d+)?$" placeholder="Amount">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="noOfPages">No of Pages: </label>
                            <input type="text" class="form-control form-control-sm" id="noOfPages" placeholder="No of Pages">
                        </div>
                    </div>
                    <div class="col-md-2 multiple-cheque d-none">
                        <div class="form-group mb-3">
                            <label for="formFile">Select File</label>
                            <input class="form-control form-control-sm" type="file" id="formFile" accept=".xlsx">
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-center multiple-cheque d-none">
                        <div class="form-group mb-3">
                            <a href="./assets/sample.xlsx">Sample Template</a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <button class="btn btn-primary front-print-btn">Print</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="print-container"><!-- d-flex justify-content-center align-items-center -->
            <div class="print-page d-inline-block border mt-3">
                <div class="cheque-container front text-uppercase">
                    <div class="cheque-ac-payee">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A/C Payee
                        Only&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
                    <div class="cheque-name"></div>
                    <div class="cheque-date">
                        <div class="row m-0"></div>
                    </div>
                    <div class="cheque-amount"></div>
                    <div class="cheque-amount-word"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once('./layout/js.php'); ?>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> -->
    <script src="./assets/js/cheque-front.js"></script>
    <!-- <script>
        const ToWords = require("to-words").ToWords;
        const moment = require("moment");
        localStorage.removeItem("chequePrintData")
        let chequePrintData = () => {
            if (localStorage.getItem("chequePrintData")) {
                return JSON.parse(localStorage.getItem("chequePrintData"));
            }
            const chequePrintData = {
                chequeToggle: null,
                chequeNameToggle: null,
                chequeAmountToggle: null,
                chequeDateToggle: null,
                chequeFormLanguage: null,
                chequeFormType: null,
                chequeFormBank: null,
                chequeFormDate: null,
                chequeFormName: null,
                chequeFormAmount: null,
                noOfPages: null,
                formFile: null,
            };
            localStorage.setItem("chequePrintData", JSON.stringify(chequePrintData));
            return chequePrintData;
        }

        chequePrintData = chequePrintData();
    
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
        $(document).ready(function() {
            // Date picker initialization
            $("#chequeFormDate").datepicker({
                uiLibrary: "bootstrap5",
                format: "dd-mm-yyyy",
                showRightIcon: false,
                value: moment().format("DD-MM-YYYY"),
            });
            $('.cheque-form input, .cheque-form select').on('input change', function(e) {
                e.preventDefault();

                switch (this.id) {
                    case "chequeToggle":
                        if(e.type !== "change") return ;
                        $(".single-cheque, .multiple-cheque").toggleClass("d-none");
                        chequePrintData.chequeToggle = this.checked;
                        break;
                    case "chequeNameToggle":
                        break;
                    case "chequeAmountToggle":
                        break;
                    case "chequeDateToggle":
                        break;
                    case "chequeFormLanguage":
                        break;
                    case "chequeFormType":
                        break;
                    case "chequeFormBank":
                        break;
                    case "chequeFormDate":
                        break;
                    case "chequeFormName":
                        break;
                    case "chequeFormAmount":
                        break;
                    case "noOfPages":
                        break;
                    case "formFile":
                        break;
                }
            })
        });
    </script> -->
</body>

</html>