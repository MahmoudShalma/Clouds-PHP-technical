<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- Meta data --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>EECGroup | @yield('title')</title>

    {{-- favicon --}}
    <link rel="shortcut icon" href="{{ asset('dist/img/favicon.png') }}">

    <!-------------------------------- Fonts -------------------------------->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=El+Messiri:wght@400;500;600;700&display=swap">


    {{--        <link rel="preconnect" href="https://fonts.googleapis.com">--}}
    {{--        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>--}}
    {{--    <link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@200&display=swap" rel="stylesheet">--}}

<!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free-6-web/css/all.min.css') }}">
    <!-------------------------------- Styles -------------------------------->
    <link rel="stylesheet" href="{{ asset('plugins/tablesorter/css/theme.materialize.min.css') }}">

    <style>
        .input-group-text {
            font-size: 14px !important;
        }

        .disabled-button.disabled {
            pointer-events: none;
            background-color: #e9ecef !important;
            border: none;
            color: #000 !important;
        }

        .tooltip2 {
            position: relative;
            display: inline-block;
            /*border-bottom: 1px dotted black;*/
            cursor: zoom-in;
        }

        .tooltip2 .tooltiptext2 {
            visibility: hidden;
            width: 200px;
            background-color: #8e8484;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 100%;
            left: 50%;
            margin-left: -60px;
            white-space: pre-wrap;

            /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
            opacity: 0;
            transition: opacity 1s;
        }

        .tooltip2 .tooltiptext2::after {
            content: "";
            position: absolute;
            top: 100%;
            left: 50%;
            margin-left: -5px;
            border-width: 5px;
            border-style: solid;
            border-color: #8e8484 transparent transparent transparent;
        }

        .tooltip2:hover .tooltiptext2 {
            visibility: visible;
            opacity: 1;
        }

        .btn-purple {
            background-color: #6f42c1 !important;
            border-color: #6f42c1 !important;
            color: #FFF !important;
        }

        .btn-purple:hover {
            color: #FFF !important;
        }

        .btn-orange {
            background-color: #ff7600 !important;
            border-color: #ff7600 !important;
            color: #FFF !important;
        }

        .btn-orange:hover {
            color: #FFF !important;
        }
    </style>

    <style>
        /* START TOOLTIP STYLES */

        [tooltip] {
            position: relative;
            /* opinion 1 */
        }

        /* Applies to all tooltips */

        [tooltip]::before,
        [tooltip]::after {
            text-transform: none;
            /* opinion 2 */
            font-size: 1.3em;
            /* opinion 3 */
            line-height: 1;
            user-select: none;
            pointer-events: none;
            position: absolute;
            display: none;
            opacity: 0;
            z-index: 10;
        }

        [tooltip]::before {
            content: '';
            border: 5px solid transparent;
            /* opinion 4 */
            z-index: 1001;
            /* absurdity 1 */
        }

        [tooltip]::after {
            content: attr(tooltip);
            /* magic! */
            /* most of the rest of this is opinion */
            font-family: Helvetica, sans-serif;
            text-align: center;
            /*
                    Let the content set the size of the tooltips
                    but this will also keep them from being obnoxious
                    */
            min-width: 3em;
            max-width: 21em;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 1ch 1.5ch;
            border-radius: .3ch;
            box-shadow: 0 1em 2em -.5em rgba(0, 0, 0, 0.35);
            background: #5c5b5b;
            color: #fff;
            z-index: 1000;
            /* absurdity 2 */
        }

        /* Make the tooltips respond to hover */

        [tooltip]:hover::before,
        [tooltip]:hover::after {
            display: block;
        }

        /* don't show empty tooltips */

        [tooltip='']::before,
        [tooltip='']::after {
            display: none !important;
        }

        /* FLOW: UP */

        [tooltip]:not([flow])::before,
        [tooltip][flow^="up"]::before {
            bottom: 100%;
            border-bottom-width: 0;
            border-top-color: #333;
        }

        [tooltip]:not([flow])::after,
        [tooltip][flow^="up"]::after {
            bottom: calc(100% + 5px);
        }

        [tooltip]:not([flow])::before,
        [tooltip]:not([flow])::after,
        [tooltip][flow^="up"]::before,
        [tooltip][flow^="up"]::after {
            left: 50%;
            transform: translate(-50%, -.5em);
        }

        /* FLOW: DOWN */

        [tooltip][flow^="down"]::before {
            top: 100%;
            border-top-width: 0;
            border-bottom-color: #333;
        }

        [tooltip][flow^="down"]::after {
            top: calc(100% + 5px);
        }

        [tooltip][flow^="down"]::before,
        [tooltip][flow^="down"]::after {
            left: 50%;
            transform: translate(-50%, .5em);
        }

        /* FLOW: LEFT */

        [tooltip][flow^="left"]::before {
            top: 50%;
            border-right-width: 0;
            border-left-color: #333;
            left: calc(0em - 5px);
            transform: translate(-.5em, -50%);
        }

        [tooltip][flow^="left"]::after {
            top: 50%;
            right: calc(100% + 5px);
            transform: translate(-.5em, -50%);
        }

        /* FLOW: RIGHT */

        [tooltip][flow^="right"]::before {
            top: 50%;
            border-left-width: 0;
            border-right-color: #333;
            right: calc(0em - 5px);
            transform: translate(.5em, -50%);
        }

        [tooltip][flow^="right"]::after {
            top: 50%;
            left: calc(100% + 5px);
            transform: translate(.5em, -50%);
        }

        /* KEYFRAMES */

        @keyframes tooltips-vert {
            to {
                opacity: .9;
                transform: translate(-50%, 0);
            }
        }

        @keyframes tooltips-horz {
            to {
                opacity: .9;
                transform: translate(0, -50%);
            }
        }

        /* FX All The Things */

        [tooltip]:not([flow]):hover::before,
        [tooltip]:not([flow]):hover::after,
        [tooltip][flow^="up"]:hover::before,
        [tooltip][flow^="up"]:hover::after,
        [tooltip][flow^="down"]:hover::before,
        [tooltip][flow^="down"]:hover::after {
            animation: tooltips-vert 300ms ease-out forwards;
        }

        [tooltip][flow^="left"]:hover::before,
        [tooltip][flow^="left"]:hover::after,
        [tooltip][flow^="right"]:hover::before,
        [tooltip][flow^="right"]:hover::after {
            animation: tooltips-horz 300ms ease-out forwards;
        }

        /* END TOOLTIP STYLES */


        label.error {
            color: red;
            font-size: 1rem;
            display: block;
            margin-top: 5px;
        }

        input.error {
            border: 1px dashed red;
            font-weight: 300;
            color: red;
        }

        .about-border {
            display: block;
            width: 20em;
            height: 1px;
            background: #a5a8aa;
            margin-top: 8px;
            margin-right: 5px;
            margin-left: 5px;
        }

        .about-border-plus {
            display: block;
            width: 40em;
            height: 1px;
            background: #a5a8aa;
            margin-top: 15px;
            margin-bottom: 15px;
            margin-right: 5px;
            margin-left: 5px;
        }

    </style>

    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css') }}">

    @if (app()->getLocale() == 'ar')
        {{-- <link rel="stylesheet" href="{{ asset('dist/css-rtl/main.css') }}"> --}}

        {{-- note this file must be update if you do changes in
            1. custom style => (dist/css/style.css) and use minifier (https://cssminifier.com)
            2. custom RTL style => (dist/css-rtl/custom-rtl.css) and use minifier (https://cssminifier.com) --}}

        <link rel="stylesheet" href="{{ asset('dist/css-rtl/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css-rtl/custom-rtl.css') }}">
    @else
        {{-- <link rel="stylesheet" href="{{ asset('dist/css/main.css') }}"> --}}
        {{-- note this file must be update if you do changes in custom style => (dist/css/style.css) and use minifier (https://cssminifier.com) --}}
    @endif
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    {{--    <link rel="stylesheet" href="{{ asset('plugins/tablesorter/css/theme.materialize.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('plugins/datepicker/datepicker3.css') }}">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/i-check-bootstrap/icheck-bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/i-check-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/css/selectize.css') }}">

    <style>
        /* Brightness-zoom Container */
        .img-hover-zoom--brightness img {
            transition: transform 2s, filter 1.5s ease-in-out;
            transform-origin: center center;
            filter: brightness(80%);
            cursor: all-scroll;
        }

        /* The Transformation */
        .img-hover-zoom--brightness:hover img {
            filter: brightness(100%);
            transform: scale(1.7);
        }
    </style>

    <style>
        .background {
            background-color: #e9edef;
            /*background-color: #d6e5ed;*/
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 5px;
        }

        .background-section {
            margin-right: 60px;
            margin-left: 60px;
            margin-top: 8px;
            margin-bottom: 15px;
        }

        .form-control[readonly] {
            /*background-color: white;*/
            background-color: #e9ecef;
            cursor: no-drop;
        }

        .required-star {
            color: red;
        }
    </style>

    <!-- table hover tbody tr -->
    <style>
        .table-h tbody tr:hover {
            background-color: #E8E8E8;
            cursor: pointer;
        }
    </style>

    <!-- dt-button2 buttons style -->
    <style>
        .dt-button2 {
            position: relative;
            display: inline-block;
            box-sizing: border-box;
            margin-left: 0.167em;
            margin-right: 0.167em;
            margin-bottom: 0.333em;
            padding: 0.3em 1em;
            border: 1px solid rgba(0, 0, 0, 0.3);
            border-radius: 2px;
            cursor: pointer;
            font-size: .88em;
            line-height: 1.6em;
            color: black;
            white-space: nowrap;
            overflow: hidden;
            background-color: rgba(0, 0, 0, 0.1);
            background: linear-gradient(to bottom, rgba(230, 230, 230, 0.1) 0%, rgba(0, 0, 0, 0.1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(GradientType=0, StartColorStr="rgba(230, 230, 230, 0.1)", EndColorStr="rgba(0, 0, 0, 0.1)");
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            text-decoration: none;
            outline: none;
            text-overflow: ellipsis;
        }

        .custom-icon {
            font-size: 11px;
            color: #585454;
        }

        .dt-button2:hover {
            box-shadow: 0 12px 16px 0 rgba(0, 0, 0, 0.24), 0 17px 50px 0 rgba(0, 0, 0, 0.19);
        }
    </style>

    <style>
        .alert-style {
            margin-top: 10px;
            margin-right: 40px;
            margin-left: 40px;
            color: #155724;
            background-color: #d4edda;
            border-color: #d4edda;
            margin-bottom: -10px;
            height: 38px;
        }

        .alert-style-font {
            margin-top: -7px;
        }
    </style>

    <style>
        .search-background-color {
            background-color: #f6f6f6 !important;
        }

        input {
            color: #5e5d5d !important;
            font-weight: 800;
        }

        .search-background-color::-webkit-input-placeholder {
            color: gray !important;
        }
    </style>

    <style>
        .status-onprogress {
            background-color: #eace78 !important;
        }

        .status-done {
            background-color: #a7dfa7 !important;
        }

        .status-canceled {
            background-color: #f39696 !important;
        }
    </style>

    <style>
        table.dataTable tbody tr.selected > * {
            box-shadow: inset 0 0 0 9999px rgb(126 184 120 / 90%) !important;
            color: #ffffff !important;
            /*font-weight: bold;*/
            /*font-size: 15px !important;*/
            transform-origin: top;
            animation: anim 0.5s ease;
        }
    </style>

    <style>
        body, h1, h2, h3, h4, h5 {
            text-transform: capitalize;
        }
    </style>
    <!-- Custom style -->
    @yield('styles')
</head>
