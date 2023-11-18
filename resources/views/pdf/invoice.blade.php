<!DOCTYPE html>
<html dir="ltr">

<head>
    <title>Arabic Invoice </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            font-family: DejaVu Sans !important;
        }

        body {
            font-size: 16px;
            font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
            padding: 10px;
            margin: 10px;

            color: #777;
        }


        body {
            color: #777;
            text-align: right;
        }

        body h1 {

            margin-bottom: 0px;
            padding-bottom: 0px;
            color: #000;
        }

        body h3 {

            margin-top: 10px;
            margin-bottom: 20px;
            color: #555;
        }

        body a {
            color: #06f;
        }

        @page {
            size: a4;
            margin: 0;
            padding: 0;
        }

        .invoice-box table {
            direction: ltr;
            width: 100%;
            text-align: right;
            border: 1px solid;
            font-family: 'DejaVu Sans', 'Roboto', 'Montserrat', 'Open Sans', sans-serif;
        }


        .row {
            display: block;
            padding-left: 24;
            padding-right: 24;
            page-break-before: avoid;
            page-break-after: avoid;
        }

        .column {
            display: block;
            page-break-before: avoid;
            page-break-after: avoid;
        }
    </style>
</head>

<body>
    <div class="row">
        <div class="column">
            <p class="text-darky">الفاتوره باللغة العربية </p>
        </div>
    </div>
    <div class="invoice-box">
        <table>
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">

                            </td>

                            <td>
                                فاتورة #: {{$num}}<br />
                                تاريخ الانشاء :{{ $invoiceDate }}<br />
                                تاريخ الانتهاء :{{ $dueDate }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>


            <tr class="heading">
                <td>العنصر </td>

                <td>السعر </td>
            </tr>

            @foreach($items as $item)
            <tr class="item">
                <td>{{ $item['description'] }}</td>
                <td>{{ $item['total'] }}</td>
            </tr>
            @endforeach
        </table>
        <p class="total last" style="margin-top: 20px;"><strong>الإجمالي:</strong> {{ $totalAmount }}</p>

        <div>
            <p lang="ar">
                {{ $thankYouMessage }}
            </p>
        </div>
    </div>

</body>

</html>