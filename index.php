<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheque Printing Software - Home</title>
    <?php include_once('./css.php'); ?>
</head>

<body>
    <?php include_once('./navbar.php'); ?>
    <div class="container mt-3 mb-5">
        <div class="text-center mb-5 cheque-title">
            <h1>Cheque Printing Software</h1>
        </div>
        <div>
            <form name="chequeForm" class="cheque-form" autocomplete="off">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="chequeFormLanguage">Select Language</label>
                            <select class="form-control form-control-sm" id="chequeFormLanguage">
                                <option value="en-IN">English</option>
                                <option value="mr-IN">Marathi</option>
                                <option value="hi-IN">Hindi</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="chequeFormType">Cheque Type</label>
                            <select class="form-control form-control-sm" id="chequeFormType">
                                <option value="Bearer">Bearer</option>
                                <option value="Payee">Payee</option>
                                <option value="Crossed">Crossed</option>
                                <option value="Self">Self</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="chequeFormBank">Select Bank</label>
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
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="chequeFormDate">Date</label>
                            <input type="text" class="form-control form-control-sm" id="chequeFormDate"
                                placeholder="Date">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="chequeFormName">Name: </label>
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
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="chequeFormAmount">Amount: </label>
                            <input type="text" class="form-control form-control-sm" id="chequeFormAmount"
                                pattern="^\d+(?:\.\d+)?$" placeholder="Amount">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="noOfPages">No of Pages: </label>
                            <input type="text" class="form-control form-control-sm" id="noOfPages" placeholder="No of Pages">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label  for="formFile" class="form-label">Default file input example</label>
                            <input class="form-control" type="file" id="formFile" accept=".xlsx">
                        </div>
                    </div>
                    <div class="col-md-4 d-flex align-items-center ">
                        <div class="form-group mb-3">
                            <a href="./assets/sample.xlsx">Sample Template</a>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group mb-3 text-center">
                            <button class="btn btn-primary w-25 front-print-btn">Print</button>
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
    <?php include_once('./js.php'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
    <script src="./assets/js/cheque-front.js"></script>
</body>

</html>