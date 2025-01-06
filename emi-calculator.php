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
            <h1>EMI Cheque Printing</h1>
        </div>
        <div class="row justify-content-center">
            <form name="emiForm" class="emi-form col-md-8" autocomplete="off">
                <div class="row mb-3">
                    <label for="loanAmount" class="col-md-4 col-form-label">Loan Amount</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control form-control-sm" id="loanAmount" step="1000"
                            pattern="^\d+(?:\.\d+)?$" placeholder="Loan Amount" value="500000">
                        <small class="text-muted"><i></i></small>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="rateOfInterest" class="col-md-4 col-form-label">Rate of Interest:</label>
                    <div class="col-md-8">
                        <input type="number" class="form-control form-control-sm" id="rateOfInterest"
                            pattern="^\d+(?:\.\d+)?$" placeholder="Rate of Interest" value="9" step="0.25">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="Tenure" class="col-md-4 col-form-label">Tenure <small>(in Year)</small></label>
                    <div class="col-md-8">
                        <input type="number" class="form-control form-control-sm" id="tenure"
                            pattern="^\d+(?:\.\d+)?$" placeholder="Tenure" value="10">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="emiFormDate" class="col-md-4 col-form-label">EMI <small>(starting from)</small></label>
                    <div class="col-md-8">
                        <input type="text" class="form-control form-control-sm" id="emiFormDate" placeholder="Tenure">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="emiIncreasePerYear" class="col-md-4 col-form-label">EMI Increase / Year <small>(%)</small></label>
                    <div class="col-md-8">
                        <input type="number" class="form-control form-control-sm" id="emiIncreasePerYear" placeholder="EMI Increase / Year">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="emiPrePaymentPerYear" class="col-md-4 col-form-label">EMI Prepayment / Year </label>
                    <div class="col-md-8">
                        <input type="number" class="form-control form-control-sm" id="emiPrePaymentPerYear" placeholder="EMI Prepayment / Year">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">Calculate EMI</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="row justify-content-center data mb-3"></div>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered" id="emiTable">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Month</th>
                            <th scope="col">EMI</th>
                            <th scope="col">Principal</th>
                            <th scope="col">Interest</th>
                            <th scope="col">Balance</th>
                            <th scope="col">Pre Payment</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include_once('./layout/js.php'); ?>
    <script src="./assets/js/emi-calculator.js"></script>
</body>

</html>