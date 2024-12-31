<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheque Printing Software - Prefix</title>
    <?php include_once('./css.php'); ?>
</head>

<body>
    <?php include_once('./navbar.php'); ?>
    <div class="container">
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
                <div class="col-md-8 offset-md-2 text-center">
                    <Button class="btn btn-primary w-25 shadow">Save</Button>
                </div>
            </div>
        </form>
    </div>
    <?php include_once('./js.php'); ?>
    <script>
        $(document).ready(function() {
            $("#saveChequePrefix").submit(function(e) {
                e.preventDefault();
                $(this).find('input').each(function(index, value) {
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