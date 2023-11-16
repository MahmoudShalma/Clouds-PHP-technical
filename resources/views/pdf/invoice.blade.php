<!-- resources/views/invoice.blade.php -->

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html lang="en" dir="rtl">

<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <style>
        /**
    Set the margins of the page to 0, so the footer and the header
    can be of the full height and width !
 **/
        @page {
            margin: 20px 20px 0 20px;
            /*background: url("


{{url('assets/letter.jpg')}}") center no-repeat 250% 100%;*/


        }

        main {
            height: 870px;
            display: block
        }

        td {
            padding: 4px;
            text-align: center;
            border: 1px solid #77697a;
            border-collapse: collapse;

            font-size: 14px !important;
        }

        /** Define now the real margins of every page in the PDF **/
        body {
            border: 3px solid #2196f3;
            /*   border-left: 3px solid #c00000;font-family: 'Lato', sans-serif;
     font-family: DejaVu Sans, sans-serif;*/
            /*border-bottom: 3px solid #c00000;*/
            /* border-right: 3px solid #c00000;*/
            font-size: 13px;
            padding: 15px 15px;
            letter-spacing: 0px;
            margin: 5px;
            text-align: right;
            font-family: 'examplefont', sans-serif;

        }

        /*    .ar {
        font-family: 'examplefont', sans-serif;
    }
*/
        .en {
            font-family: 'examplefont2', sans-serif;
        }

        h4 {
            font-size: 24px;
        }

        h5 {
            font-size: 18px
        }

        main {

            padding: 10px;
            position: relative
        }

        table {
            width: 100% !important;
            border-collapse: collapse;

            border: 1px solid #77697a
        }

        .page_break {
            page-break-before: always;
        }

        p {
            font-size: 16px
        }


        header {
            position: absolute;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            text-align: left;
            width: 100%;
            height: 1cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0px;
            left: 0cm;
            right: 0cm;
        }
    </style>
</head>

<body dir="rtl" style="display: inline-block; height: 100%;">

    <div class="invoice">
        <div class="header">
            <h1>Invoice</h1>
        </div>

        <div class="content">
            <p><strong>Invoice Date:</strong> {{ $invoiceDate }}</p>
            <p><strong>Due Date:</strong> {{ $dueDate }}</p>

            <table border="1" style="width: 100%; border-collapse: collapse; margin-top: 20px;">
                <thead>
                    <tr>
                        <th>الوصف</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($items as $item)
                    <tr>
                        <td>{{ $item['description'] }}</td>
                        <td>{{ $item['total'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <p style="margin-top: 20px;"><strong>Total Amount:</strong> {{ $totalAmount }}</p>
        </div>

        <div class="footer">
            <p>{{ $thankYouMessage }}</p>
        </div>
    </div>

</body>

</html>