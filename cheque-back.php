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
    <div class="container mt-3">
        <div class="text-center mb-5 cheque-title">
            <h1>Cheque Printing Software</h1>
            <!-- <p>Software to print cheque</p> -->
        </div>

        <div>
            <form>
                <div class="row mt-3">
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group mb-3">
                            <label for="" class="form-label">Cheque Back Data <small class="text-muted">(Markdown format)</small></label>
                            <textarea id="chequeFormBackData" class="form-control mb-3" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">No of Pages</label>
                                    <input type="text" class="form-control mb-3" id="noOfPages">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Width <small class="text-muted">(mm)</small></label>
                                    <input type="text" class="form-control mb-3" id="width" value="204">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Height <small class="text-muted">(mm)</small></label>
                                    <input type="text" class="form-control mb-3" id="height" value="93">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group mb-3">

                            <div class="form-group mb-3 text-center">
                                <button class="btn btn-primary w-25 back-print-btn">Print</button>
                            </div>
                        </div>
            </form>
        </div>
        <div class="print-container">
        </div>
    </div>
    <?php include_once('./js.php'); ?>
    <script src="https://unpkg.com/showdown@2.1.0/dist/showdown.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#width, #height, #chequeFormBackData, #noOfPages').on('input', function() {
                chequePrint();
            });
            chequePrint();
        });

        function chequePrint() {
            var converter = new showdown.Converter();
            var html = converter.makeHtml($('#chequeFormBackData').val());
            var cheque_html = '';
            for (let index = 0; index < parseInt($('#noOfPages').val() == "" ? 1 : $('#noOfPages').val()); index++) {
                cheque_html += `<div class="print-page mt-3">
                    <div class="cheque-container border back py-3" style="width: ${$('#width').val()}mm; height: ${$('#height').val()}mm;">
                        ${html}
                    </div>
                </div>`;
            }
            $('.print-container').html(cheque_html);
        }
    </script>
</body>

</html>