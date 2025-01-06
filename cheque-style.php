<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheque Printing Software - Prefix</title>
    <?php include_once('./layout/css.php'); ?>
</head>

<body>
    <?php include_once('./layout/navbar.php'); ?>
    <div class="container mt-3 mb-5">
        <div>
            <div class="text-center mb-3 cheque-title">
                <h1>Cheque Styling</h1>
            </div>
            <form id="saveChequePrefix">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <fieldset class="rounded p-4 shadow mb-4">
                            <legend class="float-none w-auto px-2 text-primary">Payee</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="payeePrefix">Prefix: </label>
                                        <input type="text" class="form-control form-control-sm" id="payeePrefix"
                                            placeholder="Prefix">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="payeeSufix">Suffix: </label>
                                        <input type="text" class="form-control form-control-sm" id="payeeSufix"
                                            placeholder="Suffix">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <fieldset class="rounded p-4 shadow mb-4">
                            <legend class="float-none w-auto px-2 text-primary">Amount</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="amountPrefix">Prefix: </label>
                                        <input type="text" class="form-control form-control-sm" id="amountPrefix"
                                            placeholder="Prefix">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="amountSufix">Suffix: </label>
                                        <input type="text" class="form-control form-control-sm" id="amountSufix"
                                            placeholder="Suffix">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <fieldset class="rounded p-4 shadow mb-4">
                            <legend class="float-none w-auto px-2 text-primary">Amount in Words</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="amountWordsPrefix">Prefix: </label>
                                        <input type="text" class="form-control form-control-sm" id="amountWordsPrefix"
                                            placeholder="Prefix">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="amountWordsSufix">Suffix: </label>
                                        <input type="text" class="form-control form-control-sm" id="amountWordsSufix"
                                            placeholder="Suffix">
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-8 offset-md-2">
                        <fieldset class="rounded p-4 shadow mb-4">
                            <legend class="float-none w-auto px-2 text-primary">Cheque Align</legend>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="amountWordsPrefix">Align: </label>
                                        <select id="chequeAlign" class="form-select">
                                            <option value="top: 50%;right: 0;transform: translateY(-50%);">Center</option>
                                            <option value="top: 0%;right: 0;transform: translateY(-0%);">Left</option>
                                            <option value="top: 100%;right: 0;transform: translateY(-100%);">Right</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    <div class="col-md-8 offset-md-2 text-center">
                        <Button class="btn btn-primary w-25 shadow">Save</Button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once('./layout/js.php'); ?>
    <script>
        $(document).ready(function() {
            $("#saveChequePrefix").submit(function(e) {
                e.preventDefault();
                $(this).find('input, select').each(function(index, value) {
                    chequePrefix[$(value).attr('id')] = $(value).val();
                });
                localStorage.setItem("chequePrefix", JSON.stringify(chequePrefix));
                for (let x in chequePrefix) {
                    $(`#${x}`).val(chequePrefix[x]);
                }
            });
        });
    </script>
</body>

</html>