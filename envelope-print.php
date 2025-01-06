<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cheque Printing Software - Envelope Print</title>
    <?php include_once('./layout/css.php'); ?>
</head>

<body>
    <?php include_once('./layout/navbar.php'); ?>
    <div class="container mt-3">
        <div class="text-center mb-3 cheque-title">
            <h1>Envelope Printing</h1>
            <!-- <p>Software to print cheque</p> -->
        </div>

        <div>
            <form>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="envelopeTitle" class="form-label">Title</label>
                            <input type="text" class="form-control mb-3" id="envelopeTitle">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="noOfPages" class="form-label">No of Pages</label>
                                    <input type="number" class="form-control mb-3" id="noOfPages" value="1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="width" class="form-label">Width <small class="text-muted">(mm)</small></label>
                                    <input type="number" class="form-control mb-3" id="width" value="219">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group mb-3">
                                    <label for="height" class="form-label">Height <small class="text-muted">(mm)</small></label>
                                    <input type="number" class="form-control mb-3" id="height" value="93">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="envelopeSenderAddress" class="form-label">Sender Address <small class="text-muted">(Markdown
                                    format)</small></label>
                            <textarea id="envelopeSenderAddress" class="form-control mb-3" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group mb-3">
                            <label for="envelopeDeliveryAddress" class="form-label">Delivery Address <small class="text-muted">(Markdown
                                    format)</small></label>
                            <textarea id="envelopeDeliveryAddress" class="form-control mb-3" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6 offset-md-3">
                        <div class="form-group mb-3">
                            <div class="form-group mb-3 text-center">
                                <button class="btn btn-primary w-25 back-print-btn">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="print-container">
        </div>
    </div>
    <?php include_once('./layout/js.php'); ?>
    <script src="https://unpkg.com/showdown@2.1.0/dist/showdown.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#width, #height, #envelopeTitle, #envelopeSenderAddress, #envelopeDeliveryAddress, #noOfPages').on('input', function() {
                envelopePrint();
            });
            envelopePrint();
        });

        function envelopePrint() {
            var converter = new showdown.Converter();
            var cheque_html = '';
            for (let index = 0; index < parseInt($('#noOfPages').val() == "" ? 1 : $('#noOfPages').val()); index++) {
                cheque_html += `<div class="print-page mt-3">
                    <div class="cheque-container border back py-3" data-width="${$('#width').val()}mm" data-height="${$('#height').val()}mm" style="width: ${$('#width').val()}mm; height: ${$('#height').val()}mm;">
                    <h3 class="text-center"> ${$('#envelopeTitle').val()}</h3>
                    <div style="position: absolute; bottom: 10%; left: 10%; min-width: 20%; max-width: 40%;" draggable="true">
                    ${converter.makeHtml(`####From, \n`+ $('#envelopeSenderAddress').val().replace(/\n/g, '<br>'))}
                    </div>
                    <div style="position: absolute; top: 30%; right: 10%; min-width: 20%; max-width: 40%;" draggable="true">
                    ${converter.makeHtml('####To, \n' + $('#envelopeDeliveryAddress').val().replace(/\n/g, '<br>'))}
                    </div>
                    </div>
                </div>`;
            }
            $('.print-container').html('<div>' + cheque_html + '</div>');
        }
    </script>
</body>

</html>